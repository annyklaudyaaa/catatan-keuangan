<div class="min-h-screen bg-linear-to-br from-blue-600 via-purple-600 to-pink-500 py-10 px-4">
  <div class="max-w-5xl mx-auto bg-linear-to-br from-slate-800/80 via-slate-900/80 to-slate-800/80 backdrop-blur-lg p-8 rounded-2xl shadow-2xl border border-white/20">
    <h2 class="text-3xl font-bold mb-6 text-center text-black drop-shadow-md">
  💰 Catatan Keuangan
</h2>


    <!-- Pencarian -->
    <input 
      wire:model.live="search"
      type="text" 
      placeholder="🔍 Cari catatan (judul/kategori)..."
      class="w-full px-4 py-2 mb-6 rounded-lg bg-slate-700/50 border border-white/20 
             text-black placeholder-gray-400 
             focus:outline-none focus:ring-2 focus:ring-purple-400"
    >

    <!-- Form Tambah/Edit Catatan -->
    <div class="mb-8">
      <livewire:catatan-form />
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto rounded-xl border border-white/20 shadow-lg bg-slate-900/50">
      <table class="w-full text-sm">
        <thead class="bg-linear-to-r from-blue-600/50 via-purple-600/50 to-pink-500/50 text-white/90">
          <tr>
            <th class="p-3 text-left">Tanggal</th>
            <th class="p-3 text-left">Judul</th>
            <th class="p-3 text-left">Kategori</th>
            <th class="p-3 text-left">Jumlah</th>
            <th class="p-3 text-center">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-white/10 text-black">
          @forelse ($catatans as $c)
            <tr class="hover:bg-white/5 transition duration-150">
              <td class="p-3">{{ $c->tanggal }}</td>
              <td class="p-3 font-semibold">{{ $c->judul }}</td>
              <td class="p-3">
                <span class="px-2 py-1 rounded-full text-xs font-semibold
                  {{ $c->kategori === 'pemasukan' 
                    ? 'bg-emerald-500/30 text-emerald-300 border border-emerald-500/50' 
                    : 'bg-rose-500/30 text-rose-300 border border-rose-500/50' 
                  }}">
                  {{ $c->kategori === 'pemasukan' ? '💰 Pemasukan' : '💸 Pengeluaran' }}
                </span>
              </td>
              <td class="p-3 font-semibold {{ $c->kategori === 'pemasukan' ? 'text-emerald-400' : 'text-rose-400' }}">
                Rp {{ number_format($c->jumlah, 0, ',', '.') }}
              </td>

              <!-- Tombol Aksi -->
              <td class="p-3 text-center space-x-2">
                <button 
                  wire:click="editCatatan({{ $c->id }})"
                  type="button"
                  class="bg-linear-to-r from-amber-500 to-orange-600 
                         hover:from-amber-600 hover:to-orange-700 
                         text-amber-100 px-3 py-1 rounded-md text-sm font-semibold 
                         transition duration-150 border border-amber-400/20">
                  ✏️ Edit
                </button>

                <button 
                    wire:click="deleteCatatan({{ $c->id }})"
                    type="button"
                    class="bg-linear-to-r from-rose-500 to-pink-600 
                           hover:from-rose-600 hover:to-pink-700 
                           text-rose-100 px-3 py-1 rounded-md text-sm font-semibold 
                           transition duration-150 border border-rose-400/20">
                    🗑️ Hapus
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-8 text-gray-600">
                Belum ada catatan keuangan tersimpan 😢
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 text-center text-black">
      {{ $catatans->links(data: ['scrollTo' => false]) }}
    </div>

    <!-- Statistik -->
    <div class="mt-10">
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
      background: '#1e293b',
      color: '#f1f5f9'
    });
  });
</script>
