<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\SubKriteria;
use App\BobotSubKriteria;

class BobotSubKriteriaController extends BobotKriteriaController
{
    public function show($id_kriteria){
        $data = $this->bobot_sub_kriteria($id_kriteria);
        return view('bobot_sub_kriteria.nilai_bobot_sub_kriteria')->with($data);
    }
    protected function bobot_sub_kriteria($id_kriteria){
        $kriteria = Kriteria::get();
        $kriteria_terpilih = $kriteria->where('kode', $id_kriteria)->first();
        $sub_kriteria = SubKriteria::where('kode_kriteria', $id_kriteria)->get();
        $id = $sub_kriteria->pluck('kode');
        $id_sub_kriteria = SubKriteria::where('kode_kriteria', $id_kriteria)->pluck('kode');
        $bobot = BobotSubKriteria::wherein('kode_sub_kriteria_1', $id_sub_kriteria)->orwherein('kode_sub_kriteria_2', $id_sub_kriteria)->get();
        $data1 = $this->perhitungan($id, $bobot);
        $data2 = ['kriteria' => $kriteria, 'kriteria_terpilih' => $kriteria_terpilih];
        $response = array_merge($data1, $data2);
        return $response;
    }
    public function index(){
        $kriteria = Kriteria::get();
        return view('bobot_sub_kriteria.menu')
        ->with(
            [
                'kriteria' => $kriteria
            ]);
    }
    public function create(){
        return view('kriteria.tambah_kriteria');
    }
    public function store(Request $request){
        $this->validate($request,[
            'kode_sub_kriteria_1' => 'required|exists:sub_kriteria,kode',
            'kode_sub_kriteria_2' => 'required|exists:sub_kriteria,kode',
            'nilai' => 'required',
         ]);
        $data = BobotSubKriteria::where('kode_sub_kriteria_1', request('kode_sub_kriteria_1'))->where('kode_sub_kriteria_2', request('kode_sub_kriteria_2'))->first();
        if(!$data){
            $data = new BobotSubKriteria;
        }
        $data->kode_sub_kriteria_1 = request('kode_sub_kriteria_1');
        $data->kode_sub_kriteria_2 = request('kode_sub_kriteria_2');
        $data->nilai = request('nilai');
        $data->save();
        $data2 = BobotSubKriteria::where('kode_sub_kriteria_1', request('kode_sub_kriteria_2'))->where('kode_sub_kriteria_2', request('kode_sub_kriteria_1'))->first();
        if(!$data2){
            $data2 = new BobotSubKriteria;
        }
        $data2->kode_sub_kriteria_1 = request('kode_sub_kriteria_2');
        $data2->kode_sub_kriteria_2 = request('kode_sub_kriteria_1');
        $data2->nilai = 1/request('nilai');
        $data2->save();
        $kriteria = SubKriteria::where('kode', request('kode_sub_kriteria_1'))->select('kode_kriteria')->first();
        return redirect('/bobot_sub_kriteria/'.$kriteria->kode_kriteria);
    }
    public function edit($id){
        $data = explode(',', $id);
        if($data[0] && $data[1] && $data[2]){
            return view('bobot_sub_kriteria.ubah_bobot_sub_kriteria')->with('data', $data);
        }
        return redirect()->route('bobot_sub_kriteria.index');
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
