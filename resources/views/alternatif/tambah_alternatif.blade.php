@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">TAMBAH ALTERNATIF</h1>
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
        <form role="form" method="post" action="{{ route('alternatif.store') }}">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">NISN</label>
                <input type="text" class="form-control" name="nisn" id="exampleInputEmail1" placeholder="kode nisn siswa">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama Siswa</label>
                <input type="text" class="form-control" name="nama" id="exampleInputPassword1" placeholder="nama">
              </div>
              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" name="jurusan" id="jurusan">
                  <option value="IPA">IPA</option>
                  <option value="IPS">IPS</option>
                  <option value="BAHASA">BAHASA</option>
                </select>
              </div>
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select class="form-control" name="kelas" id="kelas">
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-body">
              @foreach($kriteria as $krit)
              <div class="form-group">
                <label for="exampleInputEmail1">{{$krit->nama}}</label>
                <select class="form-control" name="nilai[{{$krit->kode}}]">
                  @foreach($krit->sub_kriteria as $sub)
                      <option value="{{$sub->kode}}">{{$sub->nama}}</option>
                  @endforeach
                </select>
              </div>
              @endforeach
            </div>
          </div>
        </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Tambah</button>
          </div>
        </form>
      </div>
      </div>
    </section>
@include ('includes.script')
@endsection
