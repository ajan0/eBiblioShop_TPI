<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function success()
    {
        abort_if(!session()->has('order'), 404);

        return view('orders.success')->with('order', session('order'));
    }   

    public function process()
    {
        $order = session('order');
        $orderItems = session('orderItems');
        
        $order->save();
        $order->items()->saveMany($orderItems);

        Cart::destroy();

        session()->forget('order');
        session()->forget('orderItems');

        session()->flash('order', $order);

        return redirect()->route('payments.success');
    }

    public function store(Request $request)
    {
        // Get shipping address.
        $shippingAddress = Auth::user()->customerAddresses()->find($request->shipping_address_id);

        abort_if(!$shippingAddress, 401);

        // After making sure the shipping address is provided,
        // start preparing the order.
        session()->forget('order');
        session()->forget('orderItems');

        $order = new Order;
        $order->total = Cart::total() * 100;
        $order->user()->associate(Auth::user());
        $order->shippingAddress()->associate($shippingAddress);
        
        session(['order' => $order]);

        $orderItems = collect();
        foreach (Cart::content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->total = $item->subtotal() * 100;
            $orderItem->quantity = $item->qty;
            $orderItem->book()->associate($item->model);
            $orderItem->order()->associate($order);
            
            $orderItems->push($orderItem);
        }
        session(['orderItems' => $orderItems]);

        $itemsFormatted = $orderItems->map(function($orderItem){
            return [
                'price_data' => [
                    'product_data' => [
                        'name' => $orderItem->book->title
                    ],
                    'currency' => 'chf',
                    'unit_amount' => $orderItem->book->price,
                    'tax_behavior' => 'inclusive'
                ],
                'quantity' => $orderItem->quantity,
            ];
        })->toArray();

        // Create a stripe checkout session.
        \Stripe\Stripe::setApiKey("sk_test_51KygB7JqA77dLRtTLmhMdHhgDcHwMnxbqVreDE9GMwqTKLJiLqGvQ8HIdE3KUH6my5AEn3FKSUn9CTVp0zV36MOF00winuxjD5");
        
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $itemsFormatted,
            'shipping' => [
                'address' => $shippingAddress->full
            ],
            'mode' => 'payment',
            'customer_email' => Auth::user()->email,
            'locale' => 'fr',
            'success_url' => 'http://127.0.0.1:8000/pay/process',
            'cancel_url' => 'https://example.com/cancel',
          ]);

        return redirect($session->url);
    }

    public function createSession()
    {
        return response('it works');
    }
}
