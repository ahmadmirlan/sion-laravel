<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table  = 'matakuliah';

    protected $fillable = [
      'mataKuliah', 'bebanSks'
    ];
}
