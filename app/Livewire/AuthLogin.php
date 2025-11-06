<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AuthLogin extends Component
{
    public $email, $password, $remember = false;

    public function login()
    {
        // 1️⃣ Validasi input dulu
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        // 2️⃣ Coba login
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();

            // 3️⃣ Livewire 3: pakai dispatch()
            $this->dispatch('swal', [
                'icon' => 'success',
                'title' => 'Berhasil Login!',
                'text' => 'Selamat datang kembali 👋',
            ]);

            return redirect()->intended('/dashboard');
        }

        // 4️⃣ Jika gagal
        $this->dispatch('swal', [
            'icon' => 'error',
            'title' => 'Login Gagal',
            'text' => 'Email atau password salah!',
        ]);
    }

    public function render()
    {
        return view('livewire.auth-login');
    }
}
