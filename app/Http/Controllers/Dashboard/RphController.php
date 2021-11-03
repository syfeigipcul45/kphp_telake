<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RphController extends Controller
{
    public function index()
    {
        $data['rph'] = Pages::join('sub_menus', 'pages.sub_menus_id', '=', 'sub_menus.id')
            ->where('sub_menus.parent_menu', 'rph')
            ->latest()
            ->get(['pages.*', 'sub_menus.parent_menu']);
        return view('dashboard.rph.index', $data);
    }

    public function create()
    {
        $data['submenu'] = SubMenu::where('parent_menu', 'rph')->orderBy('order', 'asc')->get();
        return view('dashboard.rph.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required',
                'sub_menus_id' => 'required',
                'featured_image' => 'required'
            ], [
                'title.required' => 'Judul berita harus diisi!',
                'content.required' => 'Konten berita harus diisi!',
                'sub_menus_id.required' => 'Submenu harus diisi!',
                'featured_image.required' => 'Thumbnail berita harus diisi!'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $data = [
                "author_id" => Auth::user()->id,
                "title" => $request->title,
                "slug" => convertToSlug($request->title),
                "sub_menus_id" => $request->sub_menus_id,
                "content" => $request->content,
            ];

            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $path = Storage::disk('public')->put('pages/thumbnail', $file);
                $data['featured_image'] = url('/') . '/storage/' . $path;;
            }

            Pages::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.rph.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id)
    {
        $data['submenu'] = SubMenu::where('parent_menu', 'rph')->orderBy('order', 'asc')->get();
        $data['rph'] = Pages::find($id);
        return view('dashboard.rph.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $rph = Pages::find($id);

        $updateData = [
            'title' => $request->title,
            'content' => $request->content,
            'sub_menus_id' => $request->sub_menus_id
        ];

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $path = Storage::disk('public')->put('pages/thumbnail', $file);
            $updateData['featured_image'] = url('/') . '/storage/' . $path;;
        } else {
            $updateData['featured_image'] = $request->featured_image;
        }

        $rph->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.rph.index');
    }

    public function destroy($id)
    {
        $rph = Pages::find($id);
        $rph->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
