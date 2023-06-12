<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Produsen;
use App\Models\Barang;
use App\Http\Requests\UpdateBarangKeluarRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduksiRequest;
use App\Http\Requests\UpdateProduksiRequest;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.barang_produksi.index', [
            'title' => 'Barang Produksi',
            'produksi' => Produksi::all(),
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
        Produksi::create([
            'nama_barang' => $request->nama_barang,
            'jumlah_produksi' => $request->jumlah_produksi,
            'spek' => $request->spek,
        ]);

        return redirect('/dashboard/produksi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produksi $produksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produksi = Produksi::find($id);
        $produksi->update([
            'nama_barang' => $request->nama_barang,
            'jumlah_produksi' => $request->jumlah_produksi,
            'spek' => $request->spek,
        ]);

        return redirect('/dashboard/produksi')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produksi = Produksi::find($id);
        $produksi->delete();
        return redirect('/dashboard/produksi')->with('success', 'Data Berhasil Dihapus');
    }
}
