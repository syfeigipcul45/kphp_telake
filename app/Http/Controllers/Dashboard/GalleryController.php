<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['galleries'] = Galeri::orderBy('kategori_id', 'asc')->get();
        return view('dashboard.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = KategoriGaleri::orderBy('name', 'asc')->get();
        return view('dashboard.gallery.create', $data);
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
                'caption' => 'required',
                'kategori_id' => 'required'
            ], [
                'kategori_id.required' => 'Kategori foto tidak boleh kosong!',
                'caption.required' => 'Caption foto tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'caption' => $request->caption,
                'kategori_id' => $request->kategori_id
            ];

            $galeri = Galeri::create($data);
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $galeri->addMediaFromRequest('thumbnail')->toMediaCollection('galleries');
            }
            
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.gallery.index');
            
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
        $data['categories'] = KategoriGaleri::orderBy('name', 'asc')->get();
        $data['gallery'] = Galeri::find($id);
        return view('dashboard.gallery.edit', $data);
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
        $galeri = Galeri::find($id);
        try {
            $validator = Validator::make($request->all(), [
                'caption' => 'required',
                'kategori_id' => 'required'
            ], [
                'kategori_id.required' => 'Kategori foto tidak boleh kosong!',
                'caption.required' => 'Caption foto tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $updateData = [
                'caption' => $request->caption,
                'kategori_id' => $request->kategori_id
            ];

            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $galeri->clearMediaCollection('galleries');
                $galeri->addMedia($request->thumbnail)->toMediaCollection('galleries');
            }

            $galeri->update($updateData);
            
            Session::flash('success', 'Data Berhasil Diubah');

            return redirect()->route('dashboard.gallery.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();
        $galeri->clearMediaCollection('galleries');
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
