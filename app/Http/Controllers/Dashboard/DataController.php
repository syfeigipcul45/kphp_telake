<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Document;
use App\Models\DocumentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function index() {
        $data['documents'] = Document::latest()->get();
        $data['documentCategories'] = DocumentCategory::all();
        return view('dashboard.datas.index', $data);
    }

    public function create() {
        $data['doc_categories'] = DocumentCategory::all();
        return view('dashboard.datas.create', $data);
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'name' => 'required',
                'file_url' => 'required'
            ], [
                'category_id.required' => 'Kategori dokumen tidak boleh kosong!',
                'name.required' => 'Nama dokumen tidak boleh kosong!',
                'file_url.required' => 'File dokumen harus diupload!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $data = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'is_published' => $request->is_published
            ];

            if($request->hasFile('file_url')) {
                $file = $request->file('file_url');
                $path = Storage::disk('public')->put('datas', $file);
                $data['file_url'] = url('/') . '/storage/' . $path;;
            }

            Document::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.datas.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    public function edit($id) {
        $data['document'] = Document::find($id);
        $data['doc_categories'] = DocumentCategory::all();
        return view('dashboard.datas.edit', $data);
    }

    public function update(Request $request, $id) {
        $document = Document::find($id);

            if($request->is_published == 1){
                $is_published = 1;
            } else {
                $is_published = 0;
            }

        $updateData = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'is_published' => $is_published
        ];

        if($request->hasFile('file_url')) {
            $file = $request->file('file_url');
            $path = Storage::disk('public')->put('datas', $file);
            $updateData['file_url'] = url('/') . '/storage/' . $path;;
        } else {
            $updateData['file_url'] = $request->old_file_url;
        }

        $document->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.datas.index');
    }

    public function destroy($id) {
        $document = Document::find($id);
        $document->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
