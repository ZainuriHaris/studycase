<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use File;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemasukan::all();
        return view('pemasukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasukan.create');

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
        Pemasukan::create($input);
        return redirect()->route('pemasukan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Pemasukan::find($id);
        return view('pemasukan.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pemasukan::find($id);
        return view('pemasukan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Pemasukan::find($id);

        if($request->hasFile('bukti_transfer')){
            $path_simpan = 'public/images/transfer';
            $gambar = $request->file('bukti_transfer');
            $nama = $gambar->getClientOriginalName();
            $path = $request->file('bukti_transfer')->storeAs($path_simpan, $nama);
            $input['bukti_transfer'] = $nama;
        }

        $data->update($input);
        return redirect()->route('pemasukan.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pemasukan::find($id);
        File::delete('storage/images/transfer/'.$data->bukti_transfer);// delete data image local
        $data->delete();
        return redirect()->route('pemasukan.index');

        //
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
