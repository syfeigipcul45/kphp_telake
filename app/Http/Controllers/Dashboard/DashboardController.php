<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Post;
use App\Models\Seed;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data['news_total'] = Post::count();
        $data['product_total'] = Seed::count();
        $data['doc_total'] = Document::count();
        return view('dashboard.dashboard.index', $data);
    }
}
