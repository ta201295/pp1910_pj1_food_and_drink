<?php

namespace App\Traits;

use App\Models\Cart;
use Session;

trait ShoppingCartTrait 
{
	function HasCart()
	{
		if (!Session::has('cart')) {
            return view('web.orders.shopping_cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return $cart;
	}
}