<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\ArsipSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // --- Statistik umum ---
        $latestLetter    = ArsipSurat::latest('created_at')->first();
        $totalLetters    = ArsipSurat::count();
        $totalCategories = Category::count();
        $totalPosts      = Post::count();

      $totalViews = Post::sum(DB::raw('COALESCE(views,0)'));

        $latestPost  = Post::latest('created_at')->first();
        $updatedPost = Post::whereColumn('updated_at', '!=', 'created_at')
            ->latest('updated_at')
            ->first();

        // --- Top 5 posts ---
        $topPosts = Post::orderByRaw('COALESCE(views,0) DESC')
            ->take(5)
            ->get();

        // --- Chart data bulanan ---
        $viewsPerMonth = Post::selectRaw('MONTH(created_at) as month, SUM(COALESCE(views,0)) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $chartLabels = [];
        $chartData   = [];
        for ($m = 1; $m <= 12; $m++) {
            $chartLabels[] = Carbon::create()->month($m)->locale('id')->translatedFormat('F');
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
}
