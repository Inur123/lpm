   <style>
       #mobile-menu {
           position: fixed;
           top: 0;
           left: -100%;
           width: 80%;
           height: 100vh;
           transition: left 0.3s ease-in-out;
           z-index: 50;
       }

       #mobile-menu.menu-open {
           left: 0;
       }

       .menu-overlay {
           position: fixed;
           top: 0;
           left: 0;
           width: 100%;
           height: 100vh;
           background-color: rgba(0, 0, 0, 0.5);
           z-index: 40;
           opacity: 0;
           visibility: hidden;
           transition: opacity 0.3s ease-in-out;
       }

       .menu-overlay.active {
           opacity: 1;
           visibility: visible;
       }
          .nav-active {
        color: #2563eb; /* Sesuaikan warna sesuai tema, contoh: biru */
        font-weight: bold;
    }
   </style>
   <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="flex justify-between items-center h-16">
               <div class="flex items-center">
                   <a href="/" class="flex items-center space-x-3">
                       <!-- Logo -->
                       <img src="https://anisdawim.my.id/images/logo.jpeg" alt="Logo LPM Suara Kampus"
                           class="h-10 w-10 object-contain rounded-full" />
                       <!-- Judul -->
                       <h1 class="text-2xl font-bold text-secondary">LPM Ibnu Rusyd</h1>
                   </a>
               </div>
               <div class="hidden md:block">
                   <div class="ml-10 flex items-baseline space-x-8">
                       <a href="#home"
                           class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Beranda</a>
                       <a href="#about"
                           class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Tentang</a>
                       <a href="#programs"
                           class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Program</a>
                       <a href="#articles"
                           class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Artikel</a>
                       <a href="#team"
                           class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium transition-colors">Tim</a>

                   </div>
               </div>
               <div class="md:hidden">
                   <button id="mobile-menu-button" class="text-gray-700 hover:text-primary">
                       <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M4 6h16M4 12h16M4 18h16" />
                       </svg>
                   </button>
               </div>
           </div>
       </div>
       <!-- Mobile menu -->
       <div id="mobile-menu" class="md:hidden bg-white shadow-lg">
           <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 h-full flex flex-col">
               <div class="flex items-center justify-between p-4 border-b">
                   <h1 class="text-xl font-bold text-primary">LPM Ibnu Rusyd</h1>
                   <button id="close-menu-button" class="text-gray-700 hover:text-primary">
                       <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M6 18L18 6M6 6l12 12" />
                       </svg>
                   </button>
               </div>
               <div class="flex-grow mt-2">
                   <a href="#home"
                       class="block text-gray-700 hover:text-primary px-3 py-2 text-base font-medium">Beranda</a>
                   <a href="#about"
                       class="block text-gray-700 hover:text-primary px-3 py-2 text-base font-medium">Tentang</a>
                   <a href="#programs"
                       class="block text-gray-700 hover:text-primary px-3 py-2 text-base font-medium">Program</a>
                   <a href="#articles"
                       class="block text-gray-700 hover:text-primary px-3 py-2 text-base font-medium">Artikel</a>
                   <a href="#team"
                       class="block text-gray-700 hover:text-primary px-3 py-2 text-base font-medium">Tim</a>

               </div>
           </div>
       </div>
       <!-- Overlay -->
       <div id="menu-overlay" class="menu-overlay"></div>
   </nav>
  <script>
    // ===== Mobile Menu Toggle =====
    const mobileMenuButton = document.getElementById("mobile-menu-button");
    const closeMenuButton = document.getElementById("close-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuOverlay = document.getElementById("menu-overlay");

    function openMenu() {
        mobileMenu.classList.add("menu-open");
        menuOverlay.classList.add("active");
        document.body.style.overflow = "hidden";
    }

    function closeMenu() {
        mobileMenu.classList.remove("menu-open");
        menuOverlay.classList.remove("active");
        document.body.style.overflow = "";
    }

    mobileMenuButton.addEventListener("click", openMenu);
    closeMenuButton.addEventListener("click", closeMenu);
    menuOverlay.addEventListener("click", closeMenu);

    // ===== Navigation Links & Smooth Scroll =====
    const navLinks = document.querySelectorAll('a[href^="#"], a[href^="/"]');

    navLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            const href = this.getAttribute("href");
            const path = window.location.pathname;

            // Jika link anchor (#) tapi berada di halaman selain homepage, redirect dulu
            if (href.startsWith("#") && path !== "/") {
                e.preventDefault();
                window.location.href = "/" + href;
                return;
            }

            // Smooth scroll untuk internal anchor
            if (href.startsWith("#") && path === "/") {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            }

            // Hapus active dari semua link
            navLinks.forEach(a => a.classList.remove('nav-active'));
            // Tambahkan active ke link yang diklik
            this.classList.add('nav-active');

            closeMenu();
        });
    });

    // ===== Set Active Nav Berdasarkan Scroll & URL =====
    function setActiveNav() {
        const path = window.location.pathname;

        navLinks.forEach(link => {
            const href = link.getAttribute("href");

            // Artikel selalu aktif saat berada di halaman /artikel/...
            if (path.startsWith("/artikel") && href.includes("#articles")) {
                link.classList.add("nav-active");
            }
            // Internal anchor di homepage
            else if (href.startsWith("#") && path === "/") {
                const target = document.querySelector(href);
                if (target) {
                    const sectionTop = target.offsetTop - 100;
                    const sectionBottom = sectionTop + target.offsetHeight;
                    if (window.scrollY >= sectionTop && window.scrollY < sectionBottom) {
                        link.classList.add("nav-active");
                    } else {
                        link.classList.remove("nav-active");
                    }
                }
            }
            // Hapus active jika link tidak sesuai kondisi
            else if (!path.startsWith("/artikel")) {
                link.classList.remove("nav-active");
            }
        });
    }

    // ===== Event Listener =====
    window.addEventListener("load", setActiveNav);
    window.addEventListener("scroll", setActiveNav);
</script>


