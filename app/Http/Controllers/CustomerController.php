<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query()->withCount('orders');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('category')) {
            if ($request->category === 'premium') {
                $query->has('orders', '>=', 10);
            } elseif ($request->category === 'regular') {
                $query->has('orders', '>=', 1)->has('orders', '<', 10);
            } elseif ($request->category === 'new') {
                $query->doesntHave('orders');
            }
        }

        $customers = $query->latest()->get();

        return view('owner.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('owner.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:customers,phone'],
            'address' => ['required', 'string'],
        ]);

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('owner.customer.update', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:customers,phone,' . $id],
            'address' => ['required', 'string'],
        ]);

        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}