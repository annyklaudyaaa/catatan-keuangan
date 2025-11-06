<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Catatan;
use Illuminate\Support\Facades\Auth;

class CatatanIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['catatanUpdated' => '$refresh'];

    public function render()
    {
        $catatans = Catatan::where('user_id', Auth::id())
            ->where(function ($q) {
                $q->where('judul', 'like', "%{$this->search}%")
                  ->orWhere('kategori', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(20);

        return view('livewire.catatan-index', compact('catatans'));
    }
public function editCatatan($id)
{
    $this->dispatch('editCatatan', ['id' => $id]);
}


    public function deleteCatatan($id)
    {
        $catatan = Catatan::find($id);

        if (!$catatan) {
            $this->js(<<<'JS'
                Swal.fire({
                    icon: 'error',
                    title: 'Catatan tidak ditemukan!',
                    toast: true,
                    position: 'top-end',
                    timer: 2000,
                    showConfirmButton: false,
                    background: '#1e293b',
                    color: '#bfdbfe'
                });
            JS);
            return;
        }

        if ($catatan->user_id !== Auth::id()) {
            $this->js(<<<'JS'
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak bisa menghapus catatan ini!',
                    toast: true,
                    position: 'top-end',
                    timer: 2000,
                    showConfirmButton: false,
                    background: '#1e293b',
                    color: '#bfdbfe'
                });
            JS);
            return;
        }

        $catatan->delete();

        // 🔄 Refresh data
        $this->dispatch('catatanUpdated');

        // ✅ Notifikasi sukses
        $this->js(<<<'JS'
            Swal.fire({
                icon: 'success',
                title: 'Catatan berhasil dihapus!',
                toast: true,
                position: 'top-end',
                timer: 2000,
                showConfirmButton: false,
                background: '#1e293b',
                color: '#bfdbfe'
            });
        JS);
    }
}


