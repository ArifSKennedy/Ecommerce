<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $users = User::where('role', 'user')->get();
        // $carts = Cart::where('status', 'cart')->with('product', 'user')->latest()->get();
        $carts = Cart::all();
        return view('admin.cart.index', compact('carts','products','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'user_id' => 'required',
            'product_id' => 'required',
            'jumlah' => 'required',
        ]);

        $cek_carts = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();

        if (!empty($cek_carts)) {
            $carts = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();
            $carts->jumlah += $request->jumlah;
            $harga = $carts->product->harga * $request->jumlah;
            $carts->total_harga += $harga;
            $carts->save();
            return redirect()
                ->route('cart.index')->with('success', 'Data has been added');
        } else {
            $carts = new Cart();
            $carts->user_id = $request->user_id;
            $carts->product_id = $request->product_id;
            $carts->jumlah = $request->jumlah;
            $carts->total_harga = $carts->product->harga * $request->jumlah;
            $carts->save();
            return redirect()
                ->route('cart.index')->with('success', 'Data has been added');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carts = Cart::findOrFail($id);
        $products = Product::all();
        $users = User::all();
        return view('admin.cart.edit', compact('carts', 'products', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'jumlah' => 'required',
        ]);

        $carts = Cart::findOrFail($id);
        $carts->user_id = $request->user_id;
        $carts->product_id = $request->product_id;
        $carts->jumlah = $request->jumlah;
        $carts->total_harga = $carts->product->harga * $request->jumlah;
        $carts->save();
        return redirect()
            ->route('cart.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carts = Cart::findOrFail($id);
        $carts->delete();
        return redirect()
            ->route('cart.index')->with('success', 'Data has been deleted');
    }
}
