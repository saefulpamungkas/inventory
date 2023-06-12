<?php

namespace App\Http\Controllers;

use App\Models\Produsen;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProdusenRequest;
use App\Http\Requests\UpdateProdusenRequest;

class ProdusenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.data_master.produsen.index', [
            'title' => 'Data Produsen',
            'produsens' => Produsen::all()
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
        Produsen::create([
            'nama_produsen' => $request->nama_produsen,
            'no_seluler' => $request->no_seluler,
            'no_telp_wa' => $request->no_telp_wa,
            'alamat_produsen' => $request->alamat_produsen,
        ]);

        return redirect('/dashboard/datamaster/produsen')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produsen $produsen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produsen $produsen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produsen = Produsen::find($id);

        $produsen->update([
            'nama_produsen' => $request->nama_produsen,
            'no_seluler' => $request->no_seluler,
            'no_telp_wa' => $request->no_telp_wa,
            'alamat_produsen' => $request->alamat_produsen,
        ]);

        return redirect('/dashboard/datamaster/produsen')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produsen = Produsen::find($id);

        $produsen->delete();

        return redirect('/dashboard/datamaster/produsen')->with('success', 'Data Berhasil Dihapus');
    }
}
