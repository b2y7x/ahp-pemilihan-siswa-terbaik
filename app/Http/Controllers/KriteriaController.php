<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;

class KriteriaController extends Controller
{
    public function index(){
        $data = Kriteria::all();
        return view('kriteria.kriteria')->with('data', $data);
    }
    public function create(){
        return view('kriteria.tambah_kriteria');
    }
    public function store(Request $request){
        $this->validate($request,[
            'kode' => 'required|unique:kriteria',
            'nama' => 'required'
         ]);
        $data = new Kriteria;
        $data->kode = request('kode');
        $data->nama = request('nama');
        $data->save();
        return redirect()->route('kriteria.index');
    }
    public function edit($id){
        $data = Kriteria::where('kode', $id)->first();
        if($data){
            return view('kriteria.edit_kriteria')->with('data', $data);
        }
        return redirect()->route('kriteria.index');
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required'
         ]);
        $data = Kriteria::where('kode', $id)->first();
        if($data){
            $data->kode = request('kode');
            $data->nama = request('nama');
            $data->save();
        }
        return redirect()->route('kriteria.index');
    }
    public function destroy($id){
        $data = Kriteria::where('kode', $id)->first();
        if($data){
            $data->delete();
        }
        return redirect()->route('kriteria.index');
    }
}
