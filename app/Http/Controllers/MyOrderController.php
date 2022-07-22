<?php

namespace App\Http\Controllers;

use App\DataTables\MyOrderDataTable;
use App\Models\Checkout;
use App\Models\Payment;
use Illuminate\Http\Request;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MyOrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.my-order.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCheckoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'checkout_id' => ['required', 'exists:checkouts,id'],
            'product_id' => ['required', 'exists:products,id'],
            'payment_order' => ['required', 'integer'],
            'invoice' => ['required', 'image', 'max:4096'],
            'created_at' => ['required', 'date_format:Y-m-d'],
        ]);

        try {
            Payment::create($request->only([
                'checkout_id',
                'product_id',
                'payment_order',
                'invoice',
                'created_at',
            ]));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan cicilan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        return view('dashboard.my-order.show', [
            'checkout' => $checkout,
        ]);
    }
}
