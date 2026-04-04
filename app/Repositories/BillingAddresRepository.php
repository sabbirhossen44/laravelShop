<?php

namespace App\Repositories;

use App\Models\BillingAddress;
use App\Models\Order;
use Arafat\LaravelRepository\Repository;
use Illuminate\Http\Request;

class BillingAddresRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return BillingAddress::class;
    }

    public static function storeByRequest(Request $request, Order $order)
    {
       self::create([
            'user_id' => auth('web')->user()->id,
            'order_id' => $order->id,
            'order_code' => $order->order_code,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'post' => $request->post,
            'company' => $request->company,
            'massage' => $request->massage
        ]);
    }
}
