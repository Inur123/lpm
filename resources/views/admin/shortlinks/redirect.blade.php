<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPM Ibnu Rusyd - Redirect</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/x-icon">
</head>
<body class="bg-black">

<div class="relative min-h-screen flex items-center justify-center">
    <!-- Background -->
    <img src="{{ asset('images/bg-4.jpg') }}"
         alt="Background"
         class="absolute inset-0 w-full h-full object-cover opacity-80 animate-[pulse_3s_ease-in-out_infinite]">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/50"></div>

    <!-- Card Tengah -->
    <div class="relative z-10 bg-white rounded-xl shadow-2xl p-8 max-w-md w-full text-center transform transition-all hover:scale-[1.03] hover:shadow-xl">

        <!-- Icon Animasi -->
        <div class="flex justify-center mb-5">
            <div class="bg-primary/20 p-4 rounded-full animate-[bounce_1.5s_infinite]">
                <i class="fas fa-paper-plane text-primary text-4xl"></i>
            </div>
        </div>

        <!-- Judul -->
        <h1 class="text-2xl font-extrabold text-gray-800 mb-3 tracking-tight">
            Sedang Mengalihkan...
        </h1>

        <!-- Deskripsi -->
        <p class="text-gray-500 text-sm mb-2">
            Anda akan diarahkan ke link:
        </p>
        <p class="text-primary font-semibold text-lg mb-4">
            {{ $link->slug }}
        </p>

        <!-- Countdown -->
        <p class="text-gray-700 mb-4 text-base">
            Mengalihkan dalam
            <span id="countdown" class="font-bold text-primary text-xl">5</span> detik
        </p>

        <!-- Tombol Kunjungi -->
        <a href="{{ $link->original_url }}"
           class="group inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white font-semibold rounded-xl shadow-lg hover:bg-primary/90 hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            <i class="fas fa-external-link-alt group-hover:rotate-12 transition-transform"></i>
            <span>Kunjungi Sekarang</span>
        </a>

        <!-- Progress Bar -->
        <div class="mt-6 w-full bg-gray-200 rounded-full h-2 overflow-hidden">
            <div id="progress-bar" class="bg-gradient-to-r from-primary via-blue-500 to-purple-500 h-2 w-full transition-all"></div>
        </div>

        <!-- Pesan Terima Kasih -->
        <p class="mt-6 text-xs text-gray-400 italic">
            Terima kasih sudah mengunjungi website kami 🌸
        </p>
    </div>
</div>

<script>
    const duration = 5000; // 5 detik
    const countdownEl = document.getElementById('countdown');
    const progressBar = document.getElementById('progress-bar');

    let startTime = null;

    function animateProgress(timestamp) {
        if (!startTime) startTime = timestamp;
        const elapsed = timestamp - startTime;

        // Progress (0 - 1)
        const progress = Math.min(elapsed / duration, 1);

        // Update progress bar width
        progressBar.style.width = `${100 - (progress * 100)}%`;

        // Update countdown angka (dengan pembulatan)
        const timeLeft = Math.ceil((duration - elapsed) / 1000);
        countdownEl.textContent = timeLeft;

        if (progress < 1) {
            requestAnimationFrame(animateProgress);
        } else {
            window.location.href = "{{ $link->original_url }}";
        }
    }

    requestAnimationFrame(animateProgress);
</script>

</body>
</html>
