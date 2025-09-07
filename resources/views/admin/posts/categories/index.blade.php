@extends('admin.layouts.app')
@section('title', 'Category - LPM Ibnu Rusyd')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Category Posts</h2>
    <a href="{{ route('categories.create') }}"
       class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg flex items-center">
       <i class="fas fa-plus mr-2"></i>
       Tambah Category
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Daftar Category</h3>
    </div>

    <div class="overflow-x-auto">
        @if ($categories->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($categories as $index => $category)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $categories->firstItem() + $index }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->slug }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-3">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                            <i class="fas fa-edit mr-1"></i>
                            <span>Edit</span>
                        </a>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 flex items-center cursor-pointer" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fas fa-trash mr-1"></i>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="p-6 text-sm text-center text-gray-500">
            Data Category tidak ada.
        </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
        <div class="text-sm text-gray-700">
            Menampilkan {{ $categories->firstItem() }} sampai {{ $categories->lastItem() }} dari {{ $categories->total() }} hasil
        </div>
        <div class="flex space-x-2">
            @if ($categories->onFirstPage())
                <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Sebelumnya</span>
            @else
                <a href="{{ $categories->previousPageUrl() }}" class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Sebelumnya</a>
            @endif

            @php
                $current = $categories->currentPage();
                $last = $categories->lastPage();
                $start = max($current - 1, 1);
                $end = min($current + 1, $last);
                if ($start == 1 && $end < 3) $end = min(3, $last);
                if ($end == $last && $start > $last - 2) $start = max(1, $last - 2);
            @endphp

            @if ($start > 1)
                <a href="{{ $categories->url(1) }}" class="px-3 py-1 rounded-md {{ 1 == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">1</a>
                @if ($start > 2)
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                <a href="{{ $categories->url($i) }}" class="px-3 py-1 rounded-md {{ $i == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $i }}</a>
            @endfor

            @if ($end < $last)
                @if ($end < $last - 1)
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                @endif
                <a href="{{ $categories->url($last) }}" class="px-3 py-1 rounded-md {{ $last == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $last }}</a>
            @endif

            @if ($categories->hasMorePages())
                <a href="{{ $categories->nextPageUrl() }}" class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Selanjutnya</a>
            @else
                <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Selanjutnya</span>
            @endif
        </div>
    </div>
</div>
@endsection
