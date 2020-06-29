<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
      return view('cart.index');
    }

    public function add(Request $request, Product $product)
    {
        Cart::instance('cart')->add(
            $product->id,
            $product->name,
            $request->product_count,
            $product->getPrice()
        );
        return redirect()->back()->with(['status' => 'The product was added to cart']);
    }
    public function update(Request $request, Product $product)
    {
        if ($request->product_count > $product->quantity){
            return redirect()->back()->with(['status'=> "Product count should be less then {$product->quantity}"]);
        }

    }
    public function delete()
    {

    }
}
