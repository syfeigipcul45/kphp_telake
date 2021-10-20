<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $data['users'] = User::where('id', '!=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.users.index', $data);
    }

    public function create() {
        return view('dashboard.users.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'display_name' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed',
                'email' => 'required|email',
                'phone' => 'required'
            ], [
                'display_name.required' => 'Nama lengkap harus diisi!',
                'username.required' => 'Username harus diisi!',
                'password.required' => 'Password harus diisi!',
                // 'password.confirmed' => 'Konfirmasi password tidak cocok!',
                'email.required' => 'Email harus diisi!',
                'email.email' => 'Format penulisan harus berupa email!',
                'phone.required' => 'Nomor telepon harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "display_name" => $request->display_name,
                "username" => $request->username,
                "password" => $request->password,
                "email" => $request->email,
                "phone" => $request->phone
            ];

            User::create($data);

            return redirect()->route('dashboard.users.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id) {
        $data['user'] = User::find($id);
        return view('dashboard.users.edit', $data);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $updateData = [
            'display_name' => $request->display_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        if(!empty($request->password)) {
            $updateData['password'] = $request->password;
        }

        $user->update($updateData);

        return redirect()->route('dashboard.users.index');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}
