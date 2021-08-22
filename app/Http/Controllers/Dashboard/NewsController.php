<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index() {
        return view('dashboard.news.index');
    }

    public function create() {
        return view('dashboard.news.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required',
                'featured_image' => 'required',
            ], [
                'title.required' => 'Judul berita harus diisi!',
                'content.required' => 'Konten berita harus diisi!',
                'featured_image.required' => 'Thumbnail berita harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "author_id" => Auth::user()->id,
                "title" => $request->title,
                "slug" => convertToSlug($request->title),
                "content" => $request->content,
                "is_published" => $request->is_published
            ];

            if($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $path = Storage::disk('public')->put('posts/thumbnail', $file);
                $data['featured_image'] = url('/') . '/storage/' . $path;;
            }

            return redirect()->route('dashboard.news.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }
}
