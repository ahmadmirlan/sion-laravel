<?php

namespace App\Http\Controllers\mahasiswa;

use App\admin\Kelas;
use App\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function index()
    {

        $mahasiswa = Mahasiswa::where('id',auth('mahasiswa')->user()->id)->first();

        $kelas = DB::table('kelas_mahasiswa_relation')
            ->where('id_mahasiswa', auth('mahasiswa')->user()->id)->get();

        return view('mahasiswa.home',compact('mahasiswa','kelas'));
    }
}
