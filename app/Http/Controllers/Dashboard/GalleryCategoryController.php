<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gallery_categories'] = KategoriGaleri::all();
        return view('dashboard.gallery-categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ], [
                'name.required' => 'Gambar produk tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'name' => $request->name,
                'slug' => convertToSlug($request->name)
            ];

            KategoriGaleri::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.gallery.categories.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = KategoriGaleri::find($id);
        return view('dashboard.gallery-categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galeri = KategoriGaleri::find($id);

        $updateData = [
            'name' => $request->name,
            'slug' => convertToSlug($request->name)
        ];

        $galeri->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.gallery.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = KategoriGaleri::find($id);
        $gallery->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
