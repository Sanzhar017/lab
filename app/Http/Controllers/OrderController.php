<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->warehouse = $request->input('warehouse');
        $order->city = $request->input('city');
        $order->card = $request->input('card');
        $order->quantity = $request->input('quantity');
        $order->date = $request->input('date');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('orders.index')->with('error', 'You do not have permission to edit orders.');
        }

        return view('orders.edit', compact('order'));
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->warehouse = $request->input('warehouse');
        $order->city = $request->input('city');
        $order->card = $request->input('card');
        $order->quantity = $request->input('quantity');
        $order->date = $request->input('date');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
