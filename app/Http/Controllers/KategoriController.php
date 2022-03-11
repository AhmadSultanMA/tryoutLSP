<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Mengirim data kategori untuk tampilan admin
    public function index()
    {
        $data = Kategori::all();

        return view('admin.kategori',compact('data'));
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

    //  Membuat fungsi store atau menyimpan table Kategori
    public function store(Request $request)
    {
        $data = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Menampilkan kategori yang ingin dipilih
    public function show($id)
    {
        $data = Kategori::where('id',$id)->firstOrfail();

        return view('admin.editKategori',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Membuat fungsi edit Kategori
    public function update(Request $request, $id)
    {
        $data = Kategori::where('id',$id)->firstOrfail();

            $data->nama_kategori = $request->nama_kategori;

            $data->save();

            return redirect()->route('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Membuat fungsi delete
    public function destroy($id)
    {
        $data = Kategori::where('id',$id)->firstOrfail();

        $data->delete();

        return redirect()->route('kategori');
    }
}
