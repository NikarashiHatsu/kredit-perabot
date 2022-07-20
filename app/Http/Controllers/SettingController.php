<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'picture' => ['nullable', 'image', 'max:4096'],
            'place_of_birth' => ['nullable', 'string'],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d'],
            'marriage_status' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'identity_card_picture' => ['nullable', 'image', 'max:4096'],
            'family_identity_card_picture' => ['nullable', 'image', 'max:4096'],
            'tax_identity_picture' => ['nullable', 'image', 'max:4096'],
            'salary_slip_picture' => ['nullable', 'image', 'max:4096'],
        ]);

        try {
            auth()->user()->update($request->only([
                'name',
                'email',
                'phone',
                'picture',
                'place_of_birth',
                'date_of_birth',
                'marriage_status',
                'address',
                'identity_card_picture',
                'family_identity_card_picture',
                'tax_identity_picture',
                'salary_slip_picture',
            ]));

            if ($request->password != null) {
                $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

                auth()->user()->password = Hash::make($request->password);
                auth()->user()->save();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah user');
    }
}
