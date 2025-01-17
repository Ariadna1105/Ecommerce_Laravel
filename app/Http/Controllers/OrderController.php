<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        //Return cart.
        $cart = auth()->user()->cart;

        //if cart without items returning page with message
        if (!$cart || $cart->items->count() == 0) {
            return redirect()->route('cart.index')->with(
                'message', 'Your cart is empty you can\'t checkout order');
	}

        //Return all items
        $items = $cart->items()->with('product')->get();
        $total = 0;

        foreach ($items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        //Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount' => $total,
        ]);

        //Connect items to order
        foreach ($items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        //Empty cart
        $cart->items()->delete();

        return redirect()->route('orders.show', $order->id)->with('message', 'Order placed succsessfully');
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
