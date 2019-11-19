@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">UBAH BOBOT KRITERIA</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/bobot_kriteria">Bobot Sub Kriteria</a></li>
              <li class="breadcrumb-item active">Ubah Bobot Kriteria</li>
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
            <form role="form" method="post" action="{{ route('bobot_kriteria.store') }}">
            @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kode Kriteria Pertama</label>
                        <input type="text" class="form-control" value="{{$data[0]}}" name="kode_kriteria_1" readonly>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Lebih Penting</label>
                        <select class="form-control" name="nilai">
                          <option value="0.1111">0.11</option>
                          <option value="0.125">0.12</option>
                          <option value="0.1428">0.14</option>
                          <option value="0.1666">0.17</option>
                          <option value="0.2">0.2</option>
                          <option value="0.25">0.25</option>
                          <option value="0.333">0.33</option>
                          <option value="0.5">0.5</option>
                          <option value="1" selected>1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kode Sub Kriteria Kedua</label>
                        <input type="text" class="form-control" value="{{$data[1]}}" name="kode_kriteria_2" readonly>
                      </div>
                    </div>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
@include ('includes.script')
@endsection
