<?php

namespace App\Http\Controllers;

use App\Models\ProduksiKeluar;
use App\Models\Produksi;
use App\Models\Produsen;
use App\Http\Requests\StoreProduksiKeluarRequest;
use App\Http\Requests\UpdateProduksiKeluarRequest;
use Illuminate\Http\Request;

class ProduksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.barang_produksi.produksi_keluar.index', [
            'title' => 'Produksi Keluar',
            'proKeluar' => ProduksiKeluar::all(),
            'produsen' => Produsen::all(),
            'produksi' => Produksi::all()
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
        ProduksiKeluar::create([
            'id_produksi' => $request->id_produksi,
            'id_produsen' => $request->id_produsen,
            'jumlah_produksi' => $request->jumlah_produksi,
            'tanggal_keluar' => $request->tanggal_keluar
        ]);

        return redirect('/dashboard/produksi/keluar')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProduksiKeluar $produksiKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduksiKeluarRequest $request, ProduksiKeluar $produksiKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodKeluar = ProduksiKeluar::find($id);
        $prodKeluar->delete();
        return redirect('/dashboard/produksi/keluar')->with('success', 'Data Berhasil Dihapus');
    }

    public function laporan()
    {
        return view('dashboard.laporan_produksi.produksikeluar', [
            'title' => 'Produksi Keluar',
            'produksi' => Produksi::all(),
            'proKeluar' => ProduksiKeluar::all(),
            'produksi' => Produksi::all(),
            'produsen' => Produsen::all()
        ]);
    }
}
