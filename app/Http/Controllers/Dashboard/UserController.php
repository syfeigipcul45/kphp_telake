<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index() {
        $data['users'] = User::where('id', '!=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.users.index', $data);
    }

    public function create() {
        $data['roles'] = Role::orderBy('id', 'asc')->get();
        return view('dashboard.users.create', $data);
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'display_name' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required|same:password',
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users'
            ], [
                'display_name.required' => 'Nama lengkap harus diisi!',
                'username.required' => 'Username harus diisi!',
                'username.unique' => 'Username sudah terdaftar',
                'password.required' => 'Password harus diisi!',
                'password.confirmed' => 'Konfirmasi password tidak cocok!',
                'password_confirmation.required' => 'Konfirmasi password harus diisi!',
                'password_confirmation.same' => 'Konfirmasi password tidak sama',
                'email.required' => 'Email harus diisi!',
                'email.unique' => 'Email sudah terdaftar',
                'email.email' => 'Format penulisan harus berupa email!',
                'phone.required' => 'Nomor telepon harus diisi!',
                'phone.unique' => 'No. Handphone sudah terdaftar',
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "display_name" => $request->display_name,
                "username" => $request->username,
                "password" => bcrypt($request->password),
                "email" => $request->email,
                "phone" => $request->phone
            ];

            $saveData = User::create($data);
            $saveData->syncRoles($request->role_id);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.users.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id) {
        $data['user'] = User::find($id);
        $data['roles'] = Role::orderBy('id', 'asc')->get();
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
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);
        $user->syncRoles($request->role_id);
        Session::flash('success', 'Data Berhasil Diubah');
        return redirect()->route('dashboard.users.index');
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
