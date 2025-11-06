<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-10 px-4">
  <div class="max-w-6xl mx-auto">
    
    <!-- Header Section -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-lg mb-4">
        <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>
      <h2 class="text-3xl font-bold text-gray-800 mb-2">Catatan Keuangan</h2>
      <p class="text-gray-600">Kelola dan pantau keuangan Anda dengan mudah</p>
    </div>

    <!-- Pencarian -->
    <div class="bg-white p-4 rounded-2xl shadow-lg mb-6 border border-gray-100">
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
          <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
        <input 
          wire:model.live="search"
          type="text" 
          placeholder="Cari catatan (judul/kategori)..."
          class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200
                 text-gray-800 placeholder-gray-400 
                 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
        >
      </div>
    </div>

    <!-- Form Tambah/Edit Catatan -->
    <div class="mb-8">
      <livewire:catatan-form />
    </div>

    <!-- Tabel -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white">
            <tr>
              <th class="px-6 py-4 text-left text-sm font-semibold">Tanggal</th>
              <th class="px-6 py-4 text-left text-sm font-semibold">Judul</th>
              <th class="px-6 py-4 text-left text-sm font-semibold">Kategori</th>
              <th class="px-6 py-4 text-left text-sm font-semibold">Jumlah</th>
              <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-100">
            @forelse ($catatans as $c)
              <tr class="hover:bg-gray-50 transition duration-150">
                <td class="px-6 py-4 text-gray-700">
                  <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm">{{ $c->tanggal }}</span>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <span class="font-semibold text-gray-800">{{ $c->judul }}</span>
                </td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold
                    {{ $c->kategori === 'pemasukan' 
                      ? 'bg-green-100 text-green-700 border border-green-200' 
                      : 'bg-red-100 text-red-700 border border-red-200' 
                    }}">
                    <span>{{ $c->kategori === 'pemasukan' ? '💰' : '💸' }}</span>
                    <span>{{ $c->kategori === 'pemasukan' ? 'Pemasukan' : 'Pengeluaran' }}</span>
                  </span>
                </td>
                <td class="px-6 py-4">
                  <span class="font-bold text-base {{ $c->kategori === 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                    Rp {{ number_format($c->jumlah, 0, ',', '.') }}
                  </span>
                </td>

                <!-- Tombol Aksi -->
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <button 
                      wire:click="editCatatan({{ $c->id }})"
                      type="button"
                      class="inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-500 
                             hover:from-amber-600 hover:to-orange-600 
                             text-white rounded-lg text-sm font-semibold 
                             shadow-md hover:shadow-lg transition-all duration-200 active:scale-95">
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                      <span>Edit</span>
                    </button>

                    <button 
                        wire:click="deleteCatatan({{ $c->id }})"
                        type="button"
                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 
                               hover:from-red-600 hover:to-pink-600 
                               text-white rounded-lg text-sm font-semibold 
                               shadow-md hover:shadow-lg transition-all duration-200 active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <span>Hapus</span>
                    </button>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-12">
                  <div class="flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                      <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                      </svg>
                    </div>
                    <p class="text-gray-500 font-medium">Belum ada catatan keuangan</p>
                    <p class="text-gray-400 text-sm mt-1">Mulai tambahkan catatan pertama Anda</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
      <div class="bg-white rounded-xl shadow-md p-4 border border-gray-100">
        {{ $catatans->links(data: ['scrollTo' => false]) }}
      </div>
    </div>

    <!-- Statistik -->
    <div class="mt-8">
      <livewire:statistik-keuangan />
    </div>
  </div>
</div>

<script>
  window.addEventListener('showAlert', event => {
    Swal.fire({
      icon: event.detail.type,
      title: event.detail.message,
      toast: true,
      position: 'top-end',
      timer: 2000,
      showConfirmButton: false,
      timerProgressBar: true,
    });
  });
</script>