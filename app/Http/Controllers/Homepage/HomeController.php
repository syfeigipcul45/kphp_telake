<?php

namespace App\Http\Controllers\Homepage;

use App\Models\Post;
use App\Models\Seed;
use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['news'] = Post::all();
        return view('homepage.index', $data);
    }

    public function news()
    {
        return view('homepage.news');
    }
    
    public function kaltim()
    {
        return view('homepage.profile.kaltim-forest');
    }

    public function vision()
    {
        return view('homepage.profile.vision-mission');
    }

    public function structure()
    {
        return view('homepage.profile.organization-structure');
    }

    public function mediaPhoto()
    {
        $data['photos'] = Media::where('type', 'photo')->get();
        return view('homepage.media.photo', $data);
    }

    public function mediaVideo()
    {
        $data['videos'] = Media::where('type', 'video')->get();
        return view('homepage.media.video', $data);
    }

    public function forestryData()
    {
        return view('homepage.forestry-data');
    }

    public function seedSearch(Request $request)
    {
        $data['seeds'] = [];
        if(!empty($request->keyword)) {
            $data['seeds'] = Seed::where(function ($query) use ($request) {
                $query->where('seed_name', "LIKE", "%" . $request->keyword . "%");
                $query->orWhere('seed_price', "LIKE", "%" . $request->keyword . "%");
                $query->orWhere('seed_stock', "LIKE", "%" . $request->keyword . "%");
            })->get();
        } else {
            $data['seeds'] = Seed::all();
        }
        return view('homepage.seed-search', $data);
    }
    
    public function contact()
    {
        return view('homepage.contact');
    }
}
