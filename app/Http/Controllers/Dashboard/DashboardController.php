<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Post;
use App\Models\Seed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index() {
        $data['news_total'] = Post::count();
        $data['product_total'] = Seed::count();
        $data['doc_total'] = Document::count();
        return view('dashboard.dashboard.index', $data);
    }

    public function editProfile($id) {
        $data['user'] = User::find($id);
        $data['roles'] = Role::orderBy('id', 'asc')->get();
        return view('dashboard.edit_profile', $data);
    }

    public function updateProfile(Request $request, $id) {
        $user = User::find($id);

        $updateData = [
            'display_name' => $request->display_name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        if(!empty($request->password)) {
            $updateData['password'] = bcrypt($request->password);
        }

        $user->update($updateData);
        $user->syncRoles($request->role_id);
        Session::flash('success', 'Data Berhasil Diubah');
        return redirect()->back();
    }
}
