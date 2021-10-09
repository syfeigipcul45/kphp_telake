<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Video;
use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index() {
        $data['videos'] = Media::where('type', 'video')->orderBy('id', 'desc')->get();
        return view('dashboard.media.video.index', $data);
    }

    public function create() {
        return view('dashboard.media.video.create');
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
                'type' => 'video'
            ];

            if($request->hasFile('link_media')) {
                $file = $request->file('link_media');
                $path = Storage::disk('public')->put('media', $file);
                $data['link_media'] = url('/') . '/storage/' . $path;;
            }

            Media::create($data);

            return redirect()->route('dashboard.videos.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    public function edit($id) {
        $data['video'] = Media::where([
            ['type', 'video'],
            ['id', $id],
        ])->first();
        return view('dashboard.media.video.edit', $data);
    }

    public function update(Request $request, $id) {
        $video = Media::find($id);

        $updateData = [
            'link_media' => $request->link_media,
            'caption' => $request->caption
        ];

        $video->update($updateData);

        return redirect()->route('dashboard.videos.index');
    }

    public function destroy($id) {
        $video = Media::find($id);
        $video->delete();

        return redirect()->back();
    }
}
