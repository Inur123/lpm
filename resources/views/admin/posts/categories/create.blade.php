@extends('admin.layouts.app')
@section('title', 'Tambah Category Baru - LPM Ibnu Rusyd')
@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Tambah Category Baru</h2>
            <p class="mt-1 text-sm text-gray-600">Isi form di bawah untuk menambahkan category baru.</p>
        </div>

        <form action="{{ route('categories.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 mb-6">
                <!-- Nama Category -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Category *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('categories.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-primary border border-transparent rounded-md text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary cursor-pointer">
                    Simpan Category
                </button>
            </div>
        </form>
    </div>
@endsection
