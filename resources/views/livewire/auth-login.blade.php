<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 px-4 py-8">
  <div class="w-full max-w-md">
    <!-- Card Header dengan Icon -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg mb-4">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang Kembali</h2>
      <p class="text-gray-600">Masuk ke <span class="font-semibold text-indigo-600">Catatan Keuangan</span></p>
    </div>

    <!-- Card Form -->
    <div class="bg-gradient-to-br from-white to-indigo-50/30 p-8 rounded-3xl shadow-xl border border-indigo-100">
      <form wire:submit.prevent="login" class="space-y-6">
        <!-- Email Input -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
              </svg>
            </div>
            <input 
              wire:model.defer="email"
              type="email"
              placeholder="nama@email.com"
              class="w-full pl-12 pr-4 py-3 border-2 border-indigo-200 rounded-xl bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition text-gray-800"
            >
          </div>
          @error('email') 
            <p class="text-sm text-red-500 mt-2 flex items-center">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        <!-- Password Input -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
              </svg>
            </div>
            <input 
              wire:model.defer="password"
              type="password"
              placeholder="••••••••"
              class="w-full pl-12 pr-4 py-3 border-2 border-purple-200 rounded-xl bg-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition text-gray-800"
            >
          </div>
          @error('password') 
            <p class="text-sm text-red-500 mt-2 flex items-center">
              <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between">
          <label class="inline-flex items-center cursor-pointer group">
            <input type="checkbox" wire:model="remember" class="w-4 h-4 rounded border-indigo-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer bg-white">
            <span class="ml-2 text-sm text-gray-700 group-hover:text-indigo-600 transition font-medium">Ingat saya</span>
          </label>
          <a href="#" class="text-sm font-semibold text-purple-600 hover:text-purple-700 transition">Lupa password?</a>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit"
          class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-indigo-700 hover:to-purple-700 active:scale-[0.98] transition-all duration-200"
        >
          Masuk Sekarang
        </button>

        <!-- Divider -->
        <div class="relative my-6">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-indigo-200"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-gradient-to-br from-white to-indigo-50/30 text-gray-500">atau</span>
          </div>
        </div>

        <!-- Register Link -->
        <p class="text-center text-gray-700">
          Belum punya akun?
          <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition">Daftar sekarang</a>
        </p>
      </form>
    </div>

    <!-- Footer Text -->
    <p class="text-center text-sm text-gray-600 mt-6 font-medium">
      Kelola keuangan dengan lebih mudah dan terorganisir
    </p>
  </div>
</div>

{{-- SweetAlert Listener --}}
<script>
  window.addEventListener('swal', event => {
    Swal.fire(event.detail);
  });

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
