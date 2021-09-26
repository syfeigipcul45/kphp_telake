<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Seed;
use App\Models\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                'seed_price' => 'required',
                'seed_stock' => 'required'
            ], [
                'seed_thumbnail.required' => 'Gambar bibit tidak boleh kosong!',
                'seed_name.required' => 'Nama bibit tidak boleh kosong!',
                'seed_price.required' => 'Nama penjual bibit tidak boleh kosong!',
                'seed_stock.required' => 'Stok bibit tidak boleh kosong!'
            ]);

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $data = [
                'seed_name' => $request->seed_name,
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

            return redirect()->route('dashboard.seeds.index');
            
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }
}
