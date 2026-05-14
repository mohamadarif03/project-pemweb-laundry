<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Voucher;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        $services = Service::all();
        $vouchers = Voucher::all();
        return view('owner.order.create', compact('customers', 'services', 'vouchers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id'    => 'required',
            'service_id'     => 'required',
            'weight'         => 'required|numeric|min:0.1',
            'payment_method' => 'required',
            'payment_status' => 'required',
            'service_order'  => 'required',
        ]);

        $service  = Service::findOrFail($request->service_id);
        $subtotal = $service->price * $request->weight;
        $discount = 0;

        if ($request->voucher_id) {
            $voucher  = Voucher::find($request->voucher_id);
            $discount = $voucher ? ($subtotal * $voucher->discount / 100) : 0;
        }

        Order::create([
            'invoice_code'   => 'INV-' . strtoupper(uniqid()),
            'customer_id'    => $request->customer_id,
            'service_id'     => $request->service_id,
            'pickup_address' => $request->pickup_address ?? '-',
            'weight'         => $request->weight,
            'subtotal'       => $subtotal,
            'discount'       => $discount,
            'total_price'    => $subtotal - $discount,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'laundry_status' => 'order_masuk',
            'service_order'  => $request->service_order,
            'notes'          => $request->notes,
        ]);

        return redirect('/orders')->with('success', 'Order berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $order     = Order::findOrFail($id);
        $customers = Customer::all();
        $services  = Service::all();
        $vouchers  = Voucher::all();
        return view('owner.order.update', compact('order', 'customers', 'services', 'vouchers'));
    }

    public function update(Request $request, $id)
    {
        $order    = Order::findOrFail($id);
        $service  = Service::findOrFail($request->service_id);
        $subtotal = $service->price * $request->weight;
        $discount = 0;

        if ($request->voucher_id) {
            $voucher  = Voucher::find($request->voucher_id);
            $discount = $voucher ? ($subtotal * $voucher->discount / 100) : 0;
        }

        $order->update([
            'customer_id'    => $request->customer_id,
            'service_id'     => $request->service_id,
            'weight'         => $request->weight,
            'subtotal'       => $subtotal,
            'discount'       => $discount,
            'total_price'    => $subtotal - $discount,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'laundry_status' => $request->laundry_status,
            'service_order'  => $request->service_order,
            'notes'          => $request->notes,
        ]);

        return redirect('/orders')->with('success', 'Order berhasil diperbarui!');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['laundry_status' => $request->laundry_status]);
        return back()->with('success', 'Status berhasil diperbarui!');
    }
}