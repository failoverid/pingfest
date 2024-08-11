<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSiswa;
use App\Models\UserMahasiswa;
use App\Models\UserUmum;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'userType' => ['required', 'in:siswa,mahasiswa,umum'],
            'phone' => ['required', 'string', 'max:15'], // Validasi untuk nomor telepon
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'userType' => $request->userType,
            'password' => Hash::make($request->password),
            'registeredSemnas' => false,
            'PaymentSemnas' => null,
            'QRSemnas' => null,
        ]);

        switch ($request->userType) {
            case 'siswa':
                $request->validate([
                    'school_name' => ['required', 'string', 'max:255'],
                    'NISN' => ['required', 'string', 'max:255'],
                    'student_card' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
                ]);

                $student_card = $request->file('student_card')->store('student_cards', 'public');

                UserSiswa::create([
                    'user_id' => $user->id,
                    'school_name' => $request->school_name,
                    'NISN' => $request->NISN,
                    'student_card' => $student_card,
                ]);
                break;

            case 'mahasiswa':
                $request->validate([
                    'university_name' => ['required', 'string', 'max:255'], // Validasi nama universitas
                    'NIM' => ['required', 'string', 'max:255'],
                    'university_card' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
                ]);

                $university_card = $request->file('university_card')->store('university_cards', 'public');

                UserMahasiswa::create([
                    'user_id' => $user->id,
                    'university_name' => $request->university_name, // Menyimpan nama universitas
                    'NIM' => $request->NIM,
                    'university_card' => $university_card,
                ]);
                break;

            case 'umum':
                $request->validate([
                    'NIK' => ['required', 'string', 'max:255'],
                    'identification_card' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
                ]);

                $identification_card = $request->file('identification_card')->store('identification_cards', 'public');

                UserUmum::create([
                    'user_id' => $user->id,
                    'NIK' => $request->NIK,
                    'identification_card' => $identification_card,
                ]);
                break;
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
