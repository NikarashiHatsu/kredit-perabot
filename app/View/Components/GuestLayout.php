<?php

namespace App\View\Components;

use App\Models\ApplicationSetting;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    public $interest_rate;

    public function __construct()
    {
        $this->interest_rate = ApplicationSetting::first()->interest_rate;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest.index');
    }
}
