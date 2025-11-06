<div class="min-h-screen flex items-center justify-center bg-linear-to-br from-indigo-500 via-purple-500 to-pink-500 px-4">
  <div class="w-full max-w-md bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-2xl transition-transform transform hover:scale-[1.02]">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Masuk ke <span class="text-indigo-600">Catatan Keuangan</span></h2>

    <form wire:submit.prevent="login" class="space-y-5">
      <div>
        <label class="block text-gray-700 mb-1 font-semibold">Email</label>
        <input 
          wire:model.defer="email"
          type="email"
          placeholder="Masukkan email kamu"
          class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition"
        >
        @error('email') 
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-gray-700 mb-1 font-semibold">Password</label>
        <input 
          wire:model.defer="password"
          type="password"
          placeholder="••••••••"
          class="w-full border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition"
        >
        @error('password') 
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-between items-center text-sm text-gray-600">
        <label class="inline-flex items-center">
          <input type="checkbox" wire:model="remember" class="rounded text-indigo-600 focus:ring-indigo-500">
          <span class="ml-2">Ingat saya</span>
        </label>
        <a href="#" class="text-indigo-600 hover:underline font-medium">Lupa password?</a>
      </div>

      <button 
        type="submit"
        class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-semibold shadow-md hover:bg-indigo-700 active:scale-[0.98] transition duration-200"
      >
        Login
      </button>

      <p class="text-sm text-center text-gray-600 mt-4">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">Daftar di sini</a>
      </p>
    </form>
  </div>
</div>

{{-- SweetAlert Listener --}}
<script>
  window.addEventListener('swal', event => {
    Swal.fire(event.detail);
  });

  // Jika session error dari backend
  @if (session('error'))
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'error',
        title: 'Gagal Login',
        text: '{{ session('error') }}',
        confirmButtonColor: '#6366F1',
      });
    });
  @endif
</script>
