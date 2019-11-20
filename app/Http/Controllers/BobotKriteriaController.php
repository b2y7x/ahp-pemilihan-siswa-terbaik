<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;
use App\BobotKriteria;

class BobotKriteriaController extends Controller
{
    public function index(){
        $data = $this->bobot_kriteria();
        return view('bobot_kriteria.nilai_bobot_kriteria')
        ->with($data);
    }
    protected function bobot_kriteria(){
        $id = Kriteria::pluck('kode');
        $bobot = BobotKriteria::get();
        $data = $this->perhitungan($id, $bobot);
        return $data;
    }
    public function perhitungan($id, $bobot){
        $m_1 = [];
        $jum_m_1 = [];
        $val = null;
        $jum = [];
        $m_1_null = false;
        $hasil = null;

        //matrix 2 MATRIK NILAI KRITERIA PROBLEM SOLVING
        $m_2 = [];
        $jum_m_2 = [];
        $bobot_m_2 = [];
        $jum_bobot_m_2 = 0;

        //matrix 3 MATRIK PENJUMLAHAN
        $m_3 = [];
        $jum_m_3 = [];

        //matrix 4 PERHITUNGAN PROBLEM SOLVING
        $m_4 = [];
        $hasil_m_4 = [];
        $jum_m_4 = 0;
        $total_m_4 = 0;

        //matrix 1 MATRIK PERBANDINGAN BERPASANGAN
        $m_1_temp = $this->matrixLangkah1($id,$bobot);
        $m_1 = $m_1_temp['m_perbandingan'];
        $jum_m_1 = $m_1_temp['jum_m_perbandingan'];

        //Cek apakah semua matrix terisi
        foreach ($m_1 as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if($value2 == null){
                    $m_1_null = true;
                }
            }
        }
        if($bobot->isEmpty() || count($id) <= 2){
            $m_1_null = true;
        }
        if($m_1_null == false && !$bobot->isEmpty()){
            //Pembuatan matrix 2 nilai kriteria
            $m_2_temp = $this->matrixLangkah2($m_1, $jum_m_1);
            $m_2 = $m_2_temp['m_2'];
            $jum_m_2 = $m_2_temp['jum_m_2'];
            $bobot_m_2 = $m_2_temp['bobot_m_2'];
            $jum_bobot_m_2 = $m_2_temp['jum_bobot_m_2'];

            //Pembuatan matrix 3 penjumlahan
            $m_3_temp = $this->matrixLangkah3($bobot_m_2, $m_1);
            $m_3 = $m_3_temp['m_3'];
            $jum_m_3 = $m_3_temp['jum_m_3'];

            //Pembuatan matrix 4
            $m_4_temp = $this->matrixLangkah4($bobot_m_2, $m_4, $jum_m_3);
            $m_4 = $m_4_temp['m_4'];
            $hasil_m_4 = $m_4_temp['hasil_m_4'];
            $total_m_4 = $m_4_temp['total_m_4'];

            //Pembuatan matrix 5 Kesimpulan
            $hasil = $this->matrixLangkah5($hasil_m_4, $jum_m_4, $id);
        }
        $response = [
                    'm_1' => $m_1, 
                    'jum_m_1' => $jum_m_1, 
                    'm_1_null' => $m_1_null,
                    'm_2' => $m_2,
                    'jum_m_2' => $jum_m_2,
                    'bobot_m_2' => $bobot_m_2,
                    'm_3' => $m_3,
                    'jum_m_3' => $jum_m_3,
                    'm_4' => $m_4,
                    'hasil_m_4' => $hasil_m_4,
                    'jum_m_4' => $jum_m_4,
                    'total_m_4' => $total_m_4,
                    'hasil' => $hasil
        ];
        return $response;
    }
    public function create(){
        return view('kriteria.tambah_kriteria');
    }
    public function store(Request $request){
        $this->validate($request,[
            'kode_kriteria_1' => 'required|exists:kriteria,kode',
            'kode_kriteria_2' => 'required|exists:kriteria,kode',
            'nilai' => 'required',
         ]);
        $data = BobotKriteria::updateOrCreate(
            ['kode_kriteria_1' => request('kode_kriteria_1'), 'kode_kriteria_2' => request('kode_kriteria_2')],
            ['nilai' => request('nilai')]
        );
        $data = BobotKriteria::updateOrCreate(
            ['kode_kriteria_1' => request('kode_kriteria_2'), 'kode_kriteria_2' => request('kode_kriteria_1')],
            ['nilai' => 1/request('nilai')]
        );
        return redirect()->route('bobot_kriteria.index');
    }
    public function edit($id){
        $data = explode(',', $id);
        if($data[0] || $data[1]){
            return view('bobot_kriteria.ubah_bobot_kriteria')->with('data', $data);
        }
        return redirect()->route('bobot_kriteria.index');
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
    public function matrikSkala($n){
        $m_skala = [];
        $m_skala[1] = 0;
        $m_skala[2] = 0;
        $m_skala[3] = 0.58;
        $m_skala[4] = 0.9;
        $m_skala[5] = 1.12;
        $m_skala[6] = 1.24;
        $m_skala[7] = 1.32;
        $m_skala[8] = 1.41;
        $m_skala[9] = 1.46;
        $m_skala[10] = 1.49;
        $m_skala[11] = 1.51;
        $m_skala[12] = 1.48;
        $m_skala[13] = 1.56;
        $m_skala[14] = 1.57;
        $m_skala[15] = 1.59;
        return $m_skala[$n];
    }
    public function matrixLangkah1($id,$bobot){
        $m_1 = [];
        $jum_m_1 = [];
        foreach ($id as $aaa) {
            foreach ($id as $bbb) {
                $K1 = $aaa;
                $K2 = $bbb;
                if($K1 == $K2){
                    $val = 1;
                }
                foreach ($bobot as $key => $bob) {
                    if($K1 == (isset($bob->kode_kriteria_1) ? $bob->kode_kriteria_1 : $bob->kode_sub_kriteria_1) && $K2 == (isset($bob->kode_kriteria_2) ? $bob->kode_kriteria_2 : $bob->kode_sub_kriteria_2))
                    {
                        $val = $bob->nilai;
                    }
                }
                $m_1[$K1][$K2]=$val;
                $jum[$K2][$K1]=$val;
                $val = null;
                
            }
        }
        foreach ($id as $jjj) {
            $jumlah[$jjj]=array_sum($jum[$jjj]);
            $jum_m_1[$jjj] = $jumlah[$jjj];
        }
        return ['m_perbandingan' => $m_1, 'jum_m_perbandingan' => $jum_m_1];
    }
    public function matrixLangkah2($m_1,$jum_m_1){
        foreach ($m_1 as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $m_2[$key][$key2] = $value2 / $jum_m_1[$key2];
            }
            $jum_m_2[$key] = array_sum($m_2[$key]);
            $bobot_m_2[$key] = array_sum($m_2[$key])/count($m_2[$key]);
        }
        $jum_bobot_m_2 = array_sum($bobot_m_2);
        return ['m_2' => $m_2, 'jum_m_2' => $jum_m_2, 'bobot_m_2' => $bobot_m_2, 'jum_bobot_m_2' => $jum_bobot_m_2];
    }
    public function matrixLangkah3($bobot_m_2,$m_1){
        foreach ($bobot_m_2 as $key => $value) {
            foreach ($m_1[$key] as $key2 => $value2) {
                $m_3[$key][$key2] = max($bobot_m_2) * $value2;
            }
            $jum_m_3[$key] = array_sum($m_3[$key]);
        }
        return ['m_3' => $m_3, 'jum_m_3' => $jum_m_3];
    }
    public function matrixLangkah4($bobot_m_2, $m_4, $jum_m_3){
        for ($x = 0; $x < 2; $x++) {
            foreach ($bobot_m_2 as $key => $value) {
                if($x == 0){
                    $m_4[$key]['bobot'] = $value;
                }else{
                    $m_4[$key]['jumlah'] = $jum_m_3[$key];
                }
            }
        }
        foreach ($m_4 as $key => $value) {
            $hasil_m_4[$key] = array_sum($m_4[$key]);
        }
        $total = array_sum($hasil_m_4);
        return ['m_4' => $m_4, 'hasil_m_4' => $hasil_m_4, 'total_m_4' => $total];
    }
    public function matrixLangkah5($hasil_m_4, $jum_m_4, $id){
        $jum_m_4 = array_sum($hasil_m_4);
        $lamda = $jum_m_4;
        $n = count($id);
        $maks = ($lamda-$n)/$n;
        $ci = ($maks-$n)/$n;
        $cr = $ci/$this->matrikSkala($n);
        if($cr <= 0.1 ){
            $konsisten = 'Konsisten';
        }else{
            $konsisten = 'Tidak Konsisten';
        }
        $hasil = ['lamda' => $lamda, 'n' => $n, 'maks' =>$maks, 'ci' =>$ci, 'cr' =>$cr, 'konsisten' => $konsisten];
        return $hasil;
    }
}
