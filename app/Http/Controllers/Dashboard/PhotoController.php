<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index() {
        return view('dashboard.media.photo.index');
    }

    public function create() {
        return view('dashboard.media.photo.create');
    }
}
