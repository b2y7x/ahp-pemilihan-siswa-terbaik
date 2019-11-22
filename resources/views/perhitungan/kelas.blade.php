@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">PILIH KELAS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Pilih Kelas</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="m-0 text-dark"><strong>Pilih Kelas</strong></h3>
        </div>
        <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/hasil/{{$jurusan}}/X" class="btn">
                    <button type="button" class="btn btn-secondary btn-lg">X</button>
                </a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/hasil/{{$jurusan}}/XII" class="btn">
                    <button type="button" class="btn btn-secondary btn-lg">XI</button>
                </a>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/hasil/{{$jurusan}}/XII" class="btn">
                    <button type="button" class="btn btn-secondary btn-lg">XII</button>
                </a>
            </div>
        </div>
    </div>
</section>
@include ('includes.script')
@endsection