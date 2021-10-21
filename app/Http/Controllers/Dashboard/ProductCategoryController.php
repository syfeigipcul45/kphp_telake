<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function index() {
        $data['product_categories'] = Category::all();
        return view('dashboard.product-categories.index', $data);
    }

    public function create() {
        return view('dashboard.product-categories.create');
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'product_category' => 'required'
            ], [
                'product_category.required' => 'Gambar produk tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'name' => $request->product_category
            ];

            Category::create($data);

            return redirect()->route('dashboard.product.categories.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }

    public function edit($id) {
        $data['category'] = Category::find($id);
        return view('dashboard.product-categories.edit', $data);
    }

    public function update(Request $request, $id) {
        $product = Category::find($id);

        $updateData = [
            'name' => $request->product_category
        ];

        $product->update($updateData);

        return redirect()->route('dashboard.product.categories.index');
    }

    public function destroy($id) {
        $product = Category::find($id);
        $product->delete();

        return redirect()->back();
    }
}
