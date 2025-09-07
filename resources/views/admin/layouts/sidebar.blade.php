  <div id="sidebar"
      class="fixed inset-y-0 left-0 z-50 w-64 bg-white text-primary flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:static md:w-64">
      <!-- Logo -->
      <div class="flex items-center border-b border-gray-200 p-2 md:p-4 border-r border-primary-200">
          <img class="h-10 w-10 mr-3 hidden md:block rounded-full" src="{{ asset('images/logo.jpeg') }}" alt="Logo Desa" />
          <div>
              <h1 class="text-lg font-bold text-primary">LPM</h1>
              <p class="text-sm text-gray-600">Lembaga Pers Mahasiswa</p>
          </div>
          <button id="close-sidebar" class="ml-auto md:hidden focus:outline-none" onclick="toggleSidebar()">
              <i class="fas fa-times text-gray-600 text-lg"></i>
          </button>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 p-4 overflow-y-auto">
          <ul class="space-y-2">
              <!-- Dashboard -->
              <li>
                  <a href="{{ route('dashboard') }}"
                      class="flex items-center px-4 py-2 rounded-lg font-medium
                    {{ request()->routeIs('dashboard*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:bg-gray-100' }}">
                      <i class="fas fa-tachometer-alt mr-3"></i>
                      <span>Dashboard</span>
                  </a>
              </li>

              <!-- Kelola Berita Dropdown -->
              <li>
                  <button onclick="toggleDropdown('berita')"
                      class="w-full flex items-center justify-between px-4 py-2 rounded-lg font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                      <div class="flex items-center">
                          <i class="fas fa-newspaper mr-3"></i>
                          Kelola Berita
                      </div>
                      <i id="berita-arrow" class="fas fa-chevron-down transition-transform"></i>
                  </button>
                  <ul id="berita-dropdown" class="hidden ml-8 mt-2 space-y-1">
                      <!-- Category -->
                      <li>
                          <a href="{{ route('categories.index') }}"
                              class="flex items-center px-4 py-2 text-sm rounded-lg font-medium
                            {{ request()->routeIs('categories.*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                              <i class="fas fa-tags mr-2"></i>
                              Category
                          </a>
                      </li>
                      <!-- Berita -->
                      <li>
                          <a href="{{ route('posts.index') }}"
                              class="flex items-center px-4 py-2 text-sm rounded-lg font-medium
                            {{ request()->routeIs('posts.*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                              <i class="fas fa-newspaper mr-2"></i>
                              Berita
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Arsip Surat -->
              <li>
                  <a href="{{ route('arsip_surat.index') }}"
                      class="flex items-center px-4 py-2 rounded-lg font-medium
                    {{ request()->routeIs('arsip_surat*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:bg-gray-100' }}">
                      <i class="fas fa-envelope mr-3"></i>
                      <span>Arsip Surat</span>
                  </a>
              </li>
              <li>
    <a href="{{ route('shortlinks.index') }}"
        class="flex items-center px-4 py-2 rounded-lg font-medium
        {{ request()->routeIs('shortlinks*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:bg-gray-100' }}">
        <i class="fas fa-link mr-3"></i>
        <span>Short Links</span>
    </a>
</li>


              <!-- Pengaturan Dropdown -->
              <li>
                  <button onclick="toggleDropdown('pengaturan')"
                      class="w-full flex items-center justify-between px-4 py-2 rounded-lg font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                      <div class="flex items-center">
                          <i class="fas fa-cog mr-3"></i>
                          Pengaturan
                      </div>
                      <i id="pengaturan-arrow" class="fas fa-chevron-down transition-transform"></i>
                  </button>
                  <ul id="pengaturan-dropdown" class="hidden ml-8 mt-2 space-y-1">
                      <li>
                          <a href="{{ route('admin.setting.profile.edit') }}"
                              class="flex items-center px-4 py-2 text-sm rounded-lg font-medium
                            {{ request()->routeIs('admin.setting.profile*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                              <i class="fas fa-user mr-2"></i>
                              Profile
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      </nav>

      <!-- User Info & Logout -->
      <div class="p-4 border-t border-gray-200">
          <div class="flex items-center mb-3">
              <div
                  class="w-8 h-8 rounded-full flex items-center justify-center mr-3 {{ Auth::user()->photo ? '' : 'bg-gray-200' }}">
                  @if (Auth::user()->photo)
                      <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto Profile"
                          class="w-full h-full object-cover rounded-full">
                  @else
                      <i class="fas fa-user text-gray-500"></i>
                  @endif
              </div>
              <div>
                  <p class="text-sm font-medium" id="admin-name">{{ Auth::user()->name }}</p>
                  <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
              </div>
          </div>

          <button id="showLogoutModal"
              class="w-full flex items-center px-4 py-2 text-red-600 hover:bg-red-100 rounded-lg cursor-pointer">
              <i class="fas fa-sign-out-alt mr-3"></i>
              Keluar
          </button>
      </div>


  </div>
  <!-- Modal -->
  <div id="logoutModal" class="hidden fixed inset-0 flex items-center justify-center bg-black/30 backdrop-blur-sm z-50">
      <div class="bg-white rounded-lg shadow-lg p-6 w-80">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Logout</h2>
          <p class="text-gray-600 mb-6">Apakah Anda yakin ingin logout?</p>
          <div class="flex justify-end space-x-3">
              <button id="cancelLogout"
                  class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700 cursor-pointer">Batal</button>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit"
                      class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-white cursor-pointer">Logout</button>
              </form>
          </div>
      </div>
  </div>
  <script>
      // Toggle dropdown
      function toggleDropdown(id) {
          const dropdown = document.getElementById(id + "-dropdown");
          const arrow = document.getElementById(id + "-arrow");

          if (dropdown.classList.contains("hidden")) {
              dropdown.classList.remove("hidden");
              arrow.style.transform = "rotate(180deg)";
          } else {
              dropdown.classList.add("hidden");
              arrow.style.transform = "rotate(0deg)";
          }
      }

      // Toggle sidebar
      function toggleSidebar() {
          const sidebar = document.getElementById("sidebar");
          sidebar.classList.toggle("-translate-x-full");
      }

      // Close sidebar when clicking outside on mobile
      document.addEventListener("click", (e) => {
          const sidebar = document.getElementById("sidebar");
          const openButton = document.getElementById("open-sidebar");
          if (
              !sidebar.contains(e.target) &&
              !openButton.contains(e.target) &&
              !sidebar.classList.contains("-translate-x-full")
          ) {
              sidebar.classList.add("-translate-x-full");
          }
      });
      // Logout Modal
      const showLogoutBtn = document.getElementById('showLogoutModal');
      const logoutModal = document.getElementById('logoutModal');
      const cancelLogoutBtn = document.getElementById('cancelLogout');

      // Tampilkan modal saat tombol logout ditekan
      showLogoutBtn.addEventListener('click', () => {
          logoutModal.classList.remove('hidden');
      });

      // Tutup modal saat tombol batal ditekan
      cancelLogoutBtn.addEventListener('click', () => {
          logoutModal.classList.add('hidden');
      });

      // Tutup modal jika klik di luar konten modal
      logoutModal.addEventListener('click', (e) => {
          if (e.target === logoutModal) {
              logoutModal.classList.add('hidden');
          }
      });
  </script>
