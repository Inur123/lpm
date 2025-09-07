<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
     public function index()
    {
        // Ambil 6 post terbaru yang statusnya 'published'
       $posts = Post::where('status', 'active')
             ->latest('published_at')
             ->take(6)
             ->get();

        return view('user.beranda', compact('posts'));
    }
}
