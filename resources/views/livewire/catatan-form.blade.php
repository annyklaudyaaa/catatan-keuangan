<div class="bg-white p-8 rounded-3xl shadow-xl mb-8 border border-gray-100">
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg mb-3">
            <span class="text-2xl">{{ $catatan_id ? '✏️' : '➕' }}</span>
        </div>
        <h2 class="text-2xl font-bold text-gray-800">
            {{ $catatan_id ? 'Edit Catatan' : 'Tambah Catatan Keuangan' }}
        </h2>
        <p class="text-sm text-gray-500 mt-1">{{ $catatan_id ? 'Perbarui informasi catatan keuangan' : 'Catat pemasukan atau pengeluaran baru' }}</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-5 text-gray-800">

        <!-- Tanggal -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">📅 Tanggal</label>
            <input 
                type="date" 
                wire:model="tanggal" 
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-800
                       focus:ring-2 focus:ring-green-500 focus:border-transparent transition bg-white"
            >
            @error('tanggal') <span class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
        </div>

        <!-- Judul -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">📝 Judul</label>
            <input 
                type="text" 
                wire:model="judul" 
                placeholder="Contoh: Gaji Bulanan, Makan, Transportasi"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-800 bg-white
                       placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
            >
            @error('judul') <span class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">🏷️ Kategori</label>
            <select 
                wire:model="kategori" 
                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-gray-800
                       focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
            >
                <option value="">-- Pilih Kategori --</option>
                <option value="pemasukan">💰 Pemasukan</option>
                <option value="pengeluaran">💸 Pengeluaran</option>
            </select>
            @error('kategori') <span class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
        </div>

        <!-- Jumlah -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">💵 Jumlah (Rp)</label>
            <input 
                type="number" 
                wire:model="jumlah" 
                placeholder="Masukkan nominal"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-800 bg-white
                       placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
            >
            @error('jumlah') <span class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">📄 Deskripsi</label>
            <textarea 
                wire:model="deskripsi" 
                rows="3" 
                placeholder="Keterangan tambahan..."
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-800 bg-white
                       placeholder-gray-400 focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
            ></textarea>
            @error('deskripsi') <span class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
        </div>

        <!-- Gambar -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">📷 Upload Bukti (Opsional)</label>
            <div class="relative">
                <input 
                    type="file" 
                    wire:model="gambar"
                    accept="image/*"
                    class="block w-full text-sm text-gray-800
                           file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 
                           file:text-sm file:font-semibold file:bg-gradient-to-r file:from-green-600 file:to-emerald-600
                           file:text-white hover:file:from-green-700 hover:file:to-emerald-700 
                           file:transition file:shadow-md cursor-pointer"
                >
            </div>
            @if ($gambar)
                <div class="mt-3">
                    <img src="{{ $gambar->temporaryUrl() }}" class="w-40 h-40 object-cover rounded-2xl shadow-lg border-2 border-gray-100">
                </div>
            @endif
            @error('gambar') <span class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>{{ $message }}</span> @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-center pt-6">
            <button 
                type="submit" 
                class="px-8 py-3.5 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 
                       text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-200 
                       flex items-center space-x-2 active:scale-95"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                <span>{{ $catatan_id ? 'Update Catatan' : 'Simpan Catatan' }}</span>
            </button>
        </div>

    </form>
</div>
