<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class BobotSubKriteria extends Model
{
    protected $fillable = [
        'kode_sub_kriteria_1', 'nilai', 'kode_sub_kriteria_2'
    ];
    protected $table = "bobot_sub_kriteria";
    public $timestamps = false;
}
