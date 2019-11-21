@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">BOBOT SUB KRITERIA</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Bobot Sub Kriteria</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>Pilih Kriteria</strong></h3>
    </div>
    <div class="card-body">
    <div class="btn-group" role="group" aria-label="Basic example">
    @foreach ($kriteria as $kri)
      <a href="/bobot_sub_kriteria/{{$kri->kode}}" class="btn">
        <button type="button" class="btn {{$kri->kode == $kriteria_terpilih->kode ? 'btn-primary' : 'btn-secondary'}} btn-lg">{{$kri->nama}}</button>
      </a>
    @endforeach
    </div>
    </div>
  </div>
  <div class="card">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="m-0 text-dark"><strong>SKALA KEPENTINGAN</strong></h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            @foreach ($skala_kepentingan as $key => $skl)
              <th>{{$key}}</th>
            @endforeach
          </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($skala_kepentingan as $skl)
              <td>{{$skl}}</td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  <div class="card">
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>LANGKAH 1</strong>  MATRIK PERBANDINGAN BERPASANGAN</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered">
        <thead>
        <tr>
          <th>Kriteria</th>
          @foreach ($m_1 as $key => $krit)
            <th>{{$key}}</th>
          @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach (array_keys($m_1) as $var1)
          <tr>
            <td>{{$var1}}</td>
              @foreach (array_keys($m_1[$var1]) as $var2)
                @if ($m_1[$var1][$var2])
                  <td data-href='/bobot_sub_kriteria/{{$kriteria_terpilih->kode}},{{$var1}},{{$var2}}/edit' class="clickable-row pointer bg-success">
                    {{$m_1[$var1][$var2]}}
                  </td>
                  @else
                  <td data-href='/bobot_sub_kriteria/{{$kriteria_terpilih->kode}},{{$var1}},{{$var2}}/edit' class="clickable-row pointer bg-danger">
                    null
                  </td>
                @endif
              @endforeach
          </tr>
        @endforeach
          <tr>
            <td class="bg-secondary">Jumlah</td>
              @foreach ($jum_m_1 as $var)
                  <td class="bg-secondary">
                    {{$var}}
                  </td>
              @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @if ($m_1_null == false)
  <div class="card">
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>LANGKAH 2</strong>  MATRIK NILAI KRITERIA PROBLEM SOLVING</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <th>Kriteria</th>
          @foreach ($m_1 as $key => $krit)
            <th>{{$key}}</th>
          @endforeach
          <th>Jumlah</th>
          <th>Bobot</th>
        </thead>
        <tbody>
        @foreach (array_keys($m_2) as $var1)
          <tr>
            <td>{{$var1}}</td>
            @foreach (array_keys($m_2[$var1]) as $var2)
            <td>{{round($m_2[$var1][$var2], 2)}}</td>
            @if ($loop->last)
            <td>{{round($jum_m_2[$var1], 2)}}</td>
            <td>{{round($bobot_m_2[$var1], 2)}}</td>
            @endif
            @endforeach
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>LANGKAH 3</strong>  MATRIK PENJUMLAHAN</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <th>Kriteria</th>
          @foreach ($m_3 as $key => $krit)
            <th>{{$key}}</th>
          @endforeach
          <th>Jumlah</th>
        </thead>
        <tbody>
        @foreach (array_keys($m_3) as $var1)
          <tr>
            <td>{{$var1}}</td>
            @foreach (array_keys($m_3[$var1]) as $var2)
            <td>{{round($m_3[$var1][$var2], 2)}}</td>
            @if ($loop->last)
            <td>{{round($jum_m_3[$var1], 2)}}</td>
            @endif
            @endforeach
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>LANGKAH 4</strong>  PERHITUNGAN PROBLEM SOLVING</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <th>Kriteria</th>
          <th>Bobot</th>
          <th>Jumlah</th>
          <th>Hasil</th>
        </thead>
        <tbody>
        @foreach (array_keys($m_4) as $var1)
          <tr>
            <td>{{$var1}}</td>
            <td>{{round($m_4[$var1]['bobot'], 2)}}</td>
            <td>{{round($m_4[$var1]['jumlah'], 2)}}</td>
            <td>{{round($hasil_m_4[$var1], 2)}}</td>
          </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-center">Jumlah</td>
            <td>{{round($total_m_4, 2)}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="m-0 text-dark"><strong>LANGKAH 5</strong>  KESIMPULAN</h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <th class="text-center" colspan="2">Keterangan</th>
        </thead>
        <tbody>
          <tr>
            <td>Lamda  λ Maks </td>
            <td>{{round($hasil['lamda'], 2)}}</td>
          </tr>
          <tr>
            <td>n</td>
            <td>{{round($hasil['n'], 2)}}</td>
          </tr>
          <tr>
            <td>MAKS</td>
            <td>{{round($hasil['maks'], 2)}}</td>
          </tr>
          <tr>
            <td>CI</td>
            <td>{{round($hasil['ci'], 2)}}</td>
          </tr>
          <tr>
            <td>CR</td>
            <td>{{round($hasil['cr'], 4)}}</td>
            <td>{{$hasil['konsisten']}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @else
  <div class="alert alert-danger" role="alert">
    Silahkan Lengkapi Matrik Perbandingan Berpasangan Untuk Menampilkan Perhitungan Selanjutnya
  </div>
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
@endsection
