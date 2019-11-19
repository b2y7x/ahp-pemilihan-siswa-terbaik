<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class NilaiAlternatif extends Model
{
    protected $fillable = [
        'nisn', 'id', 'kode_sub_kriteria'
    ];
    protected $table = "nilai_alternatif";
    public $timestamps = false;

    public function sub_kriteria()
    {
        return $this->belongsTo('App\SubKriteria', 'kode_sub_kriteria', 'kode');
    }
    public function alternatif()
    {
        return $this->belongsTo('App\Alternatif', 'nisn', 'nisn');
    }
}
