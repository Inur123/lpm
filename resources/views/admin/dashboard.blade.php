@extends('admin.layouts.app')
@section('title', 'Dashboard - LPM Ibnu Rusyd')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Berita</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalPosts }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Kategori</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Arsip Surat</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900">{{ $totalLetters }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4 sm:p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">
                        Views Bulan Ini
                    </p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900">
                        {{ $totalViews }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-8">
        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <h3 class="text-base sm:text-lg font-medium text-gray-900">
                    Aktivitas Terbaru
                </h3>
            </div>
            <div class="p-4 sm:p-6">
                <div class="space-y-4">
                    @if ($latestPost)
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    Berita baru ditambahkan
                                </p>
                                <p class="text-sm text-gray-500">
                                    "{{ \Illuminate\Support\Str::limit($latestPost->title, 30, '...') }}"
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $latestPost->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if ($updatedPost)
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    Berita diperbarui
                                </p>
                                <p class="text-sm text-gray-500">
                                    "{{ \Illuminate\Support\Str::limit($updatedPost->title, 30, '...') }}"
                                </p>
                                <p class="text-xs text-gray-400">
                                    {{ $updatedPost->updated_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Contoh penggunaan di Aktivitas Terbaru -->
                    @if ($latestLetter)
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Surat baru diarsipkan</p>
                                <p class="text-sm text-gray-500">"{{ $latestLetter->subjek }}"</p>
                                <p class="text-xs text-gray-400">{{ $latestLetter->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <h3 class="text-base sm:text-lg font-medium text-gray-900">
                    Aksi Cepat
                </h3>
            </div>
            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('posts.index') }}"
                        class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-900">Tambah Berita</span>
                    </a>

                    <a href="{{ route('categories.index') }}"
                        class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-900">Kelola Kategori</span>
                    </a>

                    <a href="{{ route('arsip_surat.index') }}"
                        class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-900">Arsip Surat</span>
                    </a>

                    <a href="../index.html" target="_blank"
                        class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-900">Lihat Website</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
        <!-- Statistik & Top Posts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-8 mt-6">
        <!-- Chart Views -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-4 sm:p-6 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-base sm:text-lg font-medium text-gray-900">Statistik Views</h3>
                <select id="viewFilter"
                    class="text-sm border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-blue-500">
                    <option value="daily">Harian</option>
                    <option value="weekly">Mingguan</option>
                    <option value="monthly" selected>Bulanan</option>
                    <option value="yearly">Tahunan</option>
                </select>
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
                        <img src="{{ asset('storage/' . $post->thumbnail) }}"
                            class="w-16 h-16 object-cover rounded-md" alt="{{ $post->title }}">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                {{ \Illuminate\Support\Str::limit($post->title, 40, '...') }}
                            </p>
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
    let chart = new Chart(ctx, {
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
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Filter event
  document.getElementById('viewFilter').addEventListener('change', function() {
    const filter = this.value;

    fetch(`/admin/views-stats?filter=${filter}`)
        .then(res => res.json())
        .then(res => {
            chart.data.labels = res.labels;
            chart.data.datasets[0].data = res.data;
            chart.update();
        });
});

</script>
@endsection
