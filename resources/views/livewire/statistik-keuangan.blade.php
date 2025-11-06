<div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg mb-3">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-800">Statistik Keuangan</h2>
        <p class="text-sm text-gray-500 mt-1">Ringkasan dan grafik keuangan Anda</p>
    </div>

    <!-- Ringkasan Total -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Pemasukan -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border-2 border-green-200 p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-3xl">💰</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Total Pemasukan</h3>
            <p class="text-2xl font-bold text-green-600">
                Rp {{ number_format(
                    \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pemasukan')->sum('jumlah'),
                    0, ',', '.') }}
            </p>
        </div>

        <!-- Total Pengeluaran -->
        <div class="bg-gradient-to-br from-red-50 to-pink-50 border-2 border-red-200 p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <span class="text-3xl">💸</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Total Pengeluaran</h3>
            <p class="text-2xl font-bold text-red-600">
                Rp {{ number_format(
                    \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pengeluaran')->sum('jumlah'),
                    0, ',', '.') }}
            </p>
        </div>

        <!-- Saldo Akhir -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border-2 border-blue-200 p-6 rounded-2xl shadow-md hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-between mb-3">
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <span class="text-3xl">💳</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600 mb-2">Saldo Akhir</h3>
            <p class="text-2xl font-bold text-blue-600">
                @php
                    $pemasukan = \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pemasukan')->sum('jumlah');
                    $pengeluaran = \App\Models\Catatan::where('user_id', Auth::id())->where('kategori', 'pengeluaran')->sum('jumlah');
                    $saldo = $pemasukan - $pengeluaran;
                @endphp
                Rp {{ number_format($saldo, 0, ',', '.') }}
            </p>
        </div>
    </div>

    <!-- Grafik Statistik -->
    <div class="bg-gradient-to-br from-gray-50 to-slate-50 border border-gray-200 p-6 rounded-2xl shadow-md">
        <div class="flex items-center gap-2 mb-4">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700">Grafik Bulanan</h3>
        </div>
        <canvas id="chartKeuangan" height="120"></canvas>
    </div>
</div>

<!-- Chart.js Script -->
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
                backgroundColor: 'rgba(34,197,94,0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 3,
                pointRadius: 5,
                pointBackgroundColor: 'rgba(34,197,94,1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 7
            },
            {
                label: 'Pengeluaran',
                data: {!! $pengeluaran !!},
                borderColor: 'rgba(239,68,68,1)',
                backgroundColor: 'rgba(239,68,68,0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 3,
                pointRadius: 5,
                pointBackgroundColor: 'rgba(239,68,68,1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointHoverRadius: 7
            }
        ]
    };

    new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#64748b',
                        font: { size: 12, weight: '500' },
                        callback: value => 'Rp ' + value.toLocaleString('id-ID')
                    },
                    grid: { 
                        color: 'rgba(203,213,225,0.3)',
                        drawBorder: false
                    },
                    border: { display: false }
                },
                x: {
                    ticks: { 
                        color: '#64748b',
                        font: { size: 12, weight: '500' }
                    },
                    grid: { 
                        color: 'rgba(203,213,225,0.3)',
                        drawBorder: false
                    },
                    border: { display: false }
                }
            },
            plugins: {
                legend: {
                    labels: { 
                        color: '#334155',
                        font: { size: 13, weight: 'bold' },
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    },
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: (context) => context.dataset.label + ': Rp ' + context.parsed.y.toLocaleString('id-ID')
                    },
                    backgroundColor: 'rgba(15,23,42,0.95)',
                    titleColor: '#f1f5f9',
                    bodyColor: '#f1f5f9',
                    borderColor: 'rgba(148,163,184,0.3)',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: true,
                    boxPadding: 6,
                    usePointStyle: true
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
});
</script>
