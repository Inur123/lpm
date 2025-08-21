@extends('admin.layouts.app')
@section('title', 'Arsip Surat - LPM Ibnu Rusyd')
@section('content')
    <!-- Header Section with Add Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Arsip Surat</h2>
        <a href="{{ route('arsip_surat.create') }}"
            class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Surat
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Surat</p>
                    <p class="text-2xl font-bold text-gray-900" id="totalLetters">{{ $totalLetters }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Surat Masuk</p>
                    <p class="text-2xl font-bold text-gray-900" id="incomingLetters">{{ $incomingLetters }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Surat Keluar</p>
                    <p class="text-2xl font-bold text-gray-900" id="outgoingLetters">{{ $outgoingLetters }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-900" id="thisMonthLetters">{{ $thisMonthLetters }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Cari Surat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cari Surat</label>
                <input type="text" id="searchInput" placeholder="Cari nomor, subjek, atau pengirim..."
                    value="{{ request('search') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                    oninput="applyFilter()">
            </div>

            <!-- Jenis Surat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Surat</label>
                <select id="typeFilter" onchange="applyFilter()"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    <option value="">Semua Jenis</option>
                    <option value="Masuk" {{ request('jenis_surat') == 'Masuk' ? 'selected' : '' }}>Surat Masuk</option>
                    <option value="Keluar" {{ request('jenis_surat') == 'Keluar' ? 'selected' : '' }}>Surat Keluar</option>
                </select>
            </div>

            <!-- Dari Tanggal -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
                <input type="date" id="dateFromFilter" onchange="applyFilter()" value="{{ request('date_from') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            </div>

            <!-- Sampai Tanggal + Clear -->
            <div class="flex flex-col">
                <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
                <div class="flex space-x-2">
                    <input type="date" id="dateToFilter" onchange="applyFilter()" value="{{ request('date_to') }}"
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    <button type="button" onclick="clearFilter()"
                        class="px-4 py-2 rounded-md bg-primary text-white hover:bg-secondary flex items-center justify-center font-medium transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear
                    </button>
                </div>
            </div>
        </div>
    </div>



    <!-- Letters Table -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Daftar Arsip Surat</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
                            Surat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pengirim/Penerima</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($arsip as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->nomor_surat }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->subjek }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->deskripsi }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $item->jenis_surat === 'Masuk' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                    {{ $item->jenis_surat }}
                                </span>
                            </td>



                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->pengirim ?? '-' }} /
                                    {{ $item->penerima ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $item->tanggal_surat ? $item->tanggal_surat->format('d-m-Y') : '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    @if ($item->file)
                                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                            class="text-blue-500 underline">
                                            Lihat File
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-3">

                                <!-- Edit Button -->
                                <a href="{{ route('arsip_surat.edit', $item->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    <span>Edit</span>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('arsip_surat.destroy', $item->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-900 flex items-center cursor-pointer"
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Menampilkan {{ $arsip->firstItem() }} sampai {{ $arsip->lastItem() }} dari {{ $arsip->total() }} hasil
            </div>
            <div class="flex space-x-2">
                @if ($arsip->onFirstPage())
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Sebelumnya</span>
                @else
                    <a href="{{ $arsip->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Sebelumnya</a>
                @endif

                @php
                    $current = $arsip->currentPage();
                    $last = $arsip->lastPage();
                    $start = max($current - 1, 1);
                    $end = min($current + 1, $last);

                    // Adjust if we're near the beginning
                if ($start == 1 && $end < 3) {
                    $end = min(3, $last);
                }


                    if ($end == $last && $start > $last - 2) {
                        $start = max(1, $last - 2);
                    }
                @endphp

                <!-- Always show first page -->
                @if ($start > 1)
                    <a href="{{ $arsip->url(1) }}"
                        class="px-3 py-1 rounded-md {{ 1 == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">1</a>
                    @if ($start > 2)
                        <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                    @endif
                @endif

                <!-- Page numbers -->
                @for ($i = $start; $i <= $end; $i++)
                    <a href="{{ $arsip->url($i) }}"
                        class="px-3 py-1 rounded-md {{ $i == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $i }}</a>
                @endfor

                <!-- Always show last page if needed -->
                @if ($end < $last)
                    @if ($end < $last - 1)
                        <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                    @endif
                    <a href="{{ $arsip->url($last) }}"
                        class="px-3 py-1 rounded-md {{ $last == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $last }}</a>
                @endif

                @if ($arsip->hasMorePages())
                    <a href="{{ $arsip->nextPageUrl() }}"
                        class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Selanjutnya</a>
                @else
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Selanjutnya</span>
                @endif
            </div>
        </div>
    </div>
    <script>
        function applyFilter() {
            const search = document.getElementById('searchInput').value;
            const jenis = document.getElementById('typeFilter').value;
            const dateFrom = document.getElementById('dateFromFilter').value;
            const dateTo = document.getElementById('dateToFilter').value;

            const params = new URLSearchParams();
            if (search) params.append('search', search);
            if (jenis) params.append('jenis_surat', jenis);
            if (dateFrom) params.append('date_from', dateFrom);
            if (dateTo) params.append('date_to', dateTo);

            window.location.href = `{{ route('arsip_surat.index') }}?${params.toString()}`;
        }

        function clearFilter() {
            // Reset semua input
            document.getElementById('searchInput').value = '';
            document.getElementById('typeFilter').value = '';
            document.getElementById('dateFromFilter').value = '';
            document.getElementById('dateToFilter').value = '';
            // Reload halaman tanpa query
            window.location.href = `{{ route('arsip_surat.index') }}`;
        }
    </script>
@endsection
