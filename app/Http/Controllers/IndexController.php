<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSetting;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'products' => Product::all(),
            'categories' => Category::inRandomOrder()->limit(16)->get(),
        ]);
    }

    public function show(Product $product)
    {
        $setting = ApplicationSetting::first();

        return view('show', [
            'interest_rate' => $setting->interest_rate,
            'service_rate' => $setting->service_rate,
            'product' => $product,
            'might_like_products' => Product::inRandomOrder()->limit(16)->get(),
            'related_products' => Product::where('category_id', $product->category_id)->inRandomOrder()->limit(16)->get(),
            'based_on_search_products' => Product::inRandomOrder()->limit(8)->get(),
        ]);
    }

    public function search(Request $request)
    {
        return view('search', [
            'products' => Product::query()
                ->where('name', 'like', "%{$request->get('query')}%")
                ->paginate(1),
        ]);
    }

    public function product()
    {
        return view('product');
    }
}
