<?php

namespace App\Http\Controllers\mahasiswa;

use App\admin\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function __construct(){
        $this->middleware('mahasiswa');
    }

    public function detail($id)
    {
        $status = DB::table('kelas_mahasiswa_relation')
            ->where('id_kelas','=',$id)
            ->where('id_mahasiswa', '=',  Auth::guard('mahasiswa')->id())
            ->pluck('id_mahasiswa')->first();

        if($status == ""){
           return "<center><h1>Not Found</h1></center>";
        }

        $mahasiswa = DB::table('kelas_mahasiswa_relation')
            ->join('mahasiswas', 'kelas_mahasiswa_relation.id_mahasiswa', '=', 'mahasiswas.id')
            ->select('mahasiswas.nama','mahasiswas.nim')
            ->where('kelas_mahasiswa_relation.id_kelas', '=', $id)
            ->get();

        $kelas = Kelas::where('id',$id)->first();
        
        return view('mahasiswa.pages.kelas.detailkelas', compact('mahasiswa','kelas'));
    }

    public function kehadiran(){

        $kehadiran = DB::table('kelas_mahasiswa_relation')
            ->join('kelas', 'kelas_mahasiswa_relation.id_kelas', '=', 'kelas.id')
            ->where('kelas_mahasiswa_relation.id_mahasiswa', '=', Auth::guard('mahasiswa')->id())
            ->select('kelas_mahasiswa_relation.*','kelas.id_matakuliah')
            ->get();

        return view('mahasiswa.pages.kehadiran.kehadiran', compact('kehadiran'));

    }
}
