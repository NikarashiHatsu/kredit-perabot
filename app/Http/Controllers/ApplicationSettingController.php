<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSetting;
use Illuminate\Http\Request;

class ApplicationSettingController extends Controller
{
    public function index()
    {
        return view('dashboard.application-settings.index', [
            'setting' => ApplicationSetting::first(),
        ]);
    }

    public function update(Request $request, ApplicationSetting $applicationSetting)
    {
        $request->validate([
            'interest_rate' => ['required', 'numeric'],
            'service_rate' => ['required', 'numeric'],
        ]);

        try {
            $applicationSetting->update([
                'interest_rate' => $request->interest_rate,
                'service_rate' => $request->service_rate,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah pengaturan: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah pengaturan');
    }
}
