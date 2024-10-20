<?php

namespace App\Livewire\User;

use App\Models\Person;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    
    public function boot()
    {
        Paginator::useTailwind();
    }

    public function render()
    {
        $users = $this->searchElement();
        info($users);
        return view('livewire.user.index', ['users' => $users]);
    }

    public function searchElement()
    {
        $search = $this->search;

        $users = User::join('people', 'users.person_id', '=', 'people.id')
            ->where(function ($query) use ($search) {
                $query->where('people.names', 'like', "%{$search}%")
                    ->orWhere('people.surnames', 'like', "%{$search}%")
                    ->orWhere('users.email', 'like', "%{$search}%");
            })
            ->where('users.role_id', '!=', 2)
            ->select('users.*', 'people.names', 'people.surnames', 'users.email')
            ->paginate(10);
        return $users;
    }
}
