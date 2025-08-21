@extends('admin.layouts.app')
@section('title', 'Category - LPM Ibnu Rusyd')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Category Posts</h2>
        <a href="{{ route('categories.create') }}"
            class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $categories->firstItem() + $index }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->slug }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-3">

                                    <!-- Edit Button -->
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        <span>Edit</span>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
            @else
                <div class="p-6 text-sm text-center text-gray-500">
                    Data Category tidak ada.
                </div>
            @endif
        </div>


        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Menampilkan {{ $categories->firstItem() }} sampai {{ $categories->lastItem() }} dari
                {{ $categories->total() }} hasil
            </div>
            <div class="flex space-x-2">
                @if ($categories->onFirstPage())
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Sebelumnya</span>
                @else
                    <a href="{{ $categories->previousPageUrl() }}"
                        class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Sebelumnya</a>
                @endif

                @php
                    $current = $categories->currentPage();
                    $last = $categories->lastPage();
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
                    <a href="{{ $categories->url(1) }}"
                        class="px-3 py-1 rounded-md {{ 1 == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">1</a>
                    @if ($start > 2)
                        <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                    @endif
                @endif

                @for ($i = $start; $i <= $end; $i++)
                    <a href="{{ $categories->url($i) }}"
                        class="px-3 py-1 rounded-md {{ $i == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $i }}</a>
                @endfor

                @if ($end < $last)
                    @if ($end < $last - 1)
                        <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-700">...</span>
                    @endif
                    <a href="{{ $categories->url($last) }}"
                        class="px-3 py-1 rounded-md {{ $last == $current ? 'bg-primary text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">{{ $last }}</a>
                @endif

                @if ($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}"
                        class="px-3 py-1 rounded-md bg-primary text-white hover:bg-primary-dark">Selanjutnya</a>
                @else
                    <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">Selanjutnya</span>
                @endif
            </div>
        </div>
    </div>
@endsection
