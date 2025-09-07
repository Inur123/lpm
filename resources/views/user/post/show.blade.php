@extends('user.layouts.app')
@section('title', $article->title . ' - LPM Ibnu Rusyd')
@section('description', Str::limit(strip_tags($article->content), 150))
@section('og_image', $article->thumbnail ? asset('storage/' . $article->thumbnail) : asset('images/logo.jpeg'))

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Article Content -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow p-8">
                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                        class="w-full h-auto rounded-lg mb-6 object-cover" />
                @endif

                <div class="mb-6">
                    <span class="text-sm text-accent font-semibold">{{ $article->category->name ?? 'Uncategorized' }}</span>
                    <h1 class="text-3xl md:text-4xl font-bold mt-2 mb-4 text-gray-900">{{ $article->title }}</h1>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <span>{{ \Carbon\Carbon::parse($article->published_at)->format('d F Y') }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $article->author->name ?? 'Admin LPM' }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $article->views ?? 0 }} views</span>
                    </div>

                </div>

                <div class="prose max-w-none text-gray-800 mb-6">
                    {!! $article->content !!}
                </div>

                {{-- Gambar tambahan --}}
                @if ($article->images->count())
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Foto Kegiatan</h2>
                    </div>
                    <div class="mb-6 grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($article->images as $img)
                            <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar tambahan"
                                class="w-full h-48 object-cover rounded-lg" />
                        @endforeach
                    </div>
                @endif

                {{-- Tags --}}
                @if ($article->tags->count())
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($article->tags as $tag)
                            <span class="px-3 py-1 bg-primary text-white rounded-full text-sm">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <!-- Card Artikel Terbaru -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold mb-4 text-primary">Artikel Terbaru</h2>
                    <ul class="space-y-4">
                        @foreach ($recentArticles as $recent)
                            <li>
                                <a href="{{ route('post.show', $recent->slug) }}"
                                    class="block hover:bg-gray-100 rounded p-2 transition">
                                    <div class="flex items-center gap-3">
                                        @if ($recent->thumbnail)
                                            <img src="{{ asset('storage/' . $recent->thumbnail) }}"
                                                alt="{{ $recent->title }}" class="w-12 h-12 object-cover rounded" />
                                        @else
                                            <div
                                                class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16V8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <div class="text-sm font-semibold text-gray-900 line-clamp-2">
                                                {{ $recent->title }}</div>
                                            <div class="flex items-center justify-between text-xs text-gray-500 mt-1">
                                                <span>{{ \Carbon\Carbon::parse($recent->published_at)->format('d M Y') }}</span>
                                                <span>{{ $recent->views ?? 0 }} views</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <!-- Card Kategori -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold mb-4 text-primary">Kategori</h2>
                    <ul class="space-y-2">
                        @foreach ($categories as $cat)
                            <li>
                                <span class="text-sm text-gray-700">
                                    {{ $cat->name }} ({{ $cat->posts_count }})
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-bold mb-4 text-primary">Tag</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <span class="px-3 py-1 bg-gray-200 text-gray-700 rounded-full text-sm">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
