<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('image')->where('quantity', '>', 0)->get();
        foreach ($products as $key => $product) {
            $products[$key]->price = substr($product->price, 0, strpos($product->price, 'V') - 2);
        }
        return view('client.category.index', compact('categories', 'products'));
    }
    public function productOfCategory($id)
    {
        $categories = Category::all();
        $products = Product::with('image')->where('quantity', '>', 0)->where('category_id', $id)->get();

        foreach ($products as $key => $product) {
            $products[$key]->price = substr($product->price, 0, strpos($product->price, 'V') - 2);
        }
        return view('client.product.index', compact('products', 'categories'));
    }
}
