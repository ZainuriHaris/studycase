<?php

namespace App\Http\Controllers;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use File;
class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengeluaran::all();
        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // save data tipe file
        if($request->hasFile('bukti_transfer')){
            $path_simpan = 'public/images/transfer';
            $gambar = $request->file('bukti_transfer');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transfer')->storeAs($path_simpan, $nama);
            $input['bukti_transfer'] = $nama;
        }
        //insert data sesuai id or name sama dengan nama database
        Pengeluaran::create($input);
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data=Pengeluaran::find($id);
        return view('pengeluaran.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Pengeluaran::find($id);
        return view('pengeluaran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Pengeluaran::find($id);

        if($request->hasFile('bukti_transfer')){
            $path_simpan = 'public/images/transfer';
            $gambar = $request->file('bukti_transfer');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transfer')->storeAs($path_simpan, $nama);
            $input['bukti_transfer'] = $nama;
        }

        $data->update($input);
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengeluaran::find($id);
        File::delete('storage/images/transfer/'.$data->bukti_transfer);// delete data image local
        $data->delete();
        return redirect()->route('pengeluaran.index');
    }
}
