<?php

namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
use Str;
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
        $categorys = Category::all();
        $product = Product::with('category','sub_category')->latest()->get();
        // $categorys = Category::all();
        // return view('admin.product.index', compact('products', 'categorys', 'subcategorys'));
        return view('admin.product.index', compact('product','categorys'));

        // Compact dari Variabel
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->nama_produk = $request->nama_produk;
        $product->slug = Str::slug($request->nama_produk, '-');
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        if ($request->hasfile('gambar_produk')) {
            foreach ($request->file('gambar_produk') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/gambar_produk/', $name);
                $images = new Image();
                $images->product_id = $product->id;
                $images->gambar_produk = 'images/gambar_produk/' . $name;
                $images->save();
            }
        }

        return redirect()
            ->route('product.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categorys = Category::all();
        $product = Product::findOrFail($id);
        $subcategorys = SubCategory::where('category_id', $product->category_id)->get();
        $images = Image::where('product_id', $id)->get();
        // return view('admin.produk.edit', compact('kategoris', 'produk', 'subKategoris', 'images'));
        return view('admin.product.edit', compact('categorys', 'product', 'subcategorys', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->category_id = $product->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->nama_produk = $request->nama_produk;
        $product->slug = Str::slug($request->nama_produk, '-');
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->deskripsi = $request->deskripsi;
        $product->save();
        return redirect()
            ->route('product.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $products = Product::findOrFail($id);
        $images = Image::where('product_id', $id)->get();
        foreach ($images as $image) {
            $image->deleteImage();
            $image->delete();
        }
        $products->delete();
        return redirect()
            ->route('product.index')->with('success', 'Data has been deleted');
    }
}
