<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Catatan Keuangan</title>
  @vite('resources/css/app.css')
  @livewireStyles
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">

  <div class="min-h-screen py-8 px-4">

    <!-- Header dengan Navbar -->
    <div class="max-w-6xl mx-auto mb-8">
      <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between">
          
          <!-- Logo & Title -->
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
              <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <div>
              <h1 class="text-2xl font-bold text-gray-800">Catatan Keuangan</h1>
              <p class="text-sm text-gray-500">Dashboard Keuangan Pribadi</p>
            </div>
          </div>

          <!-- User Info & Logout -->
          <div class="flex items-center gap-4">
            <div class="hidden md:flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
              <img 
                src="https://api.dicebear.com/8.x/bottts/svg?seed={{ Auth::user()->name }}"
                class="w-10 h-10 rounded-full border-2 border-white shadow-md"
                alt="avatar"
              >
              <div>
                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
              </div>
            </div>

            <button
              type="button"
              id="logout-button"
              class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-red-500 to-pink-500 
                     hover:from-red-600 hover:to-pink-600 
                     text-white font-semibold rounded-xl shadow-md hover:shadow-lg
                     transition-all duration-200 active:scale-95"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
              </svg>
              <span class="hidden sm:inline">Keluar</span>
            </button>
          </div>

        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto">
      <livewire:catatan-index />
    </div>

    <!-- Form Logout POST tersembunyi -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
      @csrf
      <button type="submit" id="hidden-submit"></button>
    </form>

  </div>

  @livewireScripts

  <script defer>
  document.addEventListener('DOMContentLoaded', function () {
    const logoutButton = document.getElementById('logout-button');
    const logoutForm = document.getElementById('logout-form');

    logoutButton.addEventListener('click', function (e) {
      e.preventDefault();
      Swal.fire({
        title: 'Yakin ingin keluar?',
        text: 'Sesi Anda akan berakhir dan diarahkan ke halaman login.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: '✓ Ya, Keluar',
        cancelButtonText: '✕ Batal',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-xl px-6 py-2.5 font-semibold',
          cancelButton: 'rounded-xl px-6 py-2.5 font-semibold'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Berhasil Keluar!',
            text: 'Sampai jumpa lagi...',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false,
            customClass: {
              popup: 'rounded-2xl'
            }
          }).then(() => {
            logoutForm.submit();
          });
        }
      });
    });
  });
  </script>

</body>
</html>
