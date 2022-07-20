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
            'picture' => ['nullable', 'image', 'max:4096'],
        ]);

        try {
            auth()->user()->update($request->only([
                'name',
                'email',
                'picture',
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
