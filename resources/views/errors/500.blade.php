<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | LPM Ibnu Rusyd</title>
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

    <!-- 500 Error Section -->
    <section class="min-h-screen bg-gradient-to-br from-red-600 to-red-800 text-white flex">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <div class="mb-8">
                <h1 class="text-9xl md:text-[12rem] font-bold text-red-300 opacity-20">500</h1>
            </div>
            <div class="mb-8">
                <h2 class="text-3xl md:text-5xl font-bold mb-4">Server Error</h2>
                <p class="text-xl md:text-2xl text-red-100 mb-8 max-w-2xl mx-auto">
                    Maaf, terjadi kesalahan pada server kami. Tim teknis sedang bekerja untuk memperbaiki masalah ini.
                </p>
            </div>

            <!-- Error Details -->
            <div class="mb-8 max-w-2xl mx-auto">
                <div class="bg-white/10 rounded-lg p-6 text-left">
                    <h3 class="text-lg font-semibold mb-4">Apa yang terjadi?</h3>
                    <ul class="space-y-2 text-red-100">
                        <li>• Server mengalami gangguan sementara</li>
                        <li>• Trafik yang tinggi menyebabkan server overload</li>
                    </ul>
                </div>
            </div>
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
