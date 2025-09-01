<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $userCount = User::count();
        $productCount = Product::count();
        $categoryCount = Category::count();
        $orderCount = Order::count();
        $orderPending   = Order::where('status', 'pending')->count();
        $orderPaid      = Order::where('status', 'paid')->count();
        $orderShipped   = Order::where('status', 'shipped')->count();
        $orderCompleted = Order::where('status', 'completed')->count();
        $orderCancelled = Order::where('status', 'cancelled')->count();

        // Ambil total pemasukan per bulan (12 bulan)
        $monthlyIncome = Order::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(total_amount) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Buat array 12 bulan biar rapi
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $incomeData = [];
        for ($i = 1; $i <= 12; $i++) {
            $incomeData[] = $monthlyIncome[$i] ?? 0;
        }

        // Ambil total pemasukan per bulan
        $monthlyIncome = Order::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(total_amount) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Ambil total orders per bulan
        $monthlyOrders = Order::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(id) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Biar rapi, isi array 12 bulan
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $incomeData = [];
        $ordersData = [];
        for ($i = 1; $i <= 12; $i++) {
            $incomeData[] = $monthlyIncome[$i] ?? 0;
            $ordersData[] = $monthlyOrders[$i] ?? 0;
        }

        return view('dashboard.index', compact(
            'userCount',
            'productCount',
            'categoryCount',
            'orderCount',
            'orderPending',
            'orderPaid',
            'orderShipped',
            'orderCompleted',
            'orderCancelled',
            'months',
            'incomeData',
            'ordersData'
        ));
    }
}
