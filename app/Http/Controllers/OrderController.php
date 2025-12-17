<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::where('status', 'active')->get();
        return view('orders.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'notes' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(Str::random(8)),
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'notes' => $request->notes,
            'status' => 'pending',
            'total_amount' => 0,
        ]);

        $totalAmount = 0;

        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);
            $quantity = $item['quantity'];
            $price = $product->price;
            $subtotal = $price * $quantity;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $subtotal,
            ]);

            $totalAmount += $subtotal;

            // Update stock
            $product->decrement('stock', $quantity);
        }

        $order->update(['total_amount' => $totalAmount]);

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['customer', 'orderItems.product']);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order->load('orderItems.product');
        $customers = Customer::all();
        $products = Product::where('status', 'active')->get();
        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'notes' => 'nullable|string',
        ]);

        $order->update($request->only(['customer_id', 'order_date', 'status', 'notes']));

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // Restore stock if order is cancelled
        if ($order->status !== 'cancelled') {
            foreach ($order->orderItems as $item) {
                $item->product->increment('stock', $item->quantity);
            }
        }

        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}
