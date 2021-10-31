<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\SubMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Flash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function profileIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'profile')->orderBy('order', 'asc')->get();
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
                "parent_menu" => 'profile',
                "slug" => convertToSlug($request->name)
            ];

            SubMenu::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.page.profiles.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function profileEdit($id) {
        $data['profile'] = SubMenu::find($id);
        return view('dashboard.pages.profile.edit', $data);
    }

    public function profileUpdate(Request $request, $id) {
        $profile = SubMenu::find($id);

        $updateData = [
            'name' => $request->name,
            'content' => $request->content,
            'parent_menu' => 'profile',
            'slug' => convertToSlug($request->name)
        ];

        $profile->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.page.profiles.index');
    }

    public function profileDestroy($id) {
        $photo = SubMenu::find($id);
        $photo->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function deptIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'dept')->orderBy('order', 'asc')->get();
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
                "parent_menu" => 'dept',
                "slug" => convertToSlug($request->name)
            ];

            SubMenu::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.page.depts.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function deptEdit($id) {
        $data['dept'] = SubMenu::find($id);
        return view('dashboard.pages.dept.edit', $data);
    }

    public function deptUpdate(Request $request, $id) {
        $dept = SubMenu::find($id);

        $updateData = [
            'name' => $request->name,
            'content' => $request->content,
            'parent_menu' => 'dept',
            'slug' => convertToSlug($request->name)
        ];

        $dept->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.page.depts.index');
    }

    public function deptDestroy($id) {
        $photo = SubMenu::find($id);
        $photo->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function rphIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'rph')->orderBy('order', 'asc')->get();
        return view('dashboard.pages.rph.index', $data);
    }

    public function rphCreate() {
        return view('dashboard.pages.rph.create');
    }

    public function rphStore(Request $request) {
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
                "parent_menu" => 'rph',
                "slug" => convertToSlug($request->name)
            ];

            SubMenu::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.page.rph.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function rphEdit($id) {
        $data['rph'] = SubMenu::find($id);
        return view('dashboard.pages.rph.edit', $data);
    }

    public function rphUpdate(Request $request, $id) {
        $rph = SubMenu::find($id);

        $updateData = [
            'name' => $request->name,
            'content' => $request->content,
            'parent_menu' => 'rph',
            'slug' => convertToSlug($request->name)
        ];

        $rph->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.page.rph.index');
    }

    public function rphDestroy($id) {
        $rph = SubMenu::find($id);
        $rph->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function eventIndex() {
        $data['submenus'] = SubMenu::where('parent_menu', 'event')->orderBy('order', 'asc')->get();
        return view('dashboard.pages.event.index', $data);
    }

    public function eventCreate() {
        return view('dashboard.pages.event.create');
    }

    public function eventStore(Request $request) {
        $images = [];
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
                "parent_menu" => 'event',
                "slug" => convertToSlug($request->name)
            ];

            if($request->hasFile('images')) {
                for($i = 0; $i < count($request->images); $i++) {
                    $file = $request->file('images')[$i];
                    $path = Storage::disk('public')->put('pages/images', $file);
                    $image = url('/') . '/storage/' . $path;
                    array_push($images, $image);
                }
            }
            $data['url_images'] = json_encode($images);

            SubMenu::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.page.events.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Ada sesuatu yang salah di server!');
        }
    }

    public function eventEdit($id) {
        $data['event'] = SubMenu::find($id);
        return view('dashboard.pages.event.edit', $data);
    }

    public function eventUpdate(Request $request, $id) {
        $event = SubMenu::find($id);
        $images = [];

        $updateData = [
            'name' => $request->name,
            'content' => $request->content,
            'parent_menu' => 'event',
            'slug' => convertToSlug($request->name)
        ];

        if($request->hasFile('images')) {
            for($i = 0; $i < count($request->images); $i++) {
                $file = $request->file('images')[$i];
                $path = Storage::disk('public')->put('pages/images', $file);
                $image = url('/') . '/storage/' . $path;
                array_push($images, $image);
            }
        }
        $updateData['url_images'] = json_encode($images);

        $event->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.page.events.index');
    }

    public function eventDestroy($id) {
        $event = SubMenu::find($id);
        $event->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function increase($id)
    {
        $subMenu = SubMenu::find($id);

        $parent_menu = $subMenu->parent_menu;
        if($subMenu->order>1){
            $subMenu->order=$subMenu->order-1;
            $subMenu->save();
            Session::flash('success', 'Urutan Berhasil Naik');
        }else{
            Session::flash('error', 'Urutan Mencapai Batas Naik');
        }

        if($parent_menu == 'profile') {
            return redirect(route('dashboard.page.profiles.index'));
        } elseif($parent_menu == 'dept') {
            return redirect(route('dashboard.page.depts.index'));
        } elseif ($parent_menu == 'rph') {
            return redirect(route('dashboard.page.rph.index'));
        } elseif ($parent_menu == 'event') {
            return redirect(route('dashboard.page.events.index'));
        }
        
        
    }

    public function decrease($id)
    {
        $subMenu = SubMenu::find($id);       
        $parent_menu = $subMenu->parent_menu;
        $subMenu->order=$subMenu->order+1;
        $subMenu->save();
        Session::flash('success', 'Urutan Berhasil Turun');

        if($parent_menu == 'profile') {
            return redirect(route('dashboard.page.profiles.index'));
        } elseif($parent_menu == 'dept') {
            return redirect(route('dashboard.page.depts.index'));
        } elseif ($parent_menu == 'rph') {
            return redirect(route('dashboard.page.rph.index'));
        } elseif ($parent_menu == 'event') {
            return redirect(route('dashboard.page.events.index'));
        }
    }
}
