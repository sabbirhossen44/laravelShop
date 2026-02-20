<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $user = auth('web')->user();
        $wishlists = Wishlist::where('user_id', $user?->id)->get();
        return view('web.wishlist', compact('user', 'wishlists'));
    }

    public function store($slug)
    {
        $productId = Product::where('slug', $slug)->first()?->id;

        $userId = auth('web')->user()?->id;

        $exists = Wishlist::where('user_id', $userId)->where('product_id', $productId)->exists();
        if ($exists) {
            return back()->with('error', 'Product already added to wishlist.');
        }

        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $productId
        ]);

        return back()->with('success', 'Product added to wishlist.');
    }

    public function destroy($slug)
    {
        $productId = Product::where('slug', $slug)->first()?->id;

        $userId = auth('web')->user()?->id;

        $wishlist = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($wishlist) {
            $wishlist->delete();
        }

        return back()->with('success', 'Product removed from wishlist.');
    }
}
