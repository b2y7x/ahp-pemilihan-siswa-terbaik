@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">HASIL PERHITUNGAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Hasil Perhitungan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<section class="content">
  @if (isset($error))
  <div class="alert alert-danger" role="alert">
    {{$error}}
  </div>
  @else
  @if(isset($hasil_1['kriteria']) && isset($hasil_1['sub_kriteria']))
  <div class="card">
    <!-- /.card-header -->
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>HASIL</strong></h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
              <h3 class="m-0 text-dark"><strong>HASIL 1</strong></h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <tbody>
                  <tr>
                    @foreach (array_keys($hasil_1['kriteria']) as $kriteria)
                    <td class="bg-primary">
                    {{$kriteria}}
                    </td>
                    @endforeach
                  </tr>
                  <tr>
                    @foreach ($hasil_1['kriteria'] as $kriteria)
                    <td>
                    {{$kriteria}}
                    </td>
                    @endforeach
                  </tr>
                  @foreach ($hasil_1['sub_kriteria'] as $xxx)
                  <tr class="bg-secondary">
                  @foreach ($xxx as $key => $sub)
                    <td>
                      {{$key}}
                    </td>
                  @endforeach
                  </tr>
                  <tr>
                  @foreach ($xxx as $key => $sub)
                    <td>
                      {{$sub}}
                    </td>
                  @endforeach
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
              <h3 class="m-0 text-dark"><strong>HASIL 2</strong></h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered">
                <tbody>
                  @foreach ($hasil_2 as $key1 => $xxx)
                  <tr class="bg-secondary">
                  @foreach ($xxx as $key2 => $sub)
                    @if ($loop->first)
                    <td class="bg-primary">
                      {{$key1}}
                    </td>
                    @endif
                    <td>
                      {{$key2}}
                    </td>
                  @endforeach
                  </tr>
                  <tr>
                    <td class="bg-primary"></td>
                  @foreach ($xxx as $key3 => $sub)
                    <td>
                      {{$sub}}
                    </td>
                  @endforeach
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
  </div>
  <div class="card">
    <!-- /.card-header -->
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>PERANGKINGAN</strong></h3>
    </div>
    <div class="card-body">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
          <h3 class="m-0 text-dark"><strong>Tabel Data Nilai Alternatif 1</strong></h3>
        </div>
        <div class="card-body">
          <table id="data-admin" class="table table-bordered">
            <thead>
              <th>NISN</th>
              @foreach (array_keys($hasil_1['kriteria']) as $head)
              <th>{{$head}}</th>
              @endforeach
            </thead>
            <tbody>
              @foreach ($nilai_alternatif as $key => $alt)
              <tr>
                <td>
                {{$alt['nisn']}}
                </td>
                @foreach ($alt['nilai'] as $key2 => $val)
                @foreach ($val as $key3 => $val3)
                <td>
                {{$key3}}
                </td>
                @endforeach
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
          <h3 class="m-0 text-dark"><strong>Tabel Data Nilai Alternatif 2</strong></h3>
        </div>
        <div class="card-body">
          <table id="data-admin-1" class="table table-bordered">
            <thead>
              <th>NISN</th>
              @foreach (array_keys($hasil_1['kriteria']) as $head)
              <th>{{$head}}</th>
              @endforeach
            </thead>
            <tbody>
                @foreach ($nilai_alternatif as $key => $alt)
              <tr>
                <td>
                {{$alt['nisn']}}
                </td>
                @foreach ($alt['nilai'] as $key2 => $val)
                @foreach ($val as $key3 => $val3)
                <td>
                {{$val3}}
                </td>
                @endforeach
                @endforeach
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
          <h3 class="m-0 text-dark"><strong>Tabel Data Perangkingan</strong></h3>
        </div>
        <div class="card-body">
          <table id="data-admin-2" class="table table-bordered">
            <thead>
              <th>NISN</th>
              @foreach (array_keys($hasil_1['kriteria']) as $head)
              <th>{{$head}}</th>
              @endforeach
              <th>Hasil</th>
              <th>Rangking</th>
            </thead>
            <tbody>
              @foreach ($perangkingan as $key => $alt)
              <tr>
                <td>{{$alt['nisn']}}</td>
                @foreach ($alt['nilai'] as $val)
                @foreach ($val as $val2)
                <td>{{$val2}}</td>
                @endforeach
                @endforeach
                <td>{{$alt['hasil']}}</td>
                <td>{{$alt['rangking']}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="alert alert-danger" role="alert">
    Data Belum Lengkap !
  </div>
  @endif
  @endif
</section>
@include ('includes.script')
<script>
  jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
      });
  });
</script>
<script>
  $(function () {
    $("#data-admin-2").DataTable({
      "order": [[ 6, "asc" ]],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language": {
          "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
    "sProcessing":   "Sedang memproses...",
    "sLengthMenu":   "Tampilkan _MENU_ entri",
    "sZeroRecords":  "Tidak ditemukan data yang sesuai",
    "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
    "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
    "sInfoPostFix":  "",
    "sSearch":       "Cari:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "Pertama",
        "sPrevious": "Sebelumnya",
        "sNext":     "Selanjutnya",
        "sLast":     "Terakhir"
    }
        }
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
    // Append all paragraphs
    $("#data-admin-2_length").append('<a  href="{{ Request::url() }}/cetak"> <button type="button" class="btn btn-outline-primary ml-3">Export ke Excel</button></a>');
});
</script>
@endsection
