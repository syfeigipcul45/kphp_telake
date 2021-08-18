<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Option;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $data['option'] = Option::first();
        return view('dashboard.settings.index', $data);
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'logo' => 'required|max:2048',
                'favicon' => 'required|max:1024',
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
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ];
                $saveData = Option::create($data);
                return redirect()->route('dashboard.settings.index');
            } else {
                $data = [
                    'author_id' => Auth::user()->id,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'twitter' => $request->twitter,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ];
                $updateData = Option::where('id', $option->first()->id)->first();
                $updateData->update($data);
                return redirect()->route('dashboard.settings.index');
            }
           
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }
}
