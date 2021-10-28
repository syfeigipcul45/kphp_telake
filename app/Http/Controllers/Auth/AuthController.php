<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard.main.index');
        }
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
                return redirect()->back()->withInput()->withErrors($validator);
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

    public function sendMail(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email'
            ], [
                'email.required' => 'Email harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
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

    public function doLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
