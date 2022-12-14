<?php

namespace App\Http\Controllers\Dashboard;

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
                'thumbnail' => 'required|max:5000',
                'title' => 'required',
                'description' => 'required'
            ], [
                'thumbnail.required' => 'Gambar harus diisi!',
                'thumbnail.max' => 'Ukuran gambar maskimal 5MB',
                'title.required' => 'Judul harus diisi!',
                'description.required' => 'Deskripsi harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "url_hero" => "-",
                "title" => $request->title,
                "description" => $request->description,
                "is_active" => 1
            ];

            // if($request->hasFile('thumbnail')) {
            //     $file = $request->file('thumbnail');
            //     $path = Storage::disk('public')->put('heroes/thumbnail', $file);
            //     $data['url_hero'] = url('/') . '/storage/' . $path;;
            // }

            $hero_image = HeroImage::create($data);
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $hero_image->addMediaFromRequest('thumbnail')->toMediaCollection('hero-image');
            }
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

        try {
            $validator = Validator::make($request->all(), [
                'url_hero' => 'required|max:5000',
                'title' => 'required',
                'description' => 'required'
            ], [
                'url_hero.required' => 'Gambar harus diisi!',
                'url_hero.max' => 'Ukuran gambar maskimal 5MB',
                'title.required' => 'Judul harus diisi!',
                'description.required' => 'Deskripsi harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $updateData = [
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => 1
            ];

            // if($request->hasFile('url_hero')) {
            //     $file = $request->file('url_hero');
            //     $path = Storage::disk('public')->put('posts/thumbnail', $file);
            //     $updateData['url_hero'] = url('/') . '/storage/' . $path;;
            // } else {
            //     $updateData['url_hero'] = $request->url_hero;
            // }

            if ($request->hasFile('url_hero') && $request->file('url_hero')->isValid()) {
                $hero_image->clearMediaCollection('hero-image');
                $hero_image->addMedia($request->url_hero)->toMediaCollection('hero-image');
            }

            $hero_image->update($updateData);
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.hero.images.index');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!'.$exception->getMessage());
        }
    }

    public function destroy($id) {
        $hero_image = HeroImage::find($id);
        $hero_image->delete();
        $hero_image->clearMediaCollection('hero-image');
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
