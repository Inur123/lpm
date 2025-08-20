<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | LPM Ibnu Rusyd</title>
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

<body class="bg-white text-gray-900">
    <!-- 403 Error Section -->
    <section class="pt-16 min-h-screen bg-gradient-to-br from-orange-600 to-red-600 text-white flex items-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
            <div class="mb-8">
                <h1 class="text-9xl md:text-[12rem] font-bold text-orange-300 opacity-20">403</h1>
            </div>
            <div class="mb-8">
                <h2 class="text-3xl md:text-5xl font-bold mb-4">Akses Ditolak</h2>
                <p class="text-xl md:text-2xl text-orange-100 mb-8 max-w-2xl mx-auto">
                    Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. Halaman ini mungkin memerlukan login
                    atau hak akses khusus.
                </p>
            </div>
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">

                <a href="index.html"
                    class="border-2 border-white text-white hover:bg-white hover:text-orange-600 px-8 py-3 rounded-lg font-semibold transition-colors">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
</body>

</html>
