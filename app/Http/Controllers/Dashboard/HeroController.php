<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\HeroImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                "is_active" => $request->is_active
            ];

            if($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $path = Storage::disk('public')->put('heroes/thumbnail', $file);
                $data['url_hero'] = url('/') . '/storage/' . $path;;
            }

            HeroImage::create($data);

            return redirect()->route('dashboard.hero.images.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function destroy($id) {
        $post = HeroImage::find($id);
        $post->delete();

        return redirect()->back();
    }
}
