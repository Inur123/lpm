<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'LPM Ibnu Rusyd')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/x-icon">
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
        class="fixed bottom-6 right-6 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-colors opacity-0 invisible z-100">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
        </svg>
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
