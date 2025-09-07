@extends('user.layouts.app')
@section('title', 'Artikel - LPM Ibnu Rusyd')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 mt-10">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">Artikel Terbaru</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Baca artikel dan berita terkini dari tim redaksi LPM Ibnu
                Rusyd.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <a href="{{ route('post.show', $post->slug) }}" class="group">
                    <article
                        class="bg-white rounded-lg shadow-md overflow-hidden border border-transparent hover:border-primary transition-all duration-300 transform hover:-translate-y-1">
                        <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : '/images/ino.png' }}"
                            alt="{{ $post->title }}" class="w-full h-48 object-cover" />
                        <div class="p-6">
                            <span
                                class="text-sm text-accent font-semibold">{{ $post->category->name ?? 'Uncategorized' }}</span>
                            <h3 class="text-xl font-semibold mt-2 mb-3">  {{ Str::limit($post->title, 50, '...') }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit(strip_tags($post->content), 100, '...') }}
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <span>{{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $post->author->name ?? 'Admin' }}</span>
                            </div>
                        </div>
                    </article>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12">
                    Belum ada artikel yang tersedia.
                </div>
            @endforelse
        </div>
        <div class="px-6 py-4 border-t border-gray-200 flex justify-center space-x-2 mt-12">
            @php
                $current = $posts->currentPage();
                $last = $posts->lastPage();
                $start = max($current - 1, 1);
                $end = min($current + 1, $last);
                if ($start == 1 && $end < 3) {
                    $end = min(3, $last);
                }
                if ($end == $last && $start > $last - 2) {
                    $start = max(1, $last - 2);
                }
            @endphp

            @if ($start > 1)
                <a href="{{ $posts->url(1) }}"
                    class="px-3 py-1 rounded-md {{ 1 == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">1</a>
                @if ($start > 2)
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                <a href="{{ $posts->url($i) }}"
                    class="px-3 py-1 rounded-md {{ $i == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $i }}</a>
            @endfor

            @if ($end < $last)
                @if ($end < $last - 1)
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                @endif
                <a href="{{ $posts->url($last) }}"
                    class="px-3 py-1 rounded-md {{ $last == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $last }}</a>
            @endif
        </div>



    </div>
@endsection
