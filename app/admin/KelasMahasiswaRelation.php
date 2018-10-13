<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class KelasMahasiswaRelation extends Model
{
    protected $table = 'kelas_mahasiswa_relation';

    protected $fillable = [
        'id_kelas','id_mahasiswa','kode_rfid','P1','P2','P3','P4','P5','P6','P7','P8','P9','P10','P11','P12','P13','P14'
    ];

    /*public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class, 'id_mahasiswa');
    }

    public function kelas(){
        return $this->hasOne(Agama::class, 'id_kelas');
    }*/
}
