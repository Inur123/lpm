<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - LPM Suara Kampus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script>
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
            let notif = document.getElementById('rightClickNotif');
            notif.classList.remove('hidden');
            notif.classList.add('flex');
            setTimeout(() => {
                notif.classList.add('hidden');
                notif.classList.remove('flex');
            }, 2000);
        });
    </script>
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/bg.jpg') }}');">
    @include('admin.layouts.notification')

    <!-- Card Container -->
    <div
        class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-primary/10 hover:scale-[1.01]">

        <!-- Card Header -->
        <div class="bg-gradient-to-r from-primary to-primary/80 py-6 px-8 text-center">
            <div
                class="mx-auto h-16 w-16 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm">
                <i class="fas fa-book text-white text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white">Admin Dashboard</h2>
            <p class="mt-1 text-sm text-white/90">LPM Suara Kampus</p>
        </div>

        <!-- Card Body -->
        <div class="p-8">
            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input id="email" name="email" type="email" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200"
                        placeholder="Masukkan email" value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-200"
                            placeholder="Masukkan password">
                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i id="eye-icon" class="fas fa-eye text-gray-400"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div>
                    <button type="submit" id="loginButton"
                        class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-primary to-primary/80 hover:from-primary/90 hover:to-primary/70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 transform hover:-translate-y-0.5 cursor-pointer">
                        <span id="loginText">Masuk</span>
                        <!-- Spinner disembunyikan awalnya -->
                        <svg id="loginSpinner" class="hidden animate-spin h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notif Klik Kanan -->
    <div id="rightClickNotif"
        class="hidden fixed bottom-6 left-1/2 -translate-x-1/2 bg-gray-900 text-white px-4 py-2 rounded shadow-lg text-sm z-50 flex items-center gap-2">
        <i class="fas fa-ban text-white"></i>
        Klik kanan dinonaktifkan di halaman ini.
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        // Animasi loading
        const loginForm = document.querySelector('form');
        const loginButton = document.getElementById('loginButton');
        const loginText = document.getElementById('loginText');
        const loginSpinner = document.getElementById('loginSpinner');

        loginForm.addEventListener('submit', function(e) {
            // Ubah tombol jadi mode loading
            loginSpinner.classList.remove('hidden');
            loginText.textContent = 'Loading...';
            loginButton.disabled = true;
            loginButton.classList.add('opacity-70', 'cursor-not-allowed');
        });
    </script>
</body>

</html>
