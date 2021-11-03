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

class EventController extends Controller
{
    public function index()
    {
        $data['events'] = Pages::join('sub_menus', 'pages.sub_menus_id', '=', 'sub_menus.id')
        ->where('sub_menus.parent_menu', 'event')
        ->latest()
        ->get(['pages.*', 'sub_menus.parent_menu']);
        return view('dashboard.event.index', $data);
    }

    public function create()
    {
        $data['submenu'] = SubMenu::where('parent_menu', 'event')->orderBy('order', 'asc')->get();
        return view('dashboard.event.create', $data);
    }

    public function store(Request $request)
    {
        $images = [];
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'content' => 'required',
                'sub_menus_id' => 'required',
            ], [
                'title.required' => 'Judul berita harus diisi!',
                'content.required' => 'Konten berita harus diisi!',
                'sub_menus_id.required' => 'Submenu harus diisi!',
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

            if($request->hasFile('images')) {
                for($i = 0; $i < count($request->images); $i++) {
                    $file = $request->file('images')[$i];
                    $path = Storage::disk('public')->put('pages/images', $file);
                    $image = url('/') . '/storage/' . $path;
                    array_push($images, $image);
                }
            }
            $data['featured_image'] = json_encode($images);

            Pages::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.event.index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function edit($id)
    {
        $data['submenu'] = SubMenu::where('parent_menu', 'event')->orderBy('order', 'asc')->get();
        $data['event'] = Pages::find($id);
        return view('dashboard.event.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $event = Pages::find($id);
        $images = [];

        $updateData = [
            'title' => $request->title,
            'content' => $request->content,
            'sub_menus_id' =>$request->sub_menus_id
        ];

        if($request->hasFile('images')) {
            for($i = 0; $i < count($request->images); $i++) {
                $file = $request->file('images')[$i];
                $path = Storage::disk('public')->put('pages/images', $file);
                $image = url('/') . '/storage/' . $path;
                array_push($images, $image);
            }
        }
        $updateData['featured_image'] = json_encode($images);

        $event->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.event.index');
    }

    public function destroy($id)
    {
        $event = Pages::find($id);
        $event->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
