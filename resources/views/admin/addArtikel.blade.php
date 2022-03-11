@extends('admin.dashboardAdmin')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Artikel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tarif</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Isi data - data dibawah ini dengan benar</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/addArtikel" method="POST" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" name="user_id" value={{auth()->user()->id}}>
            
                <select class="form-select" name="kategori_id">
                    @foreach ($data as $item)
                        <option value={{$item->id}}>{{$item->nama_kategori}}</option>
                    @endforeach
                </select>
            
                <div class="form-group last mb-3">
                    <label for="judul_artikel">Judul Artikel</label>
                    <input type="judul_artikel" class="form-control" placeholder="Judul Artikel" id="judul_artikel" name="judul_artikel">
                </div>
            
                <div class="form-group last mb-3">
                    <label for="isi_artikel">Isi Artikel</label>
                    <textarea type="isi_artikel" class="form-control" placeholder="Isi Artikel" rows="10" cols="30" id="isi_artikel" name="isi_artikel"></textarea>
                </div> 
                
                <div class="form-group last mb-3">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" placeholder="Gambar" id="gambar" name="gambar">
                </div>
            
                <input type="submit" value="Kirim" class="btn btn-block btn-primary">
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div>
    @endsection
