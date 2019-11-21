<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NilaiAlternatif;
use App\Alternatif;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HasilExport;

class HasilController extends BobotSubKriteriaController
{
    public function hasil($jurusan, $kelas){
        $data = $this->hitungHasil($jurusan, $kelas);
        return view('perhitungan.hasil')
        ->with($data);
    }
    public function kelas($jurusan){
        return view('perhitungan.kelas')->with(['jurusan' => $jurusan]);
    }
    public function hitungHasil($jurusan, $kelas){
        $alternatif = Alternatif::with('nilai_alternatif.sub_kriteria')->where('jurusan', $jurusan)->where('kelas', $kelas)->get();
        $bobot_kriteria = $this->bobot_kriteria();
        $bobot_sub_kriteria = null;
        $temp = null;
        $m_1 = [];
        $m_2 = [];
        $m_0 = [];
        $nilai_alternatif = [];
        $nilai_alternatif_2 = [];
        $perangkingan = [];
        $perangkingan_temp = [];
        $m_1['kriteria'] = $bobot_kriteria['bobot_m_2'];
        foreach ($m_1['kriteria'] as $key => $value) {
            $bobot_sub_kriteria = $this->bobot_sub_kriteria($key);
            $x = 0;
            foreach ($bobot_sub_kriteria['bobot_m_2'] as $key2 => $value2) {
                $m_1['sub_kriteria'][$x][$key2]= $value2;
                $m_2[$key][$key2]= $value2;
                $m_0[$key2] = $value2;
                $x = $x + 1;
            }
        }
        foreach ($alternatif as $key => $value) {
            $i = 0;
            foreach ($value->nilai_alternatif as $key2 => $value2) {
                if ($i == 0) {
                    $nilai_alternatif[$key]['nisn'] = $value->nisn;
                }
                $nilai_alternatif[$key]['nilai'][$value2->sub_kriteria->kode_kriteria][$value2->kode_sub_kriteria] = $m_0[$value2->kode_sub_kriteria];
                $i++;
            }
        }
        $nilai_alternatif_2 = $nilai_alternatif;
        foreach ($nilai_alternatif as $key => $value) {
            $total = 0;
            foreach ($value['nilai'] as $key2 => $value2) {
                $perkalian = 0;
                foreach ($value2 as $key3 => $value3) {
                    $perkalian = $value3 * $m_1['kriteria'][$key2];
                    $nilai_alternatif_2[$key]['nilai'][$key2][$key3] = $perkalian;
                    $total = $total+$perkalian;
                }
            }
            $nilai_alternatif_2[$key]['hasil'] = $total;
            $perangkingan_temp[$key] = $total;
        }
        $perangkingan = $nilai_alternatif_2;
        array_multisort($perangkingan_temp, SORT_DESC, $perangkingan);
        $n = 1;
        foreach ($perangkingan as $key => $value) {
            $perangkingan[$key]['rangking'] = $n;
            $n++;
        }
        return ['nilai_sub_kriteria' => $m_0,
                'hasil_1' => $m_1,
                'hasil_2' => $m_2,
                'nilai_alternatif' => $nilai_alternatif,
                'perangkingan' => $perangkingan];
    }
    public function cetak($jurusan, $kelas){
        $data = $this->hasil($jurusan, $kelas);
        $perangkingan = $data['perangkingan'];
        $hasil_1 = $data['hasil_1'];
        return (new HasilExport ($perangkingan, $hasil_1))->download('hasil-perangkingan.xlsx');
    }
}
