<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function index() {
        $data['photos'] = Media::where('type', 'photo')->orderBy('id', 'desc')->get();
        return view('dashboard.media.photo.index', $data);
    }

    public function create() {
        return view('dashboard.media.photo.create');
    }

    public function store(Request $request) {
        $images = [];
        try {
            $validator = Validator::make($request->all(), [
                'images' => 'required',
                'caption' => 'required'
            ], [
                'images.required' => 'Upload foto atau link video tidak boleh kosong!',
                'caption.required' => 'Caption foto atau video tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'caption' => $request->caption,
                'type' => 'photo'
            ];

            if($request->hasFile('images')) {
                for($i = 0; $i < count($request->images); $i++) {
                    $file = $request->file('images')[$i];
                    $path = Storage::disk('public')->put('media', $file);
                    $image = url('/') . '/storage/' . $path;
                    array_push($images, $image);
                }
            }
            $data['link_media'] = json_encode($images);

            Media::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.photos.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    public function edit($id) {
        $data['photo'] = Media::where([
            ['type', 'photo'],
            ['id', $id],
        ])->first();
        return view('dashboard.media.photo.edit', $data);
    }

    public function update(Request $request, $id) {
        $images = [];
        $photo = Media::find($id);

        $updateData = [
            'caption' => $request->caption
        ];

        if($request->hasFile('images')) {
            for($i = 0; $i < count($request->images); $i++) {
                $file = $request->file('images')[$i];
                $path = Storage::disk('public')->put('media', $file);
                $image = url('/') . '/storage/' . $path;
                array_push($images, $image);
            }
        }
        $updateData['link_media'] = json_encode($images);

        $photo->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.photos.index');
    }

    public function destroy($id) {
        $photo = Media::find($id);
        $photo->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
