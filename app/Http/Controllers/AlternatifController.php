<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternatif;
use App\NilaiAlternatif;
use App\Kriteria;

class AlternatifController extends Controller
{
    public function index(){
        $kriteria = Kriteria::all();
        $data = Alternatif::all();
        return view('alternatif.alternatif')->with('data', $data);
    }
    public function show($id){
        $data = Alternatif::with('nilai_alternatif.sub_kriteria.kriteria')->where('nisn', $id)->first();
        if($data){
            return view('alternatif.nilai_alternatif')->with('data', $data);
        }
    }
    public function create(){
        $kriteria = Kriteria::with('sub_kriteria')->get();
        return view('alternatif.tambah_alternatif')->with('kriteria', $kriteria);
    }
    public function store(Request $request){
        $this->validate($request,[
            'nisn' => 'required|unique:alternatif',
            'nama' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required'
         ]);
        $data = new Alternatif;
        $data->nisn = request('nisn');
        $data->nama = request('nama');
        $data->jurusan = request('jurusan');
        $data->kelas = request('kelas');
        $data->save();
        if(isset($request->nilai)){
            foreach (request('nilai') as $key => $value) {
                $data_nilai = new NilaiAlternatif;
                $data_nilai->nisn = request('nisn');
                $data_nilai->kode_sub_kriteria = $value;
                $data_nilai->save();
            }
        }
        return redirect()->route('alternatif.index');
    }
    public function edit($id){
        $alternatif = Alternatif::with('nilai_alternatif')->where('nisn', $id)->first();
        $data = Kriteria::with('sub_kriteria')->get();
        if($data){
            return view('alternatif.edit_alternatif')->with(['data' => $data, 'alternatif' => $alternatif]);
        }
        return redirect()->route('alternatif.index');
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'nisn' => 'required',
            'nama' => 'required'
         ]);
        $data = Alternatif::where('nisn', request('nisn'))->first();
        $data->nisn = request('nisn');
        $data->nama = request('nama');
        $data->save();
        $delete =  NilaiAlternatif::where('nisn', request('nisn'))->delete();
        foreach (request('nilai') as $key => $value) {
            $data_nilai = new NilaiAlternatif;
            $data_nilai->nisn = request('nisn');
            $data_nilai->kode_sub_kriteria = $value;
            $data_nilai->save();
        }
        return redirect()->route('alternatif.index');
    }
    public function destroy($id){
        $data = Alternatif::where('nisn', $id)->first();
        if($data){
            $data->delete();
        }
        return redirect()->route('alternatif.index');
    }
}
