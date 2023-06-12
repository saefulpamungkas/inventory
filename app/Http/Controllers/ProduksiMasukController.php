<?php

namespace App\Http\Controllers;

use App\Models\ProduksiMasuk;
use App\Models\Produksi;
use App\Models\Produsen;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduksiMasukRequest;
use App\Http\Requests\UpdateProduksiMasukRequest;

class ProduksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.barang_produksi.produksi_masuk.index', [
            'title' => 'Barang Masuk Produksi',
            'proMasuk' => ProduksiMasuk::all(),
            'produksi' => Produksi::all(),
            'produsen' => Produsen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProduksiMasuk::create([
            'id_produksi' => $request->id_produksi,
            'id_produsen' => $request->id_produsen,
            'jumlah_produksi' => $request->jumlah_produksi,
            'tanggal_produksi' => $request->tanggal_produksi
        ]);

        $produksi = Produksi::find($request->id_produksi);
        $produksi->jumlah_produksi += $request->jumlah_produksi;
        $produksi->save();

        return redirect('/dashboard/produksi/masuk')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProduksiMasuk $produksiMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduksiMasuk $produksiMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduksiMasukRequest $request, ProduksiMasuk $produksiMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodMasuk = ProduksiMasuk::find($id);
        $prodMasuk->delete();
        return redirect('/dashboard/produksi/masuk')->with('success', 'Data Berhasil Dihapus');
    }
}
