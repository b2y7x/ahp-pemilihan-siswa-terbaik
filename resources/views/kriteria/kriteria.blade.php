@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">KRITERIA</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Kriteria</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="data-admin" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>NO</th>
          <th>KODE</th>
          <th>NAMA</th>
          <th>SUB KRITERIA</th>
          <th>AKSI</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data as $krit)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$krit->kode}}</td>
          <td>{{$krit->nama}}</td>
          <td>
            <a href="/sub_kriteria/{{$krit->kode}}">
              <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah">Lihat Sub Kriteria</span>
            </a>
          </td>
          <td>
            <a href="/kriteria/{{$krit->kode}}/edit">
              <span class="btn badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></span>
            </a>                    
            <span class="btn badge badge-danger" onclick="event.preventDefault(); document.getElementById('delete-kriteria').submit();" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></span>
          </td>
          
          <form id="delete-kriteria" action="/kriteria/{{$krit->kode}}" method="post" style="display: none;">
            @method('DELETE')
            @csrf
          </form>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@include ('includes.script')
<script type="text/javascript">
$(document).ready(function(){
    // Append all paragraphs
    $("#data-admin_length").append('<a  href="{{ route('kriteria.create') }}"> <button type="button" class="btn btn-outline-primary ml-3">Tambah</button></a>');
});
</script>
@endsection
