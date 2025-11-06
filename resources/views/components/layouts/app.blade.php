<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Catatan Keuangan' }}</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <nav class="bg-indigo-600 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">

        <!-- Judul -->
        <h1 class="text-lg font-semibold flex items-center gap-2">
            📒 Catatan Keuangan
        </h1>

        <!-- Right section -->
        <div class="flex items-center gap-4">

            <!-- Nama -->
            <span class="font-semibold">
                {{ Auth::user()->name }}
            </span>

            <!-- Avatar -->
            <img 
                src="https://api.dicebear.com/8.x/bottts/svg?seed={{ Auth::user()->name }}"
                class="w-9 h-9 rounded-full border bg-white"
                alt="avatar"
            >

            <!-- Logout button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="px-3 py-1 bg-red-500 hover:bg-red-600 rounded text-sm font-semibold transition"
                >
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

    <!-- MAIN CONTENT -->
    <main class="grow container mx-auto p-6">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-200 text-center py-3 text-sm text-gray-600">
        &copy; {{ date('Y') }} Catatan Keuangan by AnnyKlaudya
    </footer>

    @livewireScripts

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script>
        // Listener global dari Livewire untuk alert
        window.addEventListener('showAlert', event => {
            Swal.fire({
                icon: event.detail[1] || 'success',
                title: 'Berhasil!',
                text: event.detail[0],
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>

</body>
</html>
