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

<body class="min-h-screen bg-linear-to-br from-slate-900 via-slate-800 to-slate-900 py-10 px-4 text-white">

  <div class="max-w-5xl mx-auto bg-linear-to-br from-slate-800/80 via-slate-900/80 to-slate-800/80 backdrop-blur-lg p-8 rounded-2xl shadow-2xl border border-white/10">

    <!-- Header -->
    <div class="text-center mb-6">
      <h1 class="text-4xl font-extrabold bg-linear-to-rrom-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
        💰 Catatan Keuangan
      </h1>
    </div>

    <!-- Komponen Livewire utama -->
    <livewire:catatan-index />

    <!-- Tombol Logout -->
    <div class="flex justify-center mt-10">
      <button
        type="button"
        id="logout-button"
        class="px-6 py-3 bg-linear-to-r from-rose-500 to-pink-600 
               hover:from-rose-600 hover:to-pink-700 
               text-white font-semibold rounded-xl shadow-lg 
               border border-white/20 transition-all"
      >
        🚪 Keluar
      </button>
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
        title: 'Yakin mau keluar?',
        text: 'Sesi kamu akan berakhir dan kamu akan diarahkan ke halaman login.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f43f5e',
        cancelButtonColor: '#475569',
        confirmButtonText: 'Ya, Keluar',
        cancelButtonText: 'Batal',
        background: '#1e293b',
        color: '#bfdbfe'
      }).then((result) => {
        if (result.isConfirmed) {
          logoutForm.submit();
        }
      });
    });
  });
  </script>

</body>
</html>
