@extends('admin.layouts.app')
@section('title', 'Edit Profile')
@section('content')
<div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Kolom Kiri: Foto & Info User -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center lg:items-start">
        @if ($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profile"
                class="w-20 h-20 rounded-full object-cover border mb-4">
        @else
            <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-3xl mb-4">
                <i class="fas fa-user"></i>
            </div>
        @endif
        <div class="text-center lg:text-left">
            <h2 class="text-lg font-bold text-gray-900">{{ $user->name }}</h2>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>
    </div>

    <!-- Kolom Kanan: Form -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4 text-gray-900">Edit Profile</h2>
        <form action="{{ route('admin.setting.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <div class="relative">
                    <input id="password" type="password" name="password"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2"
                        placeholder="Kosongkan jika tidak ingin mengubah">
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
                        <i id="eye-icon" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2"
                        placeholder="Ulangi password baru">
                    <button type="button" onclick="toggleConfirmPassword()"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
                        <i id="confirm-eye-icon" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profile</label>
                <input type="file" name="photo"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2">
            </div>
            <div class="pt-2 flex gap-2">
                <a href="{{ route('dashboard') }}"
                    class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 text-sm cursor-pointer">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eye-icon');
    input.type = input.type === 'password' ? 'text' : 'password';
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}

function toggleConfirmPassword() {
    const input = document.getElementById('password_confirmation');
    const icon = document.getElementById('confirm-eye-icon');
    input.type = input.type === 'password' ? 'text' : 'password';
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}
</script>
@endsection
