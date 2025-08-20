@extends('admin.layouts.app')
@section('title', 'Edit Arsip Surat - LPM Ibnu Rusyd')
@section('content')
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Edit Arsip Surat</h2>
            <p class="mt-1 text-sm text-gray-600">Perbarui data surat di bawah.</p>
        </div>

        <form action="{{ route('arsip_surat.update', $arsipSurat->id) }}" method="POST" enctype="multipart/form-data"
            class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat *</label>
                    <input type="text" name="nomor_surat" id="nomor_surat"
                        value="{{ old('nomor_surat', $arsipSurat->nomor_surat) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                    @error('nomor_surat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Surat -->
                <div>
                    <label for="jenis_surat" class="block text-sm font-medium text-gray-700 mb-2">Jenis Surat *</label>
                    <select name="jenis_surat" id="jenis_surat"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                        <option value="">Pilih Jenis Surat</option>
                        <option value="masuk"
                            {{ old('jenis_surat', $arsipSurat->jenis_surat) == 'Masuk' ? 'selected' : '' }}>Surat Masuk
                        </option>
                        <option value="keluar"
                            {{ old('jenis_surat', $arsipSurat->jenis_surat) == 'Keluar' ? 'selected' : '' }}>Surat Keluar
                        </option>
                    </select>
                    @error('jenis_surat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subjek -->
                <div class="md:col-span-2">
                    <label for="subjek" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                    <input type="text" name="subjek" id="subjek" value="{{ old('subjek', $arsipSurat->subjek) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    @error('subjek')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pengirim -->
                <div>
                    <label for="pengirim" class="block text-sm font-medium text-gray-700 mb-2">Pengirim *</label>
                    <input type="text" name="pengirim" id="pengirim"
                        value="{{ old('pengirim', $arsipSurat->pengirim) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                    @error('pengirim')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Penerima -->
                <div>
                    <label for="penerima" class="block text-sm font-medium text-gray-700 mb-2">Penerima *</label>
                    <input type="text" name="penerima" id="penerima"
                        value="{{ old('penerima', $arsipSurat->penerima) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>
                    @error('penerima')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Surat -->
                <div>
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Surat *</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat"
                        value="{{ old('tanggal_surat', $arsipSurat->tanggal_surat ? $arsipSurat->tanggal_surat->format('Y-m-d') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        required>

                    @error('tanggal_surat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File Upload & Preview -->
                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">File Surat (PDF)</label>
                    @if ($arsipSurat->file)
                        <div class="mb-2 flex items-center gap-2">
                            <span class="text-xs text-gray-600">File saat ini:</span>
                            <button type="button"
                                onclick="window.open('{{ asset('storage/' . $arsipSurat->file) }}', '_blank')"
                                class="inline-flex items-center px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 text-xs font-medium shadow-sm transition cursor-pointer">
                                Lihat File
                            </button>
                        </div>
                    @endif

                    <input type="file" name="file" id="file" accept=".pdf"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">

                    <p class="mt-1 text-xs text-gray-500">Format: PDF. Maksimal: 5MB</p>

                    @error('file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ old('deskripsi', $arsipSurat->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('arsip_surat.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-primary border border-transparent rounded-md text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary cursor-pointer">
                    Update Surat
                </button>
            </div>
        </form>
    </div>
@endsection
