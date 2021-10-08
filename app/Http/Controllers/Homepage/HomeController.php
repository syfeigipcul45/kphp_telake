<?php

namespace App\Http\Controllers\Homepage;

use App\Models\Post;
use App\Models\Seed;
use App\Models\Media;
use App\Models\HeroImage;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['news'] = Post::limit(4)->get();
        $data['videos'] = Media::limit(3)->get();
        $data['heroes'] = HeroImage::all();
        return view('homepage.index', $data);
    }

    public function news()
    {
        $data['news'] = Post::orderBy('created_at', 'desc')->paginate(8);
        return view('homepage.news', $data);
    }

    public function newsDetail($slug)
    {
        $data['news'] = Post::where('slug', $slug)->first();
        $data['other_news'] = Post::where('slug', '!=', $slug)->limit(5)->get();
        return view('homepage.news.detail', $data);
    }

    public function profile($slug)
    {
        $data['data'] = SubMenu::where('slug', $slug)->first();
        return view('homepage.submenu', $data);
    }

    public function dept($slug)
    {
        $data['data'] = SubMenu::where('slug', $slug)->first();
        return view('homepage.submenu', $data);
    }

    public function area($slug)
    {
        $data['data'] = SubMenu::where('slug', $slug)->first();
        return view('homepage.submenu', $data);
    }

    public function event($slug)
    {
        $data['data'] = SubMenu::where('slug', $slug)->first();
        return view('homepage.submenu', $data);
    }

    public function mediaPhoto()
    {
        $data['photos'] = Media::where('type', 'photo')->orderBy('id', 'desc')->get();
        return view('homepage.media.photo', $data);
    }

    public function mediaVideo()
    {
        $data['videos'] = Media::where('type', 'video')->orderBy('id', 'desc')->get();
        return view('homepage.media.video', $data);
    }

    public function forestryData()
    {
        $data['documents'] = Document::orderBy('name', 'desc')->get();
        $data['categories'] = DocumentCategory::orderBy('name', 'desc')->get();
        return view('homepage.forestry-data', $data);
    }

    public function searchByCategory(Request $request)
    {
        $category_id = $request->category_id;
        $data['result'] = Document::where('category_id','like', '%'.$category_id.'%')->get();
        return json_encode($data);
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
