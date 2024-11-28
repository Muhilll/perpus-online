<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function proses_login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if($user->role == 'admin'){
            if ($user->password == $request->password) {
                $request->session()->regenerate();
                $request->session()->put('id_user', $user->id_user);
                return redirect()->intended('/dashboard');
            }
        } else{
            if (!$user || $user->is_active !== 1) {
                return back()->withErrors([
                    'username' => 'Akun Anda belum aktif. Silakan aktivasi terlebih dahulu.',
                ])->onlyInput('username');
            }
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $request->session()->put('id_user', $user->id_user);
                return redirect()->intended('/home');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function register()
    {

        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $activation_token = bin2hex(random_bytes(16));

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->activation_token = $activation_token;
        $user->save();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '222151.perpus@gmail.com';
            $mail->Password = 'mmcp ittp ktmd ctfq';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('222151.perpus@gmail.com', 'Peminjaman Buku Digital');
            $mail->addAddress($request->email, $request->username);

            $activation_link = url('/activation?token=' . $activation_token);

            $mail->isHTML(true);
            $mail->Subject = 'Aktivasi Akun Anda';
            $mail->Body = "
                <h1>Halo, {$request->username}!</h1>
                <p>Terima kasih telah mendaftar di layanan kami.</p>
                <p>Klik link berikut untuk mengaktifkan akun Anda:</p>
                <p><a href='$activation_link'>Aktifkan Akun Anda</a></p>
            ";

            $mail->send();
        } catch (Exception $e) {
            return response()->json(['error' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }

        return redirect()->intended('/login')->with('success', 'Registrasi berhasil. Silakan cek email untuk mengaktifkan akun Anda.');
    }

    public function activation(Request $request)
    {
        $user = User::where('activation_token', $request->token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Token aktivasi tidak valid!');
        }

        $user->is_active = 1;
        $user->save();

        return view('layout.active')->with('message', 'Akun Anda berhasil diaktifkan.');
    }
}
