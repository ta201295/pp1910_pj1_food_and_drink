<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductInterface;
use Illuminate\Support\Str;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;
use Session;
class ProductService
{
    use ImageTrait;
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->get('name', '-'));
        $data['image'] =  $this->uploadImage($request, 'image');

        $this->productRepository->create($data);
    }

    public function update(Request $request, $slug)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->get('name', '-'));
        $data['image'] =  $this->uploadImage($request, 'image');

        $this->productRepository->updateBySlug($slug, $data);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
    }

    public function checkout(Request $request)
    {
        $cart = Session::get('cart');
        $cart->items;

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['total_price'] = $cart->totalPrice;
        $order = Order::create($data);

        $data['order_id'] = $order->id;
        Payment::create($data);
        foreach ($cart->items as $key => $value) {
            $data['order_id'] = $order->id;
            $data['product_id'] = $key;
            $data['quantity'] = $value['qty'];
            $data['total_price'] = ($value['price']);
            OrderDetail::create($data);
        }

        Session::forget('cart');
    }
}
