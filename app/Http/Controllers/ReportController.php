<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();

        $totalRevenue = Order::where('payment_status', 'paid')
                             ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                             ->sum('total_price');

        $totalOrder = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        
        $averageOrder = $totalOrder > 0 ? $totalRevenue / $totalOrder : 0;
        
        $newCustomers = Customer::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        $chartData = [
            'minggu_1' => Order::where('payment_status', 'paid')
                               ->whereBetween('created_at', [$startOfMonth, $startOfMonth->copy()->addDays(7)])
                               ->sum('total_price'),
            'minggu_2' => Order::where('payment_status', 'paid')
                               ->whereBetween('created_at', [$startOfMonth->copy()->addDays(7), $startOfMonth->copy()->addDays(14)])
                               ->sum('total_price'),
            'minggu_3' => Order::where('payment_status', 'paid')
                               ->whereBetween('created_at', [$startOfMonth->copy()->addDays(14), $startOfMonth->copy()->addDays(21)])
                               ->sum('total_price'),
            'minggu_4' => Order::where('payment_status', 'paid')
                               ->whereBetween('created_at', [$startOfMonth->copy()->addDays(21), $endOfMonth])
                               ->sum('total_price'),
        ];

        $maxWeeklyRevenue = max(array_values($chartData));
        $maxWeeklyRevenue = $maxWeeklyRevenue > 0 ? $maxWeeklyRevenue : 1; 
        
        $chartPercentages = [
            'minggu_1' => ($chartData['minggu_1'] / $maxWeeklyRevenue) * 100,
            'minggu_2' => ($chartData['minggu_2'] / $maxWeeklyRevenue) * 100,
            'minggu_3' => ($chartData['minggu_3'] / $maxWeeklyRevenue) * 100,
            'minggu_4' => ($chartData['minggu_4'] / $maxWeeklyRevenue) * 100,
        ];

        $topServices = Service::withCount('orders')
                              ->orderByDesc('orders_count')
                              ->take(3)
                              ->get();

        $topCustomers = Customer::withCount('orders')
                                ->orderByDesc('orders_count')
                                ->take(3)
                                ->get();

        return view('owner.report.index', compact(
            'totalRevenue', 'totalOrder', 'averageOrder', 'newCustomers',
            'topServices', 'topCustomers', 'startOfMonth', 'endOfMonth',
            'chartData', 'chartPercentages'
        ));
    }

    public function exportPdf()
    {
        $orders = Order::with(['customer', 'service'])->latest()->get();
        $pdf = Pdf::loadView('owner.report.pdf', compact('orders'));
        return $pdf->download('laporan-transaksi-laundry.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new OrderExport, 'laporan-transaksi-laundry.xlsx');
    }
}
