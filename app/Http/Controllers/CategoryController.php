<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categorys = Category::all();
        $categorys = Category::latest()->get();
        return view('admin.category.index', compact('categorys'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categorys',
        ]);

        $categorys = new Category();
        $categorys->name = $request->name;
        $categorys->save();
        return redirect()
            ->route('category.index')
            ->with('success', 'Data has been added');
    }

    public function edit($id)
    {
        $categorys = Category::findOrFail($id);
        return view('admin.category.edit', compact('categorys'));
    }

    public function update(Request $request, $id)
    {
        $categorys = Category::findOrFail($id);

        if ($request->name != $categorys->name) {
            $rules['name'] = 'required';
        }

        $validasiData = $request->validate($rules);

        $categorys->name = $request->name;
        $categorys->save();
        return redirect()
            ->route('category.index')
            ->with('success', 'Data has been edited');
    }
    
    public function destroy($id)
    {
        $categorys = Category::findOrFail($id);
        $categorys->delete();
        return redirect()
            ->route('category.index')
            ->with('success', 'Data has been deleted');
    }
}
