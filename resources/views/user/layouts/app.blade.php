<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title Dinamis -->
    <title>@yield('title', 'LPM Ibnu Rusyd - STAIM Magetan')</title>

    <!-- Meta SEO -->
    <meta name="description" content="@yield('description', 'LPM Ibnu Rusyd, Lembaga Pers Mahasiswa STAIM Magetan, menyajikan berita, artikel, kegiatan kampus, dan informasi terbaru seputar mahasiswa.')">
    <meta name="keywords" content="@yield('keywords', 'LPM, Ibnu Rusyd, STAIM Magetan, berita kampus, artikel mahasiswa, kegiatan mahasiswa, jurnal kampus')">
    <meta name="author" content="LPM Ibnu Rusyd, STAIM Magetan">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="@yield('title', 'LPM Ibnu Rusyd - STAIM Magetan')" />
    <meta property="og:description" content="@yield('description', 'LPM Ibnu Rusyd, Lembaga Pers Mahasiswa STAIM Magetan, menyajikan berita, artikel, kegiatan kampus, dan informasi terbaru seputar mahasiswa.')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('og_image', asset('images/logo.jpeg'))" />
    <meta property="og:site_name" content="LPM Ibnu Rusyd - STAIM Magetan" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', 'LPM Ibnu Rusyd - STAIM Magetan')" />
    <meta name="twitter:description" content="@yield('description', 'LPM Ibnu Rusyd, Lembaga Pers Mahasiswa STAIM Magetan, menyajikan berita, artikel, kegiatan kampus, dan informasi terbaru seputar mahasiswa.')" />
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo.jpeg'))" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>


    <!-- Tailwind + Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        #back-to-top {
            z-index: 100;
        }
    </style>
</head>


<body class="bg-white text-gray-900">
    @include('user.layouts.navbar')
    @yield('content')
    @include('user.layouts.footer')
   <button id="back-to-top"
    class="fixed bottom-6 right-6 bg-primary text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-blue-700 transition-colors opacity-0 invisible z-50 cursor-pointer">
    <i class="fas fa-arrow-up text-lg"></i>
</button>


    <script>
        // Back to Top Button
        const backToTopButton = document.getElementById("back-to-top");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTopButton.classList.remove("opacity-0", "invisible");
                backToTopButton.classList.add("opacity-100", "visible");
            } else {
                backToTopButton.classList.remove("opacity-100", "visible");
                backToTopButton.classList.add("opacity-0", "invisible");
            }
        });

        backToTopButton.addEventListener("click", () => {
            const header = document.querySelector("#home");
            if (header) {
                header.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    </script>
</body>

</html>
