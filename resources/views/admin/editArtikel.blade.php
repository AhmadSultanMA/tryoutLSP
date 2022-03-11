
@extends('admin.dashboardAdmin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Artikel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('artikel') }}">Artikel</a></li>
                    <li class="breadcrumb-item active">Edit Artikel</li>
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
            <form action="{{ route('updateartikel',$id = $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <input type="hidden" name="user_id" value={{$data->user_id}}>
            
                <select class="form-select" name="kategori_id" required>
                    @foreach ($kategori as $item)
                        <option value={{$item->id}} >{{$item->nama_kategori}}</option>
                    @endforeach
                </select>
            
                <div class="form-group last mb-3">
                    <label for="judul_artikel">Judul Artikel</label>
                    <input type="judul_artikel" class="form-control" placeholder="Judul Artikel" value={{$data->judul_artikel}} id="judul_artikel" name="judul_artikel" required>
                </div>
            
                <div class="form-group last mb-3">
                    <label for="isi_artikel">Isi Artikel</label>
                    <textarea type="isi_artikel" class="form-control" placeholder="Isi Artikel" value={{$data->isi_artikel}} id="isi_artikel" cols="30" rows="10" name="isi_artikel" required></textarea>
                </div> 
                
                <div class="form-group last mb-3">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" placeholder="Gambar" id="gambar" value={{$data->gambar}} name="gambar" required>
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
    </div><!-- /.container-fluid -->
  </section>
@endsection