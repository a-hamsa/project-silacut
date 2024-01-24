<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::user()){
            // if($user->Id_Role == '1'){
            //     return redirect()->intended('bkd');
            // }elseif($user->Id_Role == '2'){
            //     return redirect()->intended('opd');
            // }
            return redirect()->intended('home');
        }

        return view('login.login');
    }
    public function proses (Request $request){
        $request->validate([
            //dari isi tabel tb_user
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $kredensial = $request->only('username','password');
        if ($request->filled('username') && $request->filled('password')) {
            // Memeriksa apakah kombinasi username dan password benar
            $credentials = $request->only('username', 'password');
            if (!Auth::attempt($credentials)) {
                $userByUsername = Auth::getProvider()->retrieveByCredentials(['username' => $request->username]);
                $userByPassword = Auth::getProvider()->retrieveByCredentials(['password' => $request->password]);
    
                // Memeriksa apakah username benar dan password salah
                if ($userByUsername && !$userByPassword) {
                    $errors['password'] = 'Password salah';
                }
    
                // Memeriksa apakah password benar dan username salah
                if ($userByPassword && !$userByUsername) {
                    $errors['username'] = 'Username salah';
                }
    
                // Jika kombinasi lainnya
                if (!isset($errors['username']) && !isset($errors['password'])) {
                    $errors['username'] = 'Username atau password salah';
                }
            }
        }

        return back()->withErrors([
            'username' => 'Maaf username anda salah',
            'password' => 'Maaf password anda salah',
        ])->onlyInput('username','password');
    }

    public function logout(Request $request): RedirectResponse
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
}
}
