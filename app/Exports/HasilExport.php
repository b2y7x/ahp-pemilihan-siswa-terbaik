<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class HasilExport implements FromView
{
    use Exportable;
    public function __construct($perangkingan, $hasil_1)
    {
        $this->perangkingan = $perangkingan;
        $this->hasil_1 = $hasil_1;
    }
    
    public function view(): View
    {
        return view('perhitungan.cetak_hasil', [
            'hasil_1' => $this->hasil_1,'perangkingan' => $this->perangkingan
        ]);
    }
}