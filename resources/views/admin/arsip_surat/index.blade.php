@extends('admin.layouts.app')
@section('title', 'Arsip Surat - LPM Ibnu Rusyd')
@section('content')
<!-- Header Section with Add Button -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Arsip Surat</h2>
    <a href="{{ route('arsip_surat.create') }}"
       class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Tambah Surat
    </a>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-2 bg-blue-100 rounded-lg">
                <i class="fas fa-file-alt text-blue-600 text-xl"></i>
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
                <i class="fas fa-inbox text-green-600 text-xl"></i>
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
                <i class="fas fa-paper-plane text-yellow-600 text-xl"></i>
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
                <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
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
                    <i class="fas fa-times mr-1"></i> Clear
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Surat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim/Penerima</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($arsip as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->nomor_surat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->subjek }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->deskripsi }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->jenis_surat === 'Masuk' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                            {{ $item->jenis_surat }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->pengirim ?? '-' }} / {{ $item->penerima ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->tanggal_surat ? $item->tanggal_surat->format('d-m-Y') : '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        @if($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-500 underline">Lihat File</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-3">
                        <a href="{{ route('arsip_surat.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('arsip_surat.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 flex items-center cursor-pointer" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
        <div class="text-sm text-gray-700">
            Menampilkan {{ $arsip->firstItem() }} sampai {{ $arsip->lastItem() }} dari {{ $arsip->total() }} hasil
        </div>
        <div class="flex space-x-2">
            @if ($arsip->onFirstPage())
                <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Sebelumnya</span>
            @else
                <a href="{{ $arsip->previousPageUrl() }}" class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Sebelumnya</a>
            @endif

            @php
                $current = $arsip->currentPage();
                $last = $arsip->lastPage();
                $start = max($current - 1, 1);
                $end = min($current + 1, $last);
                if ($start == 1 && $end < 3) { $end = min(3, $last); }
                if ($end == $last && $start > $last - 2) { $start = max(1, $last - 2); }
            @endphp

            @if ($start > 1)
                <a href="{{ $arsip->url(1) }}" class="px-3 py-1 rounded-md {{ 1==$current?'bg-primary text-white':'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">1</a>
                @if ($start > 2)
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                <a href="{{ $arsip->url($i) }}" class="px-3 py-1 rounded-md {{ $i==$current?'bg-primary text-white':'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $i }}</a>
            @endfor

            @if ($end < $last)
                @if ($end < $last - 1)
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                @endif
                <a href="{{ $arsip->url($last) }}" class="px-3 py-1 rounded-md {{ $last==$current?'bg-primary text-white':'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $last }}</a>
            @endif

            @if ($arsip->hasMorePages())
                <a href="{{ $arsip->nextPageUrl() }}" class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Selanjutnya</a>
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
    document.getElementById('searchInput').value = '';
    document.getElementById('typeFilter').value = '';
    document.getElementById('dateFromFilter').value = '';
    document.getElementById('dateToFilter').value = '';
    window.location.href = `{{ route('arsip_surat.index') }}`;
}
</script>
@endsection
