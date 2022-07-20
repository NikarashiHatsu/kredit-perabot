<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\User;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $creditors;
    public $products;

    public function __construct()
    {
        $this->creditors = User::creditor()->count();
        $this->products = Product::count();
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.admin.index');
    }
}
