<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSetting;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show($slug = '')
    {
        $setting = ApplicationSetting::first();

        return view('show', [
            'interest_rate' => $setting->interest_rate,
            'service_rate' => $setting->service_rate,
            'slug' => $slug,
        ]);
    }

    public function search()
    {
        return view('category');
    }

    public function product()
    {
        return view('product');
    }
}
