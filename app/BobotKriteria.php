<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class BobotKriteria extends Model
{
    protected $fillable = [
        'kode_kriteria_1', 'kondisi', 'nilai', 'kode_kriteria_2'
    ];
    protected $table = "bobot_kriteria";
    public $timestamps = false;
    public function sub_kriteria()
    {
        return $this->hasMany('App\SubKriteria', 'kode_kriteria', 'kode');
    }
}
