<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
Use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::where('parent_id', 0)->get();

        return view('website.backend.category.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id', 0)->get();

        return view('website.backend.category.create', ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;

        $category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        Alert::success('Success ', 'Create Successfully!!');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        if ($category->parent_id == 0) {
            $category->load('children');

            return view('website.backend.category.show', ['category' => $category]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categoryList = Category::all();
        if ($category->parent_id == 0){
            $category->load('children');

            return view('website.backend.category.update', [
                'category' => $category,
                'categoryList' => $categoryList,
            ]);
        }

        return view('website.backend.category.update', [
            'category' => $category,
            'categoryList' => $categoryList,
        ]);
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
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        Alert::success('Success ', 'Edit Successfully!!');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->load('children');

        if ($category->children->count()){
            foreach ($category->children as $child){
                $child->delete();
            }
        }
        $category->delete();
        Alert::success('Success ', 'Delete Successfully!!');

        return redirect()->back();
    }
}
