<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher; 

class PromoController extends Controller
{
    public function index(Request $request)
    {
        $query = Voucher::query();

        if ($request->search) {
            $query->where('code', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            if ($request->status == 'active') {
                $query->where('is_active', true)->whereDate('end_date', '>=', now()->toDateString());
            } elseif ($request->status == 'nonaktif') {
                $query->where('is_active', false)->whereDate('end_date', '>=', now()->toDateString());
            } elseif ($request->status == 'expired') {
                $query->whereDate('end_date', '<', now()->toDateString());
            }
        }

        $promos = $query->latest()->get();

        return view('owner.promo.index', compact('promos'));
    }

    public function store(Request $request)
    {
        // 1. Validasi sesuai name="" di HTML kamu
        $request->validate([
            'code' => 'required',
            'discount_type' => 'required',
            'discount_value' => 'required|numeric',
            'expires_at' => 'required|date',
        ]);

        // 2. Gabungkan tipe dan nilai (Contoh: "10" + "percent" jadi "10%")
        $finalDiscount = ($request->discount_type == 'percent') 
            ? $request->discount_value . '%' 
            : 'Rp' . number_format($request->discount_value, 0, ',', '.');

        // 3. Simpan ke database
        Voucher::create
        ([
            'code' => $request->code,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'start_date' => now(),
            'end_date' => $request->expires_at,
            'is_active' => true,
        ]);

        return back()->with('success', 'Promo berhasil ditambahkan!');
    }

    public function toggleStatus($id)
    {
        $promo = Voucher::findOrFail($id);
        $promo->is_active = !$promo->is_active;
        $promo->save();

        return back();
    }

    public function destroy($id)
    {
        Voucher::findOrFail($id)->delete();
        return back()->with('success', 'Promo berhasil dihapus!');
    }
}