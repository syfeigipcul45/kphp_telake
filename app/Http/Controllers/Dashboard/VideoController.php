<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() {
        return view('dashboard.videos.index');
    }

    public function store(Request $request) {
        try {
            foreach($request->video as $key => $item) {
                $currentVideo = Video::find(++$key);
                $currentVideo->update([
                    'youtube_link' => $item
                ]);
            }

            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }
}
