<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }
    // public function showChangePassword()
    // {
    //     return view('auth.changePassword');
    // }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'username' => 'required|string|max:100|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $temp = [
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ];

            $url = URL::temporarySignedRoute(
                'register.verify',
                now()->addMinutes(30),
                $temp
            );

            Mail::raw("Klik link ini untuk verifikasi dan menyelesaikan pendaftaran:\n\n$url", function ($msg) use ($validated) {
                $msg->to($validated['email'])->subject('Verifikasi Pendaftaran');
            });

            return back()->with('success', 'Link verifikasi telah dikirim ke email Anda.');
        } catch (ValidationException $e) {
            dd($e->errors());
        }
    }

    public function verifyLink(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Link verifikasi tidak valid atau sudah kedaluwarsa.');
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('register.form')->withErrors('Email sudah terdaftar.');
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect('/home')->with('success', 'Akun berhasil dibuat. Selamat datang!');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
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
                'username' => $googleUser->getName(),
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
