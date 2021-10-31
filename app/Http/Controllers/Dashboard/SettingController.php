<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Option;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index() {
        $data['option'] = Option::first();
        return view('dashboard.settings.index', $data);
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                // 'logo' => 'required|max:2048',
                // 'favicon' => 'required|max:1024',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'twitter' => 'required',
                'facebook' => 'required',
                'instagram' => 'required',
                'youtube' => 'required'
            ], [
                'logo.required' => 'Logo harus diisi!',
                'logo.max' => 'Logo harus di bawah atau sama dengan 2MB',
                'favicon.required' => 'Favicon harus diisi!',
                'favicon.max' => 'Favicon harus di bawah atau sama dengan 1MB',
                'phone.required' => 'Nomor telepon harus diisi!',
                'email.required' => 'Email harus diisi!',
                'email.email' => 'Format email salah',
                'address.required' => 'Alamat harus diisi!',
                'twitter.required' => 'Twitter harus diisi!',
                'facebook.required' => 'Facebook harus diisi!',
                'instagram.required' => 'Instagram harus diisi!',
                'youtube.required' => 'Youtube harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $option = Option::all();

            if($option->isEmpty()) {
                $data = [
                    'author_id' => Auth::user()->id,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'whatsapp' => $request->whatsapp,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ];

                if($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $path = Storage::disk('public')->put('logo', $file);
                    $data['logo'] = url('/') . '/storage/' . $path;
                }

                if($request->hasFile('favicon')) {
                    $file = $request->file('favicon');
                    $path = Storage::disk('public')->put('favicon', $file);
                    $data['favicon'] = url('/') . '/storage/' . $path;
                }

                $saveData = Option::create($data);
                return redirect()->route('dashboard.settings.index');
            } else {
                $data = [
                    'author_id' => Auth::user()->id,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'whatsapp' => $request->whatsapp,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ];

                if($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    $path = Storage::disk('public')->put('logo', $file);
                    $data['logo'] = url('/') . '/storage/' . $path;
                }

                if($request->hasFile('favicon')) {
                    $file = $request->file('favicon');
                    $path = Storage::disk('public')->put('favicon', $file);
                    $data['favicon'] = url('/') . '/storage/' . $path;
                }

                $updateData = Option::where('id', $option->first()->id)->first();
                $updateData->update($data);
                Session::flash('success', 'Data Berhasil Dihapus');
                return redirect()->route('dashboard.settings.index');
            }
           
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function profile() {
        $data['option'] = Option::first();
        return view('dashboard.settings.profile', $data);
    }

    public function updateProfile(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'profile_url' => 'required',
                'profile_title' => 'required',
                'profile_description' => 'required'
            ], [
                'profile_url.required' => 'Link url youtube harus diisi!',
                'profile_title.required' => 'Judul harus diisi!',
                'profile_description.required' => 'Deskripisi harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $option = Option::first();

            if(empty($option)) {
                return redirect()->back();
            }

            $dataUpdate = [
                'profile_url' => $request->profile_url,
                'profile_title' => $request->profile_title,
                'profile_description' => $request->profile_description
            ];
            $option->update($dataUpdate);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.settings.profile');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }
}
