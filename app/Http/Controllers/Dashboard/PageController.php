<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\SubMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function profileIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'profile')->get();
        return view('dashboard.pages.profile.index', $data);
    }

    public function profileCreate() {
        return view('dashboard.pages.profile.create');
    }

    public function profileStore(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Nama submenu harus diisi!',
                'content.required' => 'Konten submenu harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "name" => $request->name,
                "content" => $request->content,
                "parent_menu" => 'profile'
            ];

            SubMenu::create($data);

            return redirect()->route('dashboard.page.profiles.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function deptIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'dept')->get();
        return view('dashboard.pages.dept.index', $data);
    }

    public function deptCreate() {
        return view('dashboard.pages.dept.create');
    }

    public function deptStore(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Nama submenu harus diisi!',
                'content.required' => 'Konten submenu harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "name" => $request->name,
                "content" => $request->content,
                "parent_menu" => 'dept'
            ];

            SubMenu::create($data);

            return redirect()->route('dashboard.page.depts.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function areaIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'area')->get();
        return view('dashboard.pages.area.index', $data);
    }

    public function areaCreate() {
        return view('dashboard.pages.area.create');
    }

    public function areaStore(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Nama submenu harus diisi!',
                'content.required' => 'Konten submenu harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "name" => $request->name,
                "content" => $request->content,
                "parent_menu" => 'area'
            ];

            SubMenu::create($data);

            return redirect()->route('dashboard.page.areas.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function eventIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'event')->get();
        return view('dashboard.pages.event.index', $data);
    }

    public function eventCreate() {
        return view('dashboard.pages.event.create');
    }

    public function eventStore(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Nama submenu harus diisi!',
                'content.required' => 'Konten submenu harus diisi!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                "name" => $request->name,
                "content" => $request->content,
                "parent_menu" => 'event'
            ];

            SubMenu::create($data);

            return redirect()->route('dashboard.page.events.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }
}
