<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        try {
            Cart::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan produk ke keranjang: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan produk ke keranjang');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        try {
            $cart->update($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal memperbarui keranjang: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil memperbarui keranjang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus produk ke keranjang: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus produk ke keranjang');
    }
}
