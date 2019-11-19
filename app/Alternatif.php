<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Alternatif extends Model
{
    protected $fillable = [
        'nisn', 'nama'
    ];
    protected $table = "alternatif";
    protected $primaryKey = 'nisn';
    public $incrementing = false;
    public function nilai_alternatif()
    {
        return $this->hasMany('App\NilaiAlternatif', 'nisn', 'nisn');
    }
}
