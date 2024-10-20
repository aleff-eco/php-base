<?php

namespace App\Livewire\Client\Purchase;

use Livewire\Component;

class Show extends Component
{
    public $purchase, $invoice, $home_delivery, $list, $calculate;

    public function render()
    {
        return view('livewire.client.purchase.show');
    }

    public function mount()
    {
        $this->invoice = $this->purchase->invoice;
        $this->home_delivery = $this->purchase->home_delivery;
        $this->calculate = $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $list = $this->purchase->product_price_purchases;
        $subtotal = 0;
        foreach ($list as $item) {
            // info($item->quantity);
            // info($item->product_price->price);
            $subtotal += ($item->product_price->price * $item->quantity);
        }

        $iva = 0;
        foreach ($list as $item) {
            if ($item->product_price->product->iva ==1 ) {
                $iva += $item->product_price->price * $item->quantity;
            }
        }
        $iva = round($iva *.16,2);
        $total = 0;
        $total = $iva + $subtotal;

        $home_delivery = $this->home_delivery == 1 ? 50 : 0;
        $total = $this->home_delivery == 1 ? $total + $home_delivery : $total;

        return ['subtotal' => $subtotal, 'iva' => $iva, 'total' => $total, 'home_delivery' => $home_delivery];
    }
}
