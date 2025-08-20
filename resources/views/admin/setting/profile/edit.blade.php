@extends('admin.layouts.app')
@section('title', 'Edit Profile')
@section('content')
<div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Kolom Kiri: Foto & Info User -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center lg:items-start">
        @if($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profile" class="w-20 h-20 rounded-full object-cover border mb-4">
        @else
            <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-3xl mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.001 9.001 0 0112 15c2.21 0 4.21.805 5.879 2.146M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        @endif
        <div class="text-center lg:text-left">
            <h2 class="text-lg font-bold text-gray-900">{{ $user->name }}</h2>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>
    </div>

    <!-- Kolom Kanan: Form (lebih besar) -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4 text-gray-900">Edit Profile</h2>
        <form action="{{ route('admin.setting.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2" placeholder="Ulangi password baru">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profile</label>
                <input type="file" name="photo" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2">
            </div>
            <div class="pt-2">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-semibold">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
