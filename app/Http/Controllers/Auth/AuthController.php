<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|max:100'
            ], [
                'email.required' => 'Email harus diisi!',
                'password.required' => 'Kata sandi harus diisi!'
            ]);

            if($validator->fails()) {
                return sendApiResponse(false, $validator->errors()->first());
            }

            $email = strtolower($request->email);
            $password = $request->password;

            if (Auth::attempt(['email' => $email,'password' => $password])) {
                return redirect()->route('dashboard.main.index');
            } else {
                return redirect()->back()->withInput()->with('error', 'Email atau password salah!');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function forgotPassword() {
        return view('auth.forgot');
    }

    public function doLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
