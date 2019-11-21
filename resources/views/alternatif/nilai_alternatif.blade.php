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
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>NISN</td>
                        <td>{{$data->nisn}}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>{{$data->nama}}</td>
                      </tr>
                      <tr>
                        <td>Jurusan</td>
                        <td>{{$data->jurusan}}</td>
                      </tr>
                      <tr>
                        <td>Kelas</td>
                        <td>{{$data->kelas}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6 col-sm-12">
                  <table id="data-admin" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA KRITERIA</th>
                      <th>NILAI</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($data->nilai_alternatif as $nil)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$nil->sub_kriteria->kriteria->nama}}</td>
                        <td>{{$nil->sub_kriteria->nama}}</td>
                        </form>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
@include ('includes.script')
<script type="text/javascript">
$(document).ready(function(){
    // Append all paragraphs
    $("#data-admin_length").append('<a  href="/alternatif/{{$data->nisn}}/edit"> <button type="button" class="btn btn-outline-primary ml-3">UBAH</button></a>');
});
</script>
@endsection
