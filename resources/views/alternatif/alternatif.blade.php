@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ALTERNATIF</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Alternatif</li>
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
                  <th>NAMA SISWA</th>
                  <th>NISN</th>
                  <th>NILAI ALTERNATIF</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $sis)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$sis->nama}}</td>
                  <td>{{$sis->nisn}}</td>
                  <td>
                    <a href="/alternatif/{{$sis->nisn}}">
                      <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah">Lihat Nilai Alternatif</span>
                    </a>
                  </td>
                  <td>
                    <a href="/alternatif/{{$sis->nisn}}/edit">
                      <span class="btn badge badge-secondary" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></span>
                    </a>                    
                    <span class="btn badge badge-danger" onclick="event.preventDefault(); document.getElementById('delete-kriteria{{$sis->nisn}}').submit();" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></span>
                  </td>
                  
                  <form id="delete-kriteria{{$sis->nisn}}" action="/alternatif/{{$sis->nisn}}" method="post" style="display: none;">
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
    $("#data-admin_length").append('<a  href="{{ route('alternatif.create') }}"> <button type="button" class="btn btn-outline-primary ml-3">Tambah</button></a>');
});
</script>
@endsection
