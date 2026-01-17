<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->get();
        $products = Product::get();
        $recentlyAdd = $products->sortByDesc('created_at')->take(3);
        return view('web.index', compact('categories', 'recentlyAdd'));
    }

    public function about()
    {
        return view('web.about');
    }

    public function shop()
    {
        $products = Product::get();
        $newProducts = $products->sortByDesc('created_at')->take(3);
        return view('web.shop', compact('newProducts'));
    }

    public function faq()
    {
        return view('web.faq');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function recentlyView()
    {
        return view('web.recently-view');
    }

    public function compare()
    {
        return view('web.compare');
    }

    public function product()
    {
        return view('web.product');
    }

    public function singleProduct()
    {
        return view('web.singleProduct');
    }


}
