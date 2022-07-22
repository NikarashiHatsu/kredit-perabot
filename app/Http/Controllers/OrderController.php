<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Models\Checkout;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.index');
    }

    /**
     * Show the detailed resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        $checkout->update([
            'is_read' => 1,
        ]);

        return view('dashboard.order.show', [
            'checkout' => $checkout,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        try {
            Payment::query()
                ->where('checkout_id', $checkout->id)
                ->where('product_id', $checkout->product_id)
                ->where('payment_order', $request->payment_order)
                ->update([
                    'status' => 'Lunas',
                    'is_read' => true,
                ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah status ke lunas');
    }
}
