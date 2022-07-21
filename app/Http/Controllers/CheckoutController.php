<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\ApplicationSetting;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application_setting = ApplicationSetting::first();

        return view('checkout.index', [
            'interest_rate' => $application_setting->interest_rate,
            'service_rate' => $application_setting->service_rate,
            'carts' => auth()->user()->carts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCheckoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckoutRequest $request)
    {
        try {
            $application_setting = ApplicationSetting::first();
            $interest_rate = $application_setting->interest_rate;
            $service_rate = $application_setting->service_rate;

            auth()->user()->carts->each(function($cart) use($interest_rate, $service_rate) {
                $total_price = $cart->product->price * $cart->quantity;
                $service_price = $total_price * ($service_rate / 100);
                $installment = (($total_price + $service_price) / ($cart->duration != 0 ? $cart->duration : 1))
                                                + (($total_price + $service_price) / ($cart->duration != 0 ? $cart->duration : 1))
                                                * ($interest_rate / 100);

                $data = [
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                    'duration' => $cart->duration,
                    'subtotal' => $total_price + $service_price,
                    'installment' => $installment,
                    'interest_rate' => $interest_rate,
                    'service_rate' => $service_rate,
                    'payment_receipt' => request()->file('payment_receipt')->store('payment_receipts'),
                ];

                if (Checkout::create($data)) {
                    $cart->delete();
                }
            });
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal membeli: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil membeli');
    }
}
