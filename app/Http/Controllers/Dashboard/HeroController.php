<?php

namespace App\Http\Controllers\Dashboard;

use Image;
use App\Models\HeroImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeroController extends Controller
{
    public function index() {
        $data['hero_images'] = HeroImage::all();
        return view('dashboard.hero-images.index', $data);
    }

    public function create() {
        return view('dashboard.hero-images.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'thumbnail' => 'required',
                'title' => 'required',
                'description' => 'required'
            ], [
                'thumbnail.required' => 'Gambar harus diisi!',
                'title.required' => 'Judul harus diisi!',
                'description.required' => 'Deskripsi harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "title" => $request->title,
                "description" => $request->description,
                "is_active" => 1
            ];

            if($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $file_name = $file->getClientOriginalName();
    
                // original file
                $img = Image::make($file);
                $img->save(\public_path('storage/heroes/' . $file_name), 100);
                
                // compressed file
                $img = Image::make($file);
                $img->save(\public_path('storage/heroes/' . $file_name), 50);
    
                // store url to database
                $data['url_hero'] = url('/') . '/storage/heroes/' . $file_name;
            }

            HeroImage::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.hero.images.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id) {
        $data['hero_image'] = HeroImage::find($id);
        return view('dashboard.hero-images.edit', $data);
    }

    public function update(Request $request, $id) {
        $hero_image = HeroImage::find($id);

        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => 1
        ];

        if($request->hasFile('url_hero')) {
            $file = $request->file('url_hero');
            $file_name = $file->getClientOriginalName();

            // original file
            $img = Image::make($file);
            $img->save(\public_path('storage/heroes/' . $file_name), 100);
            
            // compressed file
            $img = Image::make($file);
            $img->save(\public_path('storage/heroes/' . $file_name), 50);

            // store url to database
            $updateData['url_hero'] = url('/') . '/storage/heroes/' . $file_name;
        } else {
            $updateData['url_hero'] = $request->url_hero;
        }

        $hero_image->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.hero.images.index');
    }

    public function destroy($id) {
        $post = HeroImage::find($id);
        $post->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
