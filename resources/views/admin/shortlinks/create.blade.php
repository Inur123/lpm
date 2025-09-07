@extends('admin.layouts.app')
@section('title', 'Tambah Short Link - LPM Ibnu Rusyd')
@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Tambah Short Link</h2>
            <p class="mt-1 text-sm text-gray-600">Isi form di bawah untuk membuat link pendek baru.</p>
        </div>

        <form action="{{ route('shortlinks.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        Custom URL (Slug) *
                    </label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            {{ url('/') }}/
                        </span>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                            placeholder="contoh: link-keren"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            required>
                    </div>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Original URL -->
                <div>
                    <label for="original_url" class="block text-sm font-medium text-gray-700 mb-2">
                        URL Asli *
                    </label>
                    <input type="url" name="original_url" id="original_url" value="{{ old('original_url') }}"
                        placeholder="https://contoh.com/artikel/123"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                    @error('original_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('shortlinks.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-primary border border-transparent rounded-md text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary cursor-pointer">
                    Simpan Link
                </button>
            </div>
        </form>
    </div>
@endsection
