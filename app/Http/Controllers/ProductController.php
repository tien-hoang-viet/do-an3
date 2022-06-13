<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'image')->get();
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if ($categories == null) {
            return redirect(route('category.create'));
        }
        return view('admin.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['price'] = str_replace('.', '', $data['price']) . 'VND';
        $path = $data['path'];
        $product = Product::create($data);
        $img = Image::create(['product_id' => $product->id, 'path' => $path]);
        toastr()->success('Create Success');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = Category::all();
        $categoryOfProduct = $product->category()->first();
        $imageOfProduct = $product->image()->first();
        $product->price = substr($product->price, 0, strpos($product->price, 'V'));
        return view('admin.pages.product.detail', compact('product', 'categories', 'imageOfProduct', 'categoryOfProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $product->update($data);
        $product->save();
        $product->image()->first()->update($data);
        toastr()->success('Update Successful');
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->image()->delete();
        $product->delete();
        return response()->json(['status' => true], 200);
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->name . '%')
            ->orderByDesc('quantity')
            ->take(10)
            ->get();
        return response()->json(['data' => $products]);
    }
    
    public function list()
    {
        $product = Product::all();
        return response()->json(['data' => $product]);
    }

    public function productDetail($id, $product_id)
    {
        $product = Product::with('image', 'category')->where('id', $product_id)->where('category_id', $id)->first();
        $product->price = substr($product->price, 0, strpos($product->price, 'V') - 2);
        return view('client.product.detail', compact('product'));
    }
}
