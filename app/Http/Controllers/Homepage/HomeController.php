<?php

namespace App\Http\Controllers\Homepage;

use App\Models\Post;
use App\Models\Seed;
use App\Models\Media;
use App\Models\HeroImage;
use App\Http\Controllers\Controller;
use App\Models\CommentsProduct;
use App\Models\Contact;
use App\Models\Document;
use App\Models\DocumentCategory;
use App\Models\Pages;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $data['news'] = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $data['videos'] = Media::where('type', 'video')->latest()->limit(3)->get();
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

    public function rph($slug)
    {
        $data['title'] = SubMenu::where('slug', $slug)->first();
        $data['data'] = Pages::join('sub_menus', 'pages.sub_menus_id', '=', 'sub_menus.id')
            ->where('sub_menus.slug', $slug)
            ->latest()
            ->paginate(8,['pages.*','sub_menus.parent_menu']);
        return view('homepage.pages.page', $data);
    }

    public function event($slug)
    {
        $data['title'] = SubMenu::where('slug', $slug)->first();
        $data['data'] = Pages::join('sub_menus', 'pages.sub_menus_id', '=', 'sub_menus.id')
            ->where('sub_menus.slug', $slug)
            ->latest()
            ->paginate(8,['pages.*','sub_menus.parent_menu']);
        return view('homepage.pages.page', $data);
    }

    public function mediaPhoto()
    {
        $data['photos'] = Media::where('type', 'photo')->orderBy('id', 'desc')->paginate(8);
        return view('homepage.media.photo', $data);
    }

    public function mediaVideo()
    {
        $data['videos'] = Media::where('type', 'video')->orderBy('id', 'desc')->paginate(8);
        return view('homepage.media.video', $data);
    }

    public function forestryData()
    {
        $data['documents'] = Document::where('is_published', '1')->orderBy('name', 'desc')->get();
        $data['categories'] = DocumentCategory::orderBy('name', 'desc')->get();
        return view('homepage.forestry-data', $data);
    }

    public function searchByCategory(Request $request)
    {
        $category_id = $request->category_id;
        $data['result'] = Document::where('category_id', 'like', '%' . $category_id . '%')
            ->where('is_published', '1')->get();
        return json_encode($data);
    }

    public function seedSearch(Request $request)
    {
        $data['seeds'] = [];
        if (!empty($request->keyword)) {
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

    public function productDetail($id)
    {
        $data['product'] = Seed::find($id);
        $data['comments'] = CommentsProduct::where('product_id', $id)->where('is_published', 1)->get();
        return view('homepage.products.show', $data);
    }

    public function contact()
    {
        return view('homepage.contact');
    }

    public function contactStore(Request $request)
    {
        try {
            $data = [
                "name"      => $request->name,
                "email"     => $request->email,
                "subject"   => $request->subject,
                "no_handphone" => $request->no_handphone,
                "message"   => $request->message
            ];

            Contact::create($data);

            return redirect()->route('homepage.contact')->with('success', 'Pengaduan telah dikirim');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function commentStore(Request $request)
    {
        $is_published = 0;
        if (Auth::check()) {
            $is_published = 1;
        } else {
            $is_published = 0;
        }

        $data = [
            "name"      => $request->name,
            "comment"     => $request->comment,
            "product_id"   => $request->product_id,
            "is_published" => $is_published
        ];

        CommentsProduct::create($data);

        return redirect()->back()->with('success', 'Komentar telah dikirim');
    }

    public function detailPage($slug)
    {
        $data['data'] = Pages::join('sub_menus', 'pages.sub_menus_id', '=', 'sub_menus.id')->first(['pages.*','sub_menus.parent_menu']);
        return view('homepage.pages.detail_page', $data);
    }
}
