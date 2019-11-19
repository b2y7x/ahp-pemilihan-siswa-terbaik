@extends('layouts.app_noscript')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ADMIN / GURU</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Admin Guru</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card">
      @if(session('success'))
      <span class="alert alert-success" role="alert">
          <strong>{{ session('success') }}</strong>
      </span>
      @endif
      @if(session('error'))
      <span class="alert alert-danger" role="alert">
          <strong>{{ session('error') }}</strong>
      </span>
      @endif
            <!-- /.card-header -->
            <div class="card-body">
              <table id="data-admin" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>USERNAME</th>
                  <th>NAMA</th>
                  <th>E-MAIL</th>
                  <th>NO. TELP</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $admin)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$admin->username}}</td>
                  <td>{{$admin->name}}</td>
                  <td>{{$admin->email}}</td>
                  <td>{{$admin->no_telp}}</td>
                  <td>
                    <span onclick="event.preventDefault(); document.getElementById('delete-admin{{$admin->id}}').submit();"  class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></span>
                  </td>
                  <form id="delete-admin{{$admin->id}}" action="/admin/{{$admin->id}}" method="post" style="display: none;">
                    @method('DELETE')
                    @csrf
                  </form>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </section>
@include ('includes.script')
<script type="text/javascript">
$(document).ready(function(){
    // Append all paragraphs
    $("#data-admin_length").append('<a href="/admin/create"><button type="button" class="btn btn-outline-primary ml-3">Tambah</button></a>');
});
</script>
@endsection
