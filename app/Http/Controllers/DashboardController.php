<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $totalOrderToday = Order::whereDate('created_at', $today)->count();
        
        $ordersProcessing = Order::whereIn('laundry_status', [
            'sedang_dicuci', 'sedang_dikeringkan', 'sedang_disetrika', 'siap_diantar'
        ])->count();
        
        $ordersCompletedToday = Order::where('laundry_status', 'selesai')
            ->whereDate('updated_at', $today)
            ->count();
            
        $revenueToday = Order::where('payment_status', 'paid')
            ->whereDate('created_at', $today)
            ->sum('total_price');
            
        $revenueThisMonth = Order::where('payment_status', 'paid')
            ->whereBetween('created_at', [$thisMonth, $endOfMonth])
            ->sum('total_price');

        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $weeklyOrders = [];
        $maxWeeklyOrders = 0;
        
        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $count = Order::whereDate('created_at', $date)->count();
            $weeklyOrders[$i] = $count;
            if ($count > $maxWeeklyOrders) {
                $maxWeeklyOrders = $count;
            }
        }
        
        $weeklyChartPercentages = [];
        foreach ($weeklyOrders as $count) {
            $weeklyChartPercentages[] = $maxWeeklyOrders > 0 ? ($count / $maxWeeklyOrders) * 100 : 0;
        }
        
        $weeklyTotalOrders = array_sum($weeklyOrders);
        
        $lastWeekStart = $startOfWeek->copy()->subWeek();
        $lastWeekOrders = Order::whereBetween('created_at', [
            $lastWeekStart, 
            $lastWeekStart->copy()->endOfWeek(Carbon::SUNDAY)
        ])->count();

        $recentActivities = Order::with(['customer', 'service'])->latest()->take(4)->get();

        return view('owner.dashboard', compact(
            'totalOrderToday',
            'ordersProcessing',
            'ordersCompletedToday',
            'revenueToday',
            'revenueThisMonth',
            'weeklyChartPercentages',
            'weeklyTotalOrders',
            'lastWeekOrders',
            'recentActivities'
        ));
    }
}
