<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;


class Home extends Component
{

    public function render()
    {
        return view(
            'livewire.dashboard.home'
        );
    }
}
