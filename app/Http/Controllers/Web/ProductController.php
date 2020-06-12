<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutFormRequest;
use App\Models\Product;
use App\Models\Category;
use App\Repositories\Contracts\ProductInterface;
use App\Services\ProductService;
use App\Traits\ShoppingCartTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ShoppingCartTrait;
    protected $productRepository;
    protected $productService;

    public function __construct(
        ProductInterface $productRepository,
        ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        $categories = Category::all()->sortBy('name');

        return view('web.products.index', compact('products', 'categories'));
    }

    public function filterByCategory(Request $request, $id)
    {
        $products = Product::where('category_id', $id)->paginate(9);
        $categories = Category::all()->sortBy('name');

        return view('web.products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::with('reviews.user')->whereSlug($slug)->firstOrFail();
        $product = json_decode(json_encode($product));
        echo "<pre>"; print_r($product); die;

        return view('web.products.detail', compact('product'));
    }

    public function getAddToCart(Request $request, $id)
    {
        $this->productService->getAddToCart($request, $id);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $this->productService->getDelItemCart($id);
        return redirect()->back();
    }

    public function getCart(){
        $cart = $this->HasCart();
        return view('web.orders.shopping_cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        $cart = $this->HasCart();
        return view('web.orders.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function postCheckout(CheckoutFormRequest $request){
        $this->productService->checkout($request);
        return redirect()->back()->with('success', 'Successfully purchased products!');
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->search.'%')->get();

        return view('web.products.search', compact('products'));
    }
}
