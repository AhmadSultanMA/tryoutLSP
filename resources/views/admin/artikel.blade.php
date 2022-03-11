@extends('admin.dashboardAdmin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Tarif</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tarif</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="/addArtikel"><button class="btn btn-primary">Tambahkan Artikel</button></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Pembuat Artikel</th>
                        <th>Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item => $i)
                        <tr>
                            <td>{{$item+1}}</td>
                            <td>{{$i->user->name}}</td>
                            <td>{{$i->judul_artikel}}</td>
                            <td>{{$i->category->nama_kategori}}</td>
                            <td>
                              <a href="{{ route('editartikel', $id = $i->id) }}"><button class="btn btn-info">Update</button></a>
                              <a href="{{ route('deleteartikel', $id = $i->id) }}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
@endsection