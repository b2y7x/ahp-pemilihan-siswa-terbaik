@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tambah Sub Kriteria <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah">{{$data->nama}}</span></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/kriteria">Kriteria</a></li>
          <li class="breadcrumb-item active">{{$data->nama}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body">
      <form role="form" method="post" action="{{ route('sub_kriteria.store') }}">
      @csrf
        <div class="card-body">
          <div class="form-group">
          <div class="form-group">
            <label for="exampleInputEmail1">Kriteria</label>
              <input type="text" class="form-control" value="{{$data->nama}}" disabled id="exampleInputEmail1" placeholder="kode">
              <input type="hidden" class="form-control" value="{{$data->kode}}" name="kode_kriteria" id="exampleInputEmail1" placeholder="kode">
          </div>
            <label for="exampleInputEmail1">Kode Sub Kriteria</label>
            <input type="text" class="form-control" name="kode" id="exampleInputEmail1" placeholder="kode">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Kriteria</label>
            <input type="text" class="form-control" name="nama" id="exampleInputPassword1" placeholder="nama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parameter</label>
            <input type="text" class="form-control" name="parameter" id="exampleInputPassword1" placeholder="0 - 30 / 31 - 60 / 61 - 100">
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@include ('includes.script')
@endsection
