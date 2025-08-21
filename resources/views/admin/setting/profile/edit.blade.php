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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
            <form action="{{ route('admin.setting.profile.update') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 px-4 py-2"
                            placeholder="Kosongkan jika tidak ingin mengubah">
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <svg id="eye-icon" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
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
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <svg id="confirm-eye-icon" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
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
                        class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-300 font-semibold cursor-pointer transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-semibold cursor-pointer">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }

        function toggleConfirmPassword() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const confirmEyeIcon = document.getElementById('confirm-eye-icon');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                confirmEyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
            } else {
                confirmPasswordInput.type = 'password';
                confirmEyeIcon.innerHTML =
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>

@endsection
