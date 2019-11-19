@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Sub Kriteria <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah">{{$data->nama}}</span></h1>
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
    <!-- /.card-header -->
    <div class="card-body">
      <table id="data-admin" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>NO</th>
          <th>KODE</th>
          <th>NAMA</th>
          <th>PARAMETER</th>
          <th>AKSI</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data->sub_kriteria as $krit)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$krit->kode}}</td>
          <td>{{$krit->nama}}</td>
          <td>{{$krit->parameter}}</td>
          <td>
            <a href="/sub_kriteria/{{$krit->kode}}/edit">
              <span class="btn badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></span>
            </a>                    
            <span class="btn badge badge-danger" onclick="event.preventDefault(); document.getElementById('delete-kriteria{{$krit->kode}}').submit();" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></span>
          </td>
          
          <form id='delete-kriteria{{$krit->kode}}' action="/sub_kriteria/{{$krit->kode}}" method="post" style="display: none;">
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
    $("#data-admin_length").append('<a  href="{{ route('sub_kriteria.create', $data->kode) }}"> <button type="button" class="btn btn-outline-primary ml-3">Tambah</button></a>');
});
</script>
@endsection
