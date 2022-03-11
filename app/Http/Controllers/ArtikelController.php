<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    // Menampilkan detail Artikel
    public function baca($id)
    {
        $baca = Artikel::where('id', $id)->value('view');
        $data = Artikel::where('id', $id)->first();
        $data->view = $baca + 1;
        $data->save();
        return view('user.baca', compact('data'));
    }
    
    // Menampilkan Artikel serta membuat fungsi orderBy
    public function artikel()
    {
        $terbaru = Artikel::orderBy('created_at', 'desc')->paginate(3);
        $data = Artikel::orderBy('view', 'desc')->paginate(5);

        return view('user.isidashboard',compact('data','terbaru'));
    }

    // Menampilkan artikel untuk admin
    public function index()
    {
        $data = Artikel::all();

        return view('admin.artikel',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Mengirim table Kategori
    public function create()
    {
        $data = Kategori::all();

        return view('admin.addArtikel',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Membuat fungsi store atau menyimpan 
    public function store(Request $request)
    {   
        // Mengambil nama dari file
        $filename = $request->gambar->getClientOriginalName();
        // Menaruh file yang diambil ke storage kita
        $image = $request->gambar->storeAs('artikel',$filename);

        $data = Artikel::create([
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'judul_artikel' => $request->judul_artikel,
            'isi_artikel' => $request->isi_artikel,
            'gambar' => $image,
        ]);

        return redirect()->route('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Menampilkan data yang dipilih di artikel
    public function show($id)
    {
        $kategori = Kategori::all();
        $data = Artikel::where('id',$id)->firstOrfail();

        return view('admin.editArtikel',compact('data','kategori'));
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

    //  Membuat fungsi edit untuk artikel
    public function update(Request $request, $id)
    {
        $filename = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('artikel',$filename);

        $data = Artikel::where('id',$id)->firstOrfail();

            $data->user_id = $request->user_id;
            $data->kategori_id = $request->kategori_id;
            $data->judul_artikel = $request->judul_artikel;
            $data->isi_artikel = $request->isi_artikel;
            $data->gambar = $image;

            $data->save();

            return redirect()->route('artikel');
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
        $data = Artikel::where('id',$id)->firstOrfail();

        $data->delete();

        return redirect()->route('artikel');
    }
}
