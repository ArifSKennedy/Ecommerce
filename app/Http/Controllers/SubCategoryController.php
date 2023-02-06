<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() 
    {
        $subcategorys = SubCategory::with('category')->latest()->get();
        $categorys = Category::all();
        return view('admin.subcategory.index', compact('subcategorys', 'categorys'));
    }

    public function create()
    {
        $categorys = SubCategory::all();
        return view('admin.subcategory.create', compact('categorys'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $subcategorys = new SubCategory();
        $subcategorys->category_id = $request->category_id;
        $subcategorys->name = $request->name;
        $subcategorys->save();
        return redirect()
            ->route('subcategory.index')->with('success', 'Data has been added');

    }

    public function edit($id)
    {
        $categorys = Category::all();
        $subcategorys = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('categorys', 'subcategorys'));
    }

    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        $subcategorys = SubCategory::findOrFail($id);
        $subcategorys->category_id = $request->category_id;
        $subcategorys->name = $request->name;
        $subcategorys->save();
        return redirect()
            ->route('subcategory.index')->with('success', 'Data has been edited');
    }

    public function destroy($id)
    {
        $subcategorys = SubCategory::findOrFail($id);
        $subcategorys->delete();
        return redirect()
            ->route('subcategory.index')->with('success', 'Data has been deleted');

    }

    public function getSubCategory($id)
    {
        $sub_categorys = SubCategory::where('category_id', $id)->get();
        return response()->json($sub_categorys);
    }

}
