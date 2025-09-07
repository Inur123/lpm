@extends('admin.layouts.app')
@section('title', 'Dashboard - LPM Ibnu Rusyd')
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
    <!-- Card Total Posts -->
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-lg">
                <i class="fas fa-newspaper text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Berita</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalPosts }}</p>
            </div>
        </div>
    </div>

    <!-- Card Total Categories -->
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-lg">
                <i class="fas fa-tags text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Kategori</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
            </div>
        </div>
    </div>

    <!-- Card Total Letters -->
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-lg">
                <i class="fas fa-envelope text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Arsip Surat</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalLetters }}</p>
            </div>
        </div>
    </div>

    <!-- Card Total Views Bulan Ini -->
    <div class="bg-white rounded-lg shadow p-4 sm:p-6">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-lg">
                <i class="fas fa-eye text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Views</p>
                <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalViews }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Statistik & Top Posts tetap sama -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-8 mt-6">
    <!-- Chart Views Bulanan -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h3 class="text-base sm:text-lg font-medium text-gray-900">Statistik Views Bulanan</h3>
        </div>
        <div class="p-4 sm:p-6">
            <canvas id="viewsChart" class="w-full h-64"></canvas>
        </div>
    </div>

    <!-- Top 5 Posts -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <h3 class="text-base sm:text-lg font-medium text-gray-900">Top 5 Post Terpopuler</h3>
        </div>
        <div class="p-4 sm:p-6 space-y-4">
            @foreach ($topPosts as $post)
                <div class="flex items-center">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-16 h-16 object-cover rounded-md"
                        alt="{{ $post->title }}">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">{{ \Illuminate\Support\Str::limit($post->title, 40, '...') }}</p>
                        <p class="text-xs text-gray-500">{{ $post->views }} views</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('viewsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Views',
                data: @json($chartData),
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
