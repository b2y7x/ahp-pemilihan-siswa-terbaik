<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class SubKriteria extends Model
{
    protected $fillable = [
        'kode', 'nama'
    ];
    protected $table = "sub_kriteria";
    protected $primaryKey = 'kode';
    public $incrementing = false;
    public $timestamps = false;
    public function kriteria()
    {
        return $this->belongsTo('App\Kriteria', 'kode_kriteria', 'kode');
    }
}
