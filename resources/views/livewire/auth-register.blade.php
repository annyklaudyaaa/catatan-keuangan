<div class="min-h-screen flex items-center justify-center bg-linear-to-br from-indigo-500 via-purple-500 to-pink-500 px-4">
  <div class="w-full max-w-md bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-2xl transition-transform transform hover:scale-[1.02]">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
      Buat Akun <span class="text-purple-600">Baru</span>
    </h2>

    <form wire:submit.prevent="register" class="space-y-5">
      <div>
        <label class="block text-gray-700 mb-1 font-semibold">Nama Lengkap</label>
        <input 
          wire:model.defer="name" 
          type="text" 
          placeholder="Masukkan nama lengkap"
          class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition"
        >
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-gray-700 mb-1 font-semibold">Email</label>
        <input 
          wire:model.defer="email" 
          type="email" 
          placeholder="contoh@email.com"
          class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition"
        >
        @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-gray-700 mb-1 font-semibold">Password</label>
        <input 
          wire:model.defer="password" 
          type="password"
          placeholder="••••••••"
          class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition"
        >
        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-gray-700 mb-1 font-semibold">Konfirmasi Password</label>
        <input 
          wire:model.defer="password_confirmation" 
          type="password"
          placeholder="Ulangi password"
          class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition"
        >
        @error('password_confirmation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
      </div>

      <button 
        type="submit" 
        class="w-full bg-purple-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:bg-purple-700 active:scale-[0.98] transition duration-200"
      >
        Daftar Sekarang
      </button>

      <p class="text-sm text-center text-gray-600 mt-4">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-purple-600 font-semibold hover:underline">Masuk di sini</a>
      </p>
    </form>
  </div>
</div>

{{-- SweetAlert Listener --}}
<script>
  window.addEventListener('swal', event => {
    Swal.fire(event.detail);
  });

  // Jika session success dari backend
  @if (session('success'))
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#8B5CF6',
      });
    });
  @endif
</script>
