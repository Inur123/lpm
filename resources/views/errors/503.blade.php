<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Maintenance | LPM Ibnu Rusyd</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/x-icon">
    <script>
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
            // Tampilkan notif kecil di bawah
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

<body class="bg-white text-gray-900 overflow-auto">

    <!-- 503 Maintenance Section -->
    <section class="min-h-screen bg-gradient-to-br from-yellow-400 to-yellow-600 text-white flex relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <div class="mb-8">
                <h1 class="text-9xl md:text-[12rem] font-bold text-yellow-200 opacity-20">503</h1>
            </div>
            <div class="mb-8">
                <h2 class="text-3xl md:text-5xl font-bold mb-4">Maintenance</h2>
                <p class="text-xl md:text-2xl text-yellow-100 mb-8 max-w-2xl mx-auto">
                    Website sedang dalam perawatan. Kami akan segera kembali! Silakan coba beberapa saat lagi.
                </p>
            </div>

            <!-- Maintenance Details -->
            <div class="mb-8 max-w-2xl mx-auto">
                <div class="bg-white/10 rounded-lg p-6 text-left">
                    <h3 class="text-lg font-semibold mb-4">Kenapa maintenance?</h3>
                    <ul class="space-y-2 text-yellow-100">
                        <li>• Kami sedang melakukan pembaruan sistem</li>
                        <li>• Peningkatan keamanan dan performa website</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Notifikasi klik kanan -->
        <div id="rightClickNotif"
            class="hidden fixed bottom-6 left-1/2 -translate-x-1/2 bg-yellow-700 text-white px-4 py-2 rounded shadow-lg text-sm z-50 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414A7 7 0 1118.364 5.636z" />
            </svg>
            Klik kanan dinonaktifkan di halaman ini.
        </div>
    </section>
    <div id="rightClickNotif"
        class="hidden fixed bottom-6 left-1/2 -translate-x-1/2 bg-gray-900 text-white px-4 py-2 rounded shadow-lg text-sm z-50 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M18.364 5.636l-1.414 1.414A9 9 0 105.636 18.364l1.414-1.414A7 7 0 1118.364 5.636z" />
        </svg>
        Klik kanan dinonaktifkan di halaman ini.
    </div>
</body>

</html>
