@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">TAMBAH ADMIN</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Tambah Admin</li>
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
      <form role="form" method="post" action="{{ route('admin.store') }}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="name" id="nama" placeholder="nama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">No Telp</label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="nomor telpon">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">ulangi password</label>
            <input type="password" class="form-control" name="password_confirm" id="password" placeholder="ulangi password">
          </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@include ('includes.script')
@endsection
