<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showForgotPassword()
    {
        return view('auth.forgot.password');
    }
    public function showChangePassword()
    {
        return view('auth.changePassword');
    }
    public function showRegister()
    {
        return view('auth.register');
    }

   

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Gagal login dengan Google.');
        }
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            Auth::login($user);

            return redirect('/home');
        } else {

            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'pfp_path' => $googleUser->getAvatar(),

            ]);

            Auth::login($user);

            return redirect()->intended('/home')->with('success', 'Pendaftaran berhasil. Selamat datang!');
        }
    }

    public function forgotPassword(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $req->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Pengguna dengan email tersebut tidak ditemukan.',
            ], 404);
        }
        $newPassword = Str::random(8);
        $user->password = Hash::make($newPassword);
        $user->save();
        $data = [
            'subject' => 'Password Baru Anda',
            'title' => 'Password Baru Untuk Akun Anda',
            'body' => 'Hai, Anda baru saja mengklik "Lupa Kata Sandi". Berikut adalah password baru Anda: ' . $newPassword . "\n\n" .
                'Harap segera login dan ubah password Anda di bagian profil agar lebih aman.' . "\n\n" .
                'Jika Anda membutuhkan bantuan lebih lanjut, Anda dapat menghubungi kami di: purnamanugraha492@gmail.com' . "\n\n" .
                'Terima kasih, ' . "\n" .
                'Cepuin'
        ];

        $userEmail = $user->email;
        Mail::raw($data['body'], function ($message) use ($userEmail, $data) {
            $message->to($userEmail)
                ->subject($data['subject']);
        });


        return redirect()->route('login')->with('success', 'Password baru berhasil dikirim!');
    }
}
