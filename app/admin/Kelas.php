<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
      'id_dosen','id_matakuliah','id_ruangan','jamKuliah','jamSelesaiKuliah','hariPerkuliahan'
    ];
}
