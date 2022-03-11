@extends('user.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ini Halaman User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="text-lg">Terbaru</div>
            <div class="row">
                @foreach ($terbaru as $item)
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="info-box">
                        <img src="{{url('storage/'.$item->gambar)}}" height="150" width="150" class="bg-danger elevation-1">

                        <div class="pl-5">
                            <span class="info-box-number">
                                Judul Artikel : {{$item->judul_artikel}}
                             </span>
                            <span class="info-box-text">Penulis : {{$item->user->name}}</span>
                            <span class="info-box-text">Kategori : {{$item->category->nama_kategori}}</span>
                            <span class="info-box-text"> <a class="text-info" href="{{route('baca',$id = $item->id)}}">baca</a></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-lg">Terfavorit</div>
            <div class="row">
                @foreach ($data as $item)
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="info-box">
                        <img src="{{url('storage/'.$item->gambar)}}" height="150" width="150" class="bg-danger elevation-1">

                        <div class="pl-5">
                            <span class="info-box-number">
                                Judul Artikel : {{$item->judul_artikel}}
                             </span>
                            <span class="info-box-text">Penulis : {{$item->user->name}}</span>
                            <span class="info-box-text">Kategori : {{$item->category->nama_kategori}}</span>
                            <span class="info-box-text"> <a class="text-info" href="{{route('baca',$id = $item->id)}}">baca</a></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                @endforeach
            </div>
            <div class="col-12 mt-3">
                {{$data->links()}}
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection