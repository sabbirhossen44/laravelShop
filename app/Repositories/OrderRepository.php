<?php

namespace App\Repositories;

use App\Models\Order;
use Arafat\LaravelRepository\Repository;
use Illuminate\Http\Request;

class OrderRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return Order::class;
    }

    public static function storeByRequest(Request $request): Order
    {

        $user = auth('web')->user();
        $cartItems = $user->cartItems;
        $orderCode = '#'.str_pad(random_int(1000000000, 9999999999), 10, '0', STR_PAD_LEFT);
        $totalPrice = $cartItems->map(function ($item) {
            return $item->product->discount_price > 0 ? $item->product->discount_price * $item->quantity : $item->product->price * $item->quantity;
        })->sum();
        // dd($totalPrice);
        dd($request->all());

        $order = self::create([
            'user_id' => $user->id,
            'order_code' => $orderCode,
            'charge' => $request->charge,
            'total_price' => $totalPrice
        ]);

        return $order;
    }
}
