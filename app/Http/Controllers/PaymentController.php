<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // Get shipping address.
        $shippingAddress = Auth::user()->customerAddresses()->find($request->shipping_address_id);

        abort_if(!$shippingAddress, 401);

        $order = new Order;
        $order->total = Cart::total() * 100;
        $order->user()->associate(Auth::user());
        $order->shippingAddress()->associate($shippingAddress);
        $order->save();

        foreach (Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->total = $item->subtotal() * 100;
            $orderItem->quantity = $item->qty;
            $orderItem->book()->associate($item->model);
            $orderItem->order()->associate($order);
            $orderItem->save();
        }

        Cart::destroy();

        return view('orders.success');
    }
}
