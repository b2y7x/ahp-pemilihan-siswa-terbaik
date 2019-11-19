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
                    <button type="button" class="btn btn-secondary btn-lg">{{$kri->nama}}</button>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include ('includes.script')
@endsection