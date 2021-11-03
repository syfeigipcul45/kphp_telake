<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Seed;
use App\Models\Option;
use App\Http\Controllers\Controller;
use App\Models\CommentsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SeedController extends Controller
{
    public function index() {
        $data['seeds'] = Seed::all();
        return view('dashboard.seeds.index', $data);
    }

    public function create() {
        $data['option'] = Option::first();
        return view('dashboard.seeds.create', $data);
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'seed_thumbnail' => 'required',
                'seed_name' => 'required',
                'description' => 'required',
                'seed_price' => 'required',
                'seed_stock' => 'required'
            ], [
                'seed_thumbnail.required' => 'Gambar produk tidak boleh kosong!',
                'seed_name.required' => 'Nama produk tidak boleh kosong!',
                'description.required' => 'Deskripsi produk tidak boleh kosong!',
                'seed_price.required' => 'Nama penjual produk tidak boleh kosong!',
                'seed_stock.required' => 'Stok produk tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'seed_name' => $request->seed_name,
                'description' => $request->description,
                'seller_whatsapp' => $request->seller_whatsapp,
                'seed_price' => $request->seed_price,
                'seed_stock' => $request->seed_stock
            ];

            if($request->hasFile('seed_thumbnail')) {
                $file = $request->file('seed_thumbnail');
                $path = Storage::disk('public')->put('seeds/thumbnail', $file);
                $data['seed_thumbnail'] = url('/') . '/storage/' . $path;;
            }

            Seed::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.seeds.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    public function show($id) {
        $data['seed'] = Seed::find($id);
        $data['comments'] = CommentsProduct::where('product_id', $id)->get();
        return view('dashboard.seeds.show', $data);
    }

    public function edit($id) {
        $data['seed'] = Seed::find($id);
        return view('dashboard.seeds.edit', $data);
    }

    public function update(Request $request, $id) {
        $seed = Seed::find($id);

        $updateData = [
            'seed_name' => $request->seed_name,
            'description' => $request->description,
            'seed_price' => $request->seed_price,
            'seed_stock' => $request->seed_stock
        ];

        if($request->hasFile('seed_thumbnail')) {
            $file = $request->file('seed_thumbnail');
            $path = Storage::disk('public')->put('products/thumbnail', $file);
            $updateData['seed_thumbnail'] = url('/') . '/storage/' . $path;;
        } else {
            $updateData['seed_thumbnail'] = $request->seed_thumbnail;
        }

        $seed->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.seeds.index');
    }

    public function destroy($id) {
        $seed = Seed::find($id);
        $seed->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }

    public function showComment($id)
    {
        $comment = CommentsProduct::find($id);

        $updateData = [
            "is_published" => 1
        ];
        $comment->update($updateData);
        return redirect()->back()->with('success', 'Komentar berhasil ditampilkan');
    }

    public function hideComment($id)
    {
        $comment = CommentsProduct::find($id);

        $updateData = [
            "is_published" => 0
        ];
        $comment->update($updateData);
        return redirect()->back()->with('success', 'Komentar berhasil tidak ditampilkan');
    }

    public function destroyComment($id)
    {
        $comment = CommentsProduct::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
