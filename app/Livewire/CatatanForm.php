<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Catatan;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class CatatanForm extends Component
{
    use WithFileUploads;

    public $tanggal, $judul, $kategori, $jumlah, $deskripsi, $gambar, $catatan_id;

    public function render()
    {
        return view('livewire.catatan-form');
    }

    public function save()
    {
        $data = $this->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($this->gambar) {
            $data['gambar'] = $this->gambar->store('catatan', 'public');
        }

        $data['user_id'] = Auth::id();

        if ($this->catatan_id) {
            $catatan = Catatan::find($this->catatan_id);
            if ($catatan) {
                $catatan->update($data);
            }
        } else {
            Catatan::create($data);
        }

        $this->reset();

        $this->dispatch('catatanUpdated');

        $this->js("Swal.fire({
            icon: 'success',
            title: 'Catatan berhasil disimpan!',
            toast: true,
            position: 'top-end',
            timer: 2000,
            showConfirmButton: false,
            background: '#1e293b',
            color: '#bfdbfe'
        })");
    }

    // ✅ Tangkap event edit dari daftar catatan
    #[On('editCatatan')]
    public function editCatatan($payload = null)
    {
        $id = is_array($payload) ? ($payload['id'] ?? null) : $payload;
        if (!$id) return;

        $catatan = Catatan::find($id);
        if (!$catatan) return;

        $this->tanggal = $catatan->tanggal;
        $this->judul = $catatan->judul;
        $this->kategori = $catatan->kategori;
        $this->jumlah = $catatan->jumlah;
        $this->deskripsi = $catatan->deskripsi;
        $this->catatan_id = $catatan->id;

        $this->js("window.scrollTo({ top: 0, behavior: 'smooth' })");
    }
}
