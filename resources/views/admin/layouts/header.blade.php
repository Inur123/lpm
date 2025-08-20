  <header class="bg-white shadow-sm border-b border-gray-200 p-4 sm:p-6">
      <div class="flex items-center justify-between">
          <div class="flex items-center">
              <button id="open-sidebar" class="md:hidden focus:outline-none mr-4" onclick="toggleSidebar()">
                  <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
              </button>
              <h1 class="text-xl sm:text-2xl font-bold text-gray-900">
                  Dashboard
              </h1>
          </div>
          <div class="text-sm text-gray-500">
              <span id="current-date"></span>
          </div>
      </div>
  </header>
  <script>
      function updateDateTime() {
          const now = new Date();

          // format tanggal
          const tanggal = now.toLocaleDateString("id-ID", {
              weekday: "long",
              year: "numeric",
              month: "long",
              day: "numeric"
          });

          // format jam (HH:MM:SS)
          const jam = now.toLocaleTimeString("id-ID", {
              hour: "2-digit",
              minute: "2-digit",
              second: "2-digit"
          });

          // gabungkan
          document.getElementById("current-date").textContent = `${tanggal} | ${jam}`;
      }

      // update setiap detik
      setInterval(updateDateTime, 1000);
      // jalankan sekali saat load
      updateDateTime();
  </script>
