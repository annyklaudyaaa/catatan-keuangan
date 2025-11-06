<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AuthLogin extends Component
{
    public $email, $password, $remember = false;

    public function login()
    {
        // ✅ 1. Validasi input
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        // ✅ 2. Cek login
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials, $this->remember)) {

            // regenerate session
            session()->regenerate();

            // ✅ LANGSUNG MASUK DASHBOARD TANPA POPUP
            return redirect()->intended('/dashboard');
        }

        // ✅ 3. Jika gagal baru muncul notif error
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
