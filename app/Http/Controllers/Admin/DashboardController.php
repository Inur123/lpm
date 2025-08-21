<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\ArsipSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // --- Statistik umum ---
        $latestLetter     = ArsipSurat::latest('created_at')->first();
        $totalLetters     = ArsipSurat::count();
        $totalCategories  = Category::count();
        $totalPosts       = Post::count();
        $totalViews       = Post::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('views');
        $latestPost       = Post::latest('created_at')->first();
        $updatedPost      = Post::whereColumn('updated_at', '!=', 'created_at')
            ->latest('updated_at')
            ->first();

        // --- Top 5 posts ---
        $topPosts = Post::orderBy('views', 'desc')
            ->take(5)
            ->get();

        // --- Chart data (default: bulanan) ---
        $viewsPerMonth = Post::selectRaw('MONTH(created_at) as month, SUM(views) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        // Buat labels 1-12 bulan
        $chartLabels = [];
        $chartData   = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartLabels[] = \Carbon\Carbon::create()->month($m)->format('F');
            $chartData[]   = $viewsPerMonth[$m] ?? 0;
        }

        return view('admin.dashboard', compact(
            'latestLetter',
            'totalLetters',
            'totalCategories',
            'totalPosts',
            'totalViews',
            'latestPost',
            'updatedPost',
            'topPosts',
            'chartLabels',
            'chartData'
        ));
    }
    public function viewsStats(Request $request)
    {
        $filter = $request->get('filter', 'monthly'); // default bulanan
        $labels = [];
        $data   = [];

        if ($filter === 'daily') {
            // Views per hari bulan ini
            $views = Post::selectRaw('DAY(created_at) as day, SUM(views) as total')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->groupBy('day')
                ->orderBy('day')
                ->pluck('total', 'day');

            $daysInMonth = now()->daysInMonth;
            for ($d = 1; $d <= $daysInMonth; $d++) {
                $labels[] = $d;
                $data[]   = $views[$d] ?? 0;
            }
        } elseif ($filter === 'weekly') {
            // Views per hari dalam minggu ini (Senin - Minggu)
            $startOfWeek = now()->startOfWeek(\Carbon\Carbon::MONDAY);
            $endOfWeek   = now()->endOfWeek(\Carbon\Carbon::SUNDAY);

            $views = Post::selectRaw('DAYOFWEEK(created_at) as day, SUM(views) as total')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->groupBy('day')
                ->pluck('total', 'day');

            // Buat label Senin - Minggu
            $daysMap = [
                2 => 'Senin',
                3 => 'Selasa',
                4 => 'Rabu',
                5 => 'Kamis',
                6 => 'Jumat',
                7 => 'Sabtu',
                1 => 'Minggu',
            ];

            foreach ($daysMap as $key => $dayName) {
                $labels[] = $dayName;
                $data[]   = $views[$key] ?? 0;
            }
        } elseif ($filter === 'yearly') {
            // Views per tahun (5 tahun terakhir)
            $views = Post::selectRaw('YEAR(created_at) as year, SUM(views) as total')
                ->groupBy('year')
                ->orderBy('year')
                ->pluck('total', 'year');

            foreach ($views as $year => $total) {
                $labels[] = $year;
                $data[]   = $total;
            }
        } else {
            // Default bulanan (Jan - Des tahun ini)
            $views = Post::selectRaw('MONTH(created_at) as month, SUM(views) as total')
                ->whereYear('created_at', now()->year)
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total', 'month');

            for ($m = 1; $m <= 12; $m++) {
                $labels[] = \Carbon\Carbon::create()->month($m)->format('F');
                $data[]   = $views[$m] ?? 0;
            }
        }

        return response()->json([
            'labels' => $labels,
            'data'   => $data,
        ]);
    }
}
