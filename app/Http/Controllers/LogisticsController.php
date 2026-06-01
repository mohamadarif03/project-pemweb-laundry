<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\Delivery;
use Illuminate\Http\Request;

class LogisticsController extends Controller
{
    public function index()
    {
        $pickups = Pickup::with(['order.customer'])->latest()->get();
        $deliveries = Delivery::with(['order.customer', 'order.payment'])->latest()->get();

        return view('owner.logistics.index', compact('pickups', 'deliveries'));
    }

    public function updatePickupStatus(Request $request, $id)
    {
        $request->validate([
            'pickup_status' => 'required|in:pending,sedang_diambil,selesai'
        ]);

        $pickup = Pickup::findOrFail($id);
        $pickup->update([
            'pickup_status' => $request->pickup_status
        ]);

        return redirect()->route('logistics.index')->with('success', 'Status pickup berhasil diperbarui');
    }

    public function updateDeliveryStatus(Request $request, $id)
    {
        $request->validate([
            'delivery_status' => 'required|in:pending,sedang_diantar,selesai'
        ]);

        $delivery = Delivery::findOrFail($id);
        $delivery->update([
            'delivery_status' => $request->delivery_status
        ]);

        return redirect()->route('logistics.index')->with('success', 'Status delivery berhasil diperbarui');
    }
}
