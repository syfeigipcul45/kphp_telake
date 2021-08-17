<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                $currentUser = Auth::user();
                if (!$currentUser->hasVerifiedEmail()) {
                    return sendApiResponse(false, 'Anda harus memverifikasi email lebih dahulu.');
                }
                if($currentUser->hasRole(['customer', 'partner'])) {
                    $token = $currentUser->createToken('customer')->accessToken;
                    $currentUser->update(['token' => $token]);
                    $profile = $currentUser->profile();
                    return sendApiResponse(true, 'Proses login berhasil', $profile);
                } else {
                    return sendApiResponse(false, 'Maaf, anda tidak memiliki akses!');
                }
            } else {
                return sendApiResponse(false, 'email atau password salah!');
            }
        } catch (\Exception $exception) {
            return sendApiResponse(false, $exception->getMessage(), null, 400);
        }
    }

    public function forgotPassword() {
        return view('auth.forgot');
    }
}
