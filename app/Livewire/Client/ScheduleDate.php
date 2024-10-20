<?php

namespace App\Livewire\Client;

use App\Models\ScheduleDate as ModelsScheduleDate;
use App\Rules\DateFormatRule;
use App\Rules\TimeFormatRule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ScheduleDate extends Component
{
    public $purchase, $date, $time, $hours = [], $next_date, $cuantity;

    public function render()
    {
        return view('livewire.client.schedule-date');
    }

    public function mount()
    {
        $this->cuantity = 3;
        $today = Carbon::now();
        $this->next_date = $today->parse($this->purchase->updated_at)->addDays(3);
    }

    public function selectedDate()
    {
        $day = date('N',strtotime($this->date));
        $hour = $this->calculateTime($day);
        $this->hours = $this->calculateHours($hour);
        $this->time = null;
    }

    public function calculateTime($day)
    {
        $hours = 0;
        if ($day == 6) $hours = 12;
        if ($day >=1 && $day <= 5) $hours = 18;
        return $hours;
    }

    public function calculateHours($hour)
    {
        $hours = [];
        for ($i=9; $i <= $hour; $i++) { 
            // info(str_pad($i, $this->cuantity, '0', STR_PAD_LEFT) . ":00:00");
            $schedule = ModelsScheduleDate::where([
                ['date','=',$this->date],
                ['time','=',str_pad($i, 2, '0', STR_PAD_LEFT) . ":00"]
            ])->get();
            if (count($schedule) < $this->cuantity) array_push($hours, $i);
        }
        return $hours;
    }

    public function save()
    {
        $this->validate([
            'time' => ['required','date_format:H:i',new TimeFormatRule($this->date)],
            'date' => ['required','date',new DateFormatRule($this->purchase)],
        ]);
        DB::beginTransaction();
        try {
            //
            $schedule = ModelsScheduleDate::create([
                'date'  => $this->date,
                'time'  => $this->time,
                'purchase_id' => $this->purchase->id,
            ]);
            $search = $this->searchScheduledDate($schedule);

            if (!$search) {
                DB::rollBack();
                $this->selectedDate();
                $this->time = null; 
                return $this->addError('date', 'El horario seleccionado ya fue designado, seleccione otro.');
            }
            DB::commit();
            session()->flash('status', 'Los datos se guardaron correctamente.');
            return redirect()->route('compras.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            info($th->getMessage());
        }
    }

    public function searchScheduledDate($schedule)
    {
        $schedules = ModelsScheduleDate::where([
            ['date','=',$schedule->date],
            ['time','=',$schedule->time]
        ])->orderBy('id','ASC')->take($this->cuantity)->pluck('id')->toArray();
        // info($schedules);
        $status = in_array($schedule->id,$schedules) ? 1 : 0;
        return $status;
    }
}