<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductStorage;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imports = ProductStorage::with('product', 'storage')->get();
        return view('admin.pages.storage.index', compact('imports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $storages = Storage::all();
        $products = Product::select('name', 'id')->get();
        return view('admin.pages.storage.create', compact('products', 'storages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = true;
        $data = $request->send_data;
        foreach ($data as $key => $value) {
            $san_pham = Product::find($value['id']);
            if (!$san_pham) {
                $check = false;
                break;
            }
        }
        if ($check) {
            $bill_id = Str::uuid();
            foreach ($data as $key => $value) {
                $product = Product::find($value['id']);
                ProductStorage::create([
                    'product_id' => $product->id,
                    'storage_id' => $request->storage,
                    'quantity' =>  $value['quantity'],
                    'import_price' => $value['import_price'],
                    'bill_id' => $bill_id,
                ]);
                $product->quantity += $value['quantity'];
                $san_pham->save();
            }
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function show(Storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function edit(Storage $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Storage $storage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storage $storage)
    {
        //
    }
}
