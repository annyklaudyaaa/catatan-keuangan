<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthRegister extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        // 1️⃣ Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.same' => 'Konfirmasi password tidak sama.',
        ]);

        // 2️⃣ Simpan user baru
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // 3️⃣ Reset form input
        $this->reset(['name', 'email', 'password', 'password_confirmation']);

        // 4️⃣ Kirim event ke browser (SweetAlert)
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Registrasi Berhasil!',
            'text' => 'Akun kamu sudah dibuat. Silakan login 👌',
        ]);

        // 5️⃣ Redirect ke halaman login
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth-register');
    }
}
