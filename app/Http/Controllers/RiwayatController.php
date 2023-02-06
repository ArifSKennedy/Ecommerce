<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Riwayat::with('product')->latest()->get();
        return view('admin.riwayat.index', compact('riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.product.index', compact('product'));
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
            'product_id' => 'required',
            'type' => 'required',
            'qty' => 'required',
            'note' => 'required',
        ]);

        $riwayat = new Riwayat();
        $riwayat->product_id = $request->product_id;
        $riwayat->type = $request->type;
        $riwayat->qty = $request->qty;
        $riwayat->note = $request->note;
        $riwayat->save();

        $products = Product::findOrFail($riwayat->product_id);
        if ($riwayat->type == 'masuk') {
            $products->stok += $riwayat->qty;
        } elseif ($riwayat->type == 'keluar') {
            if ($products->stok < $riwayat->qty) {
                return redirect()
                    ->route('product.index')->with('error', 'Stok Kurang');
            } else {
                $products->stok -= $riwayat->qty;
            }
        }

        $products->save();
        return redirect()
            ->route('product.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat $riwayat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat $riwayat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riwayat $riwayat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();
        return redirect()
            ->route('riwayat.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
