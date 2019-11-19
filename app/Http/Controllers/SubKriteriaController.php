<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\SubKriteria;

class SubKriteriaController extends Controller
{
    public function show($id){
        $data = Kriteria::with('sub_kriteria')->where('kode', $id)->first();
        return view('sub_kriteria.sub_kriteria')->with('data', $data);
    }
    public function create($id){
        $data = Kriteria::where('kode', $id)->first();
        if($data){
            return view('sub_kriteria.tambah_sub_kriteria')->with('data', $data);
        }
        return redirect()->route('kriteria.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'kode' => 'required|unique:sub_kriteria',
            'kode_kriteria' => 'required|exists:kriteria,kode',
            'nama' => 'required',
            'parameter' => 'required'
         ]);
        $data = new SubKriteria;
        $data->kode_kriteria = request('kode_kriteria');
        $data->kode = request('kode');
        $data->nama = request('nama');
        $data->parameter = request('parameter');
        $data->save();
        return redirect('/sub_kriteria/'.request('kode_kriteria'));
    }
    public function edit($id){
        $data = SubKriteria::where('kode', $id)->first();
        if($data){
            return view('sub_kriteria.edit_sub_kriteria')->with('data', $data);
        }
        return redirect()->route('sub_kriteria.index');
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'kode' => 'unique:sub_kriteria,kode,'. $id.',kode',
            'nama' => 'required',
            'parameter' => 'required',
         ]);
        $data = SubKriteria::where('kode', $id)->first();
        if($data){
            $data->kode = request('kode');
            $data->nama = request('nama');
            $data->parameter = request('parameter');
            $data->save();
        }
        return redirect('/sub_kriteria/'.$data->kode_kriteria);
    }
    public function destroy($id){
        $data = SubKriteria::where('kode', $id)->first();
        if($data){
            $data->delete();
        }
        return redirect('/sub_kriteria/'.$data->kode_kriteria);
    }
}
