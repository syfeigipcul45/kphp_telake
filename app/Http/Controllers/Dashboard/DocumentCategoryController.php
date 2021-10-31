<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DocumentCategoryController extends Controller
{
    public function index() {
        $data['document_categories'] = DocumentCategory::all();
        return view('dashboard.document-categories.index', $data);
    }

    public function create() {
        return view('dashboard.document-categories.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'document_category' => 'required'
            ], [
                'document_category.required' => 'Gambar produk tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'name' => $request->document_category
            ];

            DocumentCategory::create($data);
            Session::flash('success', 'Data Berhasil Tersimpan');

            return redirect()->route('dashboard.document.categories.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    public function edit($id) {
        $data['category'] = DocumentCategory::find($id);
        return view('dashboard.document-categories.edit', $data);
    }

    public function update(Request $request, $id) {
        $document = DocumentCategory::find($id);

        $updateData = [
            'name' => $request->document_category
        ];

        $document->update($updateData);
        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('dashboard.document.categories.index');
    }

    public function destroy($id) {
        $document = DocumentCategory::find($id);
        $document->delete();
        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->back();
    }
}
