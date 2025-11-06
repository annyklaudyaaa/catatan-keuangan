<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Catatan;
use Illuminate\Support\Facades\Auth;

class StatistikKeuangan extends Component
{
    public function render()
    {
       $data = Catatan::selectRaw("EXTRACT(MONTH FROM tanggal) as bulan, kategori, SUM(jumlah) as total")
            ->where('user_id', Auth::id())
            ->groupBy('bulan', 'kategori')
            ->get();

        $bulan = range(1, 12);
        $pemasukan = [];
        $pengeluaran = [];

        foreach ($bulan as $b) {
            $pemasukan[] = $data->where('bulan', $b)->where('kategori', 'pemasukan')->sum('total');
            $pengeluaran[] = $data->where('bulan', $b)->where('kategori', 'pengeluaran')->sum('total');
        }

        return view('livewire.statistik-keuangan', [
            'bulan' => json_encode($bulan),
            'pemasukan' => json_encode($pemasukan),
            'pengeluaran' => json_encode($pengeluaran),
        ]);
    }
}
