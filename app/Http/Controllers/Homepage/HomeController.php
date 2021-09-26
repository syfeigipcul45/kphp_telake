<?php

namespace App\Http\Controllers\Homepage;

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

    public function forestryData()
    {
        return view('homepage.forestry-data');
    }

    public function seedSearch()
    {
        return view('homepage.seed-search');
    }
    
    public function contact()
    {
        return view('homepage.contact');
    }
}
