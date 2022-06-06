<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::where('is_parent', '=', 1)->get();
        if (isset($parents)) {
            return view('admin.pages.category.create', compact('parents'));
        }
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_slice($request->all(), 1);
        if (!isset($data['is_parent'])) {
            $data['is_parent'] = 0;
            $data['parent_name'] = Category::select('name')->where('id', '=', $data['parent_id'])->first()->name;
        } else {
            $data['is_parent'] = 1;
        }
        Category::create($data);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::where('parent_id', '=', 0)->where('id', '<>', $category->id)->get();
        return view('admin.pages.category.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        if (!isset($data['is_parent'])) {
            $data['is_parent'] = 0;
            $data['parent_name'] = Category::select('name')->where('id', '=', $data['parent_id'])->first()->name;
        } else {
            $data['is_parent'] = 1;
        }
        $category->update($data);
        $category->save();
        Category::where('parent_id', $category->id)->update(['parent_name' => $data['name']]);
        return redirect(route('category.index'));
    }

    public function checkParent(Category $category)
    {
        if ($category->is_parent) {
            $check = count(Category::where('parent_id', $category->id)->get());
            if ($check == 0) {
                return true;
            }
            return false;
        }
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($this->checkParent($category)) {
            $products = $category->products()->get();
            if (count($products) == 0) {
                $category->delete();
                return response()->json(array('status' => true), 200);
            }
            return response()->json(array('status' => false, 'msg' => "There is some products still have category"), 400);
        }
        return response()->json(array('status' => false, 'msg' => "This is parent category cannot be deleted"), 400);
    }
}
