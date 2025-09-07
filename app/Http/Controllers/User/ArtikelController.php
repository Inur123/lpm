<?php

namespace App\Http\Controllers\User;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index()
    {
        // Ambil semua post aktif, terbaru dulu
        $posts = Post::where('status', 'active')
            ->latest()
            ->paginate(9); // 9 post per halaman

        return view('user.post.index', compact('posts'));
    }
    // Menampilkan detail artikel berdasarkan slug
    public function show($slug)
    {
        // Ambil artikel yang aktif berdasarkan slug
        $article = Post::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Tambah view setiap kali artikel dibuka
        $article->increment('views');

        // Ambil 5 artikel terbaru untuk sidebar
        $recentArticles = Post::where('status', 'active')
            ->latest()
            ->take(5)
            ->get();

        // Ambil semua kategori beserta jumlah artikel aktif di masing-masing kategori
        $categories = Category::withCount(['posts' => function ($query) {
            $query->where('status', 'active');
        }])->get();
           $tags = Tag::all(); // <-- Tambahkan ini

        return view('user.post.show', compact('article', 'recentArticles', 'categories', 'tags'));
    }
}
