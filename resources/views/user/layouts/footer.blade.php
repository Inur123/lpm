  <footer class="bg-gray-900 text-white py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid md:grid-cols-4 gap-8">
              <div>
                  <div class="flex items-center mb-4">
                      <img class="h-10 w-10 mr-3 rounded-full" src="{{ asset('images/logo.jpeg') }}"
                          alt="Logo LPM Ibnu Rusyd STAIM Magetan" />
                      <h3 class="text-xl font-bold">LPM Ibnu Rusyd</h3>
                  </div>
                  <p class="text-gray-300 mb-4">
                      Lembaga Pers Mahasiswa (LPM) Ibnu Rusyd STAIM Magetan, berkomitmen menyajikan informasi
                      berkualitas dan mengembangkan talenta jurnalistik mahasiswa di lingkungan kampus.
                  </p>
              </div>


              <div>
                  <h4 class="text-lg font-semibold mb-4">Menu</h4>
                  <ul class="space-y-2 text-sm">
                      <li>
                          <a href="#home"
                              class="text-gray-400 hover:text-white transition-colors menu-link">Beranda</a>
                      </li>
                      <li>
                          <a href="#about"
                              class="text-gray-400 hover:text-white transition-colors menu-link">Tentang</a>
                      </li>
                      <li>
                          <a href="#programs"
                              class="text-gray-400 hover:text-white transition-colors menu-link">Program</a>
                      </li>
                      <li>
                          <a href="#articles"
                              class="text-gray-400 hover:text-white transition-colors menu-link">Artikel</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                  <ul class="space-y-2 text-sm">
                      <li>
                          <a href="#" class="text-gray-400 hover:text-white transition-colors">Pelatihan
                              Jurnalistik</a>
                      </li>
                      <li>
                          <a href="#" class="text-gray-400 hover:text-white transition-colors">Liputan
                              Kegiatan</a>
                      </li>
                      <li>
                          <a href="#" class="text-gray-400 hover:text-white transition-colors">Publikasi</a>
                      </li>
                      <li>
                          <a href="#" class="text-gray-400 hover:text-white transition-colors">Media
                              Digital</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                  <ul class="space-y-2 text-sm text-gray-400">
                    <li class="flex space-x-3 mt-2">
                          <!-- Instagram -->
                          <a href="https://instagram.com/username" target="_blank"
                              class="text-gray-300 hover:text-accent transition-colors">
                              <i class="fab fa-instagram text-xl"></i>
                          </a>

                          <!-- TikTok -->
                          <a href="https://tiktok.com/@username" target="_blank"
                              class="text-gray-300 hover:text-accent transition-colors">
                              <i class="fab fa-tiktok text-xl"></i>
                          </a>
                      </li>
                      <li>Gedung Student Center Lt. 2</li>
                      <li>Universitas ABC</li>
                      <li>lpm.suarakampus@university.ac.id</li>
                      <li>+62 812-3456-7890</li>

                  </ul>
              </div>

          </div>
          <div class="border-t border-gray-800 mt-8 pt-8 text-center">
              <p class="text-gray-400 text-sm">
                  © {{ date('Y') }} LPM Ibnu Rusyd. Semua hak cipta dilindungi.
                  <span>
                      Developed by
                      <a href="https://www.instagram.com/anis.dawim?igsh=N3ZodHg1NGdpcXVt" target="_blank"
                          class="text-gray-400 hover:text-blue-500 transition-colors">
                          Anis Dawim
                      </a>
                  </span>
              </p>
          </div>

      </div>
  </footer>
  <script>
      // Smooth scroll untuk menu sidebar
      const menuLinks = document.querySelectorAll('.menu-link');

      menuLinks.forEach(link => {
          link.addEventListener('click', function(e) {
              const href = this.getAttribute('href');
              const path = window.location.pathname;

              // Jika anchor tapi berada di halaman lain, redirect ke homepage
              if (href.startsWith("#") && path !== "/") {
                  e.preventDefault();
                  window.location.href = "/" + href;
                  return;
              }

              // Smooth scroll jika di homepage
              if (href.startsWith("#") && path === "/") {
                  e.preventDefault();
                  const target = document.querySelector(href);
                  if (target) {
                      target.scrollIntoView({
                          behavior: "smooth",
                          block: "start"
                      });
                  }
              }
          });
      });
  </script>
