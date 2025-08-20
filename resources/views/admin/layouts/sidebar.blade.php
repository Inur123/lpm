  <div id="sidebar"
      class="fixed inset-y-0 left-0 z-50 w-64 bg-white text-primary flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:static md:w-64">
      <!-- Logo -->
      <div class="flex items-center border-b border-gray-200 p-2 md:p-4 border-r border-primary-200">
          <img class="h-10 w-10 mr-3 hidden md:block" src="https://halosuko.zainur.my.id/images/logo-desa.png"
              alt="Logo Desa" />
          <div>
              <h1 class="text-lg font-bold text-primary">LPM</h1>
              <p class="text-sm text-gray-600">Lembaga Pers Mahasiswa</p>
          </div>
          <button id="close-sidebar" class="ml-auto md:hidden focus:outline-none" onclick="toggleSidebar()">
              <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
          </button>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 p-4 overflow-y-auto">
          <ul class="space-y-2">
              <!-- Dashboard (aktif) -->
              <li>
                  <a href="{{ route('dashboard') }}"
                      class="flex items-center px-4 py-2 rounded-lg font-medium
       {{ request()->routeIs('dashboard*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:bg-gray-100' }}">
                      <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                      </svg>
                      <span>Dashboard</span>
                  </a>
              </li>


              <!-- Kelola Berita Dropdown -->
              <li>
                  <button onclick="toggleDropdown('berita')"
                      class="w-full flex items-center justify-between px-4 py-2 rounded-lg font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                      <div class="flex items-center">
                          <!-- Icon Berita / Document -->
                          <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                              viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                          </svg>
                          Kelola Berita
                      </div>
                      <svg id="berita-arrow" class="w-4 h-4 transition-transform" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                      </svg>
                  </button>
                  <ul id="berita-dropdown" class="hidden ml-8 mt-2 space-y-1">
                      <!-- Category -->
                      <li>
                          <a href="kategori.html"
                              class="flex items-center px-4 py-2 text-sm rounded-lg font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">

                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                              </svg>

                              Category
                          </a>
                      </li>
                      <!-- Berita -->
                      <li>
                          <a href="berita.html"
                              class="flex items-center px-4 py-2 text-sm rounded-lg font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                              <!-- Icon Newspaper -->
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2zM7 10h10M7 14h10M7 18h10" />
                              </svg>
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
                      <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                      </svg>
                      <span>Arsip Surat</span>
                  </a>
              </li>

              <!-- Pengaturan Dropdown -->

              <li>
                  <button onclick="toggleDropdown('pengaturan')"
                      class="w-full flex items-center justify-between px-4 py-2 rounded-lg font-medium text-gray-600 hover:text-primary hover:bg-gray-50 transition-colors">
                      <div class="flex items-center">
                          <!-- Icon Gear -->
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="w-5 h-5 mr-3">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55
                       0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142
                       1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44
                       1.002.12 1.45l-.527.737c-.25.35-.272.806-.107
                       1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94
                       1.109v1.094c0 .55-.397 1.02-.94
                       1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107
                       1.204l.527.738c.32.447.269 1.06-.12
                       1.45l-.774.773a1.125 1.125 0 0
                       1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55
                       0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125
                       1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125
                       1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0
                       1 1.45-.12l.737.527c.35.25.807.272
                       1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>
                          Pengaturan
                      </div>
                      <svg id="pengaturan-arrow" class="w-4 h-4 transition-transform"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                      </svg>
                  </button>

                  <!-- Dropdown Menu -->
                  <ul id="pengaturan-dropdown" class="hidden ml-8 mt-2 space-y-1">
                      <li>
                          <a href="{{ route('admin.setting.profile.edit') }}"
                              class="flex items-center px-4 py-2 text-sm rounded-lg font-medium
                            {{ request()->routeIs('admin.setting.profile*') ? 'text-primary bg-primary/10' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                              <!-- Icon Profile -->
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501
                                20.118a7.5 7.5 0 0 1 14.998
                                0A17.933 17.933 0 0 1 12
                                21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                              </svg>
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
                  class="w-8 h-8 rounded-full flex items-center justify-center mr-3
    {{ Auth::user()->photo ? '' : 'bg-gray-200' }}">
                  @if (Auth::user()->photo)
                      <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto Profile"
                          class="w-full h-full object-cover rounded-full">
                  @else
                      <div class="w-full h-full flex items-center justify-center text-gray-500">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                              stroke-width="1.5" stroke="currentColor" class="w-full">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                          </svg>

                      </div>
                  @endif
              </div>

              <div>
                  <p class="text-sm font-medium" id="admin-name">{{ Auth::user()->name }}</p>
                  <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
              </div>
          </div>

          <form action="{{ route('logout') }}" method="POST" class="w-full">
              @csrf
              <button type="submit"
                  class="w-full flex items-center px-4 py-2 text-red-600 hover:bg-red-100 rounded-lg cursor-pointer">
                  <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3
                     3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013
                     3v1" />
                  </svg>
                  Keluar
              </button>
          </form>

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
  </script>
