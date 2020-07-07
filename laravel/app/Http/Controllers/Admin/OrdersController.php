<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

        public function index()
    {
        $orders = Order::with('user')->paginate(5);
        return view('admin/orders/index', compact('orders'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order)
    {
        $products=$order->products()->get();
        return view('admin/orders/edit',compact('order','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Order $order
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Order $order,Product $product)
    {
        $order->products()->detach($product->id);
        return redirect(Route('admin.orders.edit',$order))
            ->with(['status' => 'The product removed']);
    }


}
