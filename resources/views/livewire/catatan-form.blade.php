<div class="bg-white p-6 rounded-2xl shadow-xl mb-8 border border-gray-200">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">
        {{ $catatan_id ? '✏️ Edit Catatan' : '➕ Tambah Catatan Keuangan' }}
    </h2>

    <form wire:submit.prevent="save" class="space-y-4 text-gray-800">

        <!-- Tanggal -->
        <div>
            <label class="block mb-1 font-semibold">Tanggal</label>
            <input 
                type="date" 
                wire:model="tanggal" 
                class="w-full px-3 py-2 rounded-lg border border-gray-300 text-gray-800
                       focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none bg-white"
            >
            @error('tanggal') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Judul -->
        <div>
            <label class="block mb-1 font-semibold">Judul</label>
            <input 
                type="text" 
                wire:model="judul" 
                placeholder="Contoh: Gaji Bulanan, Makan, Transportasi"
                class="w-full px-3 py-2 rounded-lg border border-gray-300 text-gray-800 bg-white
                       placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none"
            >
            @error('judul') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label class="block mb-1 font-semibold">Kategori</label>
            <select 
                wire:model="kategori" 
                class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-white text-gray-800
                       focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none"
            >
                <option value="">-- Pilih Kategori --</option>
                <option value="pemasukan">💰 Pemasukan</option>
                <option value="pengeluaran">💸 Pengeluaran</option>
            </select>
            @error('kategori') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Jumlah -->
        <div>
            <label class="block mb-1 font-semibold">Jumlah (Rp)</label>
            <input 
                type="number" 
                wire:model="jumlah" 
                placeholder="Masukkan nominal"
                class="w-full px-3 py-2 rounded-lg border border-gray-300 text-gray-800 bg-white
                       placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none"
            >
            @error('jumlah') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label class="block mb-1 font-semibold">Deskripsi</label>
            <textarea 
                wire:model="deskripsi" 
                rows="3" 
                placeholder="Keterangan tambahan..."
                class="w-full px-3 py-2 rounded-lg border border-gray-300 text-gray-800 bg-white
                       placeholder-gray-400 focus:ring-2 focus:ring-blue-400 focus:border-blue-400 focus:outline-none"
            ></textarea>
            @error('deskripsi') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Gambar -->
        <div>
            <label class="block mb-1 font-semibold">Upload Bukti (Opsional)</label>
            <input 
                type="file" 
                wire:model="gambar"
                accept="image/*"
                class="block w-full text-sm
                       file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 
                       file:text-sm file:font-semibold file:bg-blue-600 file:text-white
                       hover:file:bg-blue-700"
            >
            @if ($gambar)
                <img src="{{ $gambar->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover rounded-lg shadow-md">
            @endif
            @error('gambar') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-center pt-4">
            <button 
                type="submit" 
                class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold 
                       shadow-md transition-all duration-200 flex items-center space-x-2"
            >
                <span>💾</span>
                <span>{{ $catatan_id ? 'Update' : 'Simpan' }}</span>
            </button>
        </div>

    </form>
</div>
