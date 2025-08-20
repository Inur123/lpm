<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArsipSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 1 surat terbaru
        $latestLetter = ArsipSurat::latest('created_at')->first();

        // Ambil jumlah total surat jika mau ditampilkan di statistik
        $totalLetters = ArsipSurat::count();

        return view('admin.dashboard', compact('latestLetter', 'totalLetters'));
    }
}
