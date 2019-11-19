<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Kriteria extends Model
{
    protected $fillable = [
        'kode', 'nama'
    ];
    protected $table = "kriteria";
    protected $primaryKey = 'kode';
    public $incrementing = false;
    public function sub_kriteria()
    {
        return $this->hasMany('App\SubKriteria', 'kode_kriteria', 'kode');
    }
    public function bobot_kriteria()
    {
        return $this->hasMany('App\BobotKriteria', 'kode_kriteria_1', 'kode');
    }
}
