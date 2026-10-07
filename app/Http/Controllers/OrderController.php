<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();
        $order = Order::create($validatedData);
        return redirect()->route('checkout.success')
                     ->with('success_order', $order);
    }

    public function success()
    {
        $order = session('success_order');

        if (!$order) {
            return redirect()->route('checkout.index');
        }

        return view('success', compact('order'));
    }
}
