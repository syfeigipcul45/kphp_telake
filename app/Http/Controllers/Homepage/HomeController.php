<?php

namespace App\Http\Controllers\Homepage;

use App\Models\Seed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage.index');
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
        return view('homepage.media.photo');
    }

    public function mediaVideo()
    {
        return view('homepage.media.video');
    }

    public function forestryData()
    {
        return view('homepage.forestry-data');
    }

    public function seedSearch()
    {
        $data['seeds'] = Seed::all();
        return view('homepage.seed-search', $data);
    }
    
    public function contact()
    {
        return view('homepage.contact');
    }
}
