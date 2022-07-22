<?php

namespace App\View\Components;

use App\Models\Checkout;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $creditors;
    public $products;
    public $orders;

    public function __construct()
    {
        $orders = Checkout::query()
            ->with('payments')
            ->get()
            ->map(function($order) {
                if ($order->payments->count() > 0) {
                    return $order->payments->filter(function($payment) {
                        return $payment->is_read == false;
                    })->count() > 0 ? true : false;
                }

                return $order->is_read == false ? true : false;
            })
            ->filter(function($order) {
                return $order == true;
            });

        $this->creditors = User::creditor()->count();
        $this->products = Product::count();
        $this->orders = $orders->count();
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
