<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index() {
        $data['news'] = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard.news.index', $data);
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
                "is_published" => 1,
                "featured_image" => '-'
            ];

            // if($request->hasFile('featured_image')) {
            //     $file = $request->file('featured_image');
            //     $path = Storage::disk('public')->put('posts/thumbnail', $file);
            //     $data['featured_image'] = url('/') . '/storage/' . $path;;
            // }

            $news = Post::create($data);
            if ($request->hasFile('featured_image') && $request->file('featured_image')->isValid()) {
                $news->addMediaFromRequest('featured_image')->toMediaCollection('news');
            }
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.news.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!'.$exception->getMessage());
        }
    }

    public function edit($id) {
        $data['news'] = Post::find($id);
        return view('dashboard.news.edit', $data);
    }

    public function update(Request $request, $id) {
        $news = Post::find($id);

        $updateData = [
            'title' => $request->title,
            'content' => $request->content,
            'is_published' => 1
        ];

        // if($request->hasFile('featured_image')) {
        //     $file = $request->file('featured_image');
        //     $path = Storage::disk('public')->put('posts/thumbnail', $file);
        //     $updateData['featured_image'] = url('/') . '/storage/' . $path;;
        // } else {
        //     $updateData['featured_image'] = $request->featured_image;
        // }

        if ($request->hasFile('featured_image') && $request->file('featured_image')->isValid()) {
            $news->clearMediaCollection('news');
            $news->addMedia($request->featured_image)->toMediaCollection('news');
        }

        $news->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.news.index');
    }

    public function destroy($id) {
        $news = Post::find($id);
        $news->delete();
        $news->clearMediaCollection('news');
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
