<div class="bg-linear-to-br from-slate-800/80 via-slate-900/80 to-slate-800/80 backdrop-blur-lg p-6 mt-10 rounded-2xl shadow-xl border border-white/20">
   <h2 class="text-2xl font-bold mb-6 text-center text-black">
    📊 Statistik Keuangan Kamu
</h2>

    <!-- 🔹 Ringkasan Total -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center mb-8">
        <div class="bg-emerald-500/20 border border-emerald-500/30 p-4 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-emerald-300">Total Pemasukan</h3>
            <p class="text-2xl font-bold mt-2 text-emerald-400">Rp {{ number_format(
                \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pemasukan')->sum('jumlah'),
                0, ',', '.') }}</p>
        </div>

        <div class="bg-rose-500/20 border border-rose-500/30 p-4 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-rose-300">Total Pengeluaran</h3>
            <p class="text-2xl font-bold mt-2 text-rose-400">Rp {{ number_format(
                \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pengeluaran')->sum('jumlah'),
                0, ',', '.') }}</p>
        </div>

        <div class="bg-blue-500/20 border border-blue-500/30 p-4 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-blue-300">Saldo Akhir</h3>
            <p class="text-2xl font-bold mt-2 text-blue-400">
                @php
                    $pemasukan = \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pemasukan')->sum('jumlah');
                    $pengeluaran = \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pengeluaran')->sum('jumlah');
                    $saldo = $pemasukan - $pengeluaran;
                @endphp
                Rp {{ number_format($saldo, 0, ',', '.') }}
            </p>
        </div>
    </div>

    <!-- 🔹 Grafik Statistik -->
    <div class="bg-slate-900/50 border border-white/10 p-4 rounded-2xl">
        <canvas id="chartKeuangan" height="120"></canvas>
    </div>
</div>

<!-- ✅ Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('livewire:init', () => {
    const ctx = document.getElementById('chartKeuangan').getContext('2d');

    const chartData = {
        labels: {!! $bulan !!}.map(b => {
            const namaBulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            return namaBulan[b - 1];
        }),
        datasets: [
            {
                label: 'Pemasukan',
                data: {!! $pemasukan !!},
                borderColor: 'rgba(34,197,94,1)',
                backgroundColor: 'rgba(34,197,94,0.2)',
                tension: 0.4,
                fill: true
            },
            {
                label: 'Pengeluaran',
                data: {!! $pengeluaran !!},
                borderColor: 'rgba(239,68,68,1)',
                backgroundColor: 'rgba(239,68,68,0.2)',
                tension: 0.4,
                fill: true
            }
        ]
    };

    new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#94a3b8', // slate-400
                        callback: value => 'Rp ' + value.toLocaleString('id-ID')
                    },
                    grid: { color: 'rgba(148,163,184,0.1)' } // slate-400 with opacity
                },
                x: {
                    ticks: { color: '#94a3b8' }, // slate-400
                    grid: { color: 'rgba(148,163,184,0.1)' }
                }
            },
            plugins: {
                legend: {
                    labels: { 
                        color: '#94a3b8', // slate-400
                        font: { weight: 'bold' } 
                    }
                },
                tooltip: {
                    callbacks: {
                        label: (context) => 'Rp ' + context.formattedValue
                    },
                    backgroundColor: 'rgba(15,23,42,0.8)', // slate-900 with opacity
                    titleColor: '#e2e8f0', // slate-200
                    bodyColor: '#e2e8f0', // slate-200
                    borderColor: 'rgba(148,163,184,0.2)', // slate-400 with opacity
                    borderWidth: 1
                }
            }
        }
    });
});
</script>
