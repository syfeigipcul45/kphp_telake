<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function index() {
        $data['photos'] = Media::where('type', 'photo')->get();
        return view('dashboard.media.photo.index', $data);
    }

    public function create() {
        return view('dashboard.media.photo.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'link_media' => 'required',
                'caption' => 'required'
            ], [
                'link_media.required' => 'Upload foto atau link video tidak boleh kosong!',
                'caption.required' => 'Caption foto atau video tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'link_media' => $request->link_media,
                'caption' => $request->caption,
                'type' => 'photo'
            ];

            if($request->hasFile('link_media')) {
                $file = $request->file('link_media');
                $path = Storage::disk('public')->put('media', $file);
                $data['link_media'] = url('/') . '/storage/' . $path;;
            }

            Media::create($data);

            return redirect()->route('dashboard.photos.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }
}
