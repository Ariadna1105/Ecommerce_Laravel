<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private function getCart()
    {
        //auth() - Helper from Laravel to return global authenticated session
        //user() - Laravel return actual user
        //cart - We defined relation of user and cart (hasOne) return cart.
        $cart = auth()->user()->cart;

        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id(),
            ]);
        }

        return $cart;
    }

    public function index()
    {
        $cart = $this->getCart();

        //cart has many items, items that have products return
        $items = $cart->items()->with('product')->get();

        return view('cart.index', compact('items'));
    }

    public function add(Request $request, $productId)
    {
        $cart = $this->getCart();

        //Get item with product id
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        //If item exists, adding quantity and saving.
        //If not exists, create
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
        return redirect()->route('cart.index');
    }

    public function update(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);

        $cartItem->delete();

        return redirect()->route('cart.index');
    }
}
