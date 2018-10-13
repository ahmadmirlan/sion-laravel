<?php

namespace App\Http\Controllers;

use App\admin\Matakuliah;
use App\Dosen;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiAbsensiController extends Controller
{
    public function iot($request) {
        return "<h1>{{$request}}</h1>";
    }
    public function updateKehadiran($request){
        $data = json_decode($request, true);
        $dataMahasiswa = $data['mahasiswa'];

        $dataSize = count($dataMahasiswa);

        for ($i=0; $i<$dataSize; $i++)
        {
            DB::table('kelas_mahasiswa_relation')
                ->where('id_kelas',$data['kodeKelas'])
                ->where('kode_rfid', $data['mahasiswa'][$i])
                ->update(['P'.$data['kodePertemuan'] => 'H']);
        }
        return 'Success';
    }

    public function monoAbsensi($request) {
        $data = json_decode($request, true);

        $status = DB::table('kelas_mahasiswa_relation')
            ->where('id_kelas',$data['kodeKelas'])
            ->where('kode_rfid', $data['mahasiswa'])
            ->pluck('kode_rfid')->first();

        if($status == ""){
            return "Kartu Di Tolak";
        }

        DB::table('kelas_mahasiswa_relation')
            ->where('id_kelas',$data['kodeKelas'])
            ->where('kode_rfid', $data['mahasiswa'])
            ->update(['P'.$data['kodePertemuan'] => 'H']);

        return 'Selamat Belajar';
    }

    function cekKelas($request) {
        $status = DB::table('kelas_mahasiswa_relation')
            ->where('id_kelas',$request)
            ->pluck('id_kelas')->first();

        if($status == ""){
            return "false";
        }
        return "true";
    }

    public function getSingleCLassRoom($request) {
        $dosen = Dosen::where('rfid','=', $request)->get()->first();

        if($dosen == null) {
            return "Not Found";
        }

        $kelas = Kelas::where('id_dosen','=',$dosen->id)
            ->where('hariPerkuliahan','=',date('l'))->get();

        date_default_timezone_set('Asia/Singapore');
        $time = date('H:i:s');

        $dataKelas = "";
        $dataKelas["nama"] = $dosen->nama;

        foreach ($kelas as $kls) {
            if($time > $kls->jamKuliah && $time < $kls->jamSelesaiKuliah) {
                $dataKelas["matakuliah"] = Matakuliah::where('id', '=',
                    $kls->id_matakuliah)->pluck('matakuliah')->first();
                $dataKelas["kodeKelas"] = $kls->id;
                return $dataKelas;
            }
        }
        return "Not Found";
    }

    public function getAllClassRoom() {
        $count = 0;
        $dataKelas = [];
        $kelas = Kelas::all();

        foreach ($kelas as $kls) {
            $dosen = Dosen::where('id','=', $kls->id_dosen)->first();
            $dataKelas["kelas"][$count]['rfid'] = $dosen->rfid;
            $dataKelas["kelas"][$count]['kodeKelas'] = $kls->id;
            $dataKelas["kelas"][$count]['jamKuliah'] = $kls->jamKuliah;
            $dataKelas["kelas"][$count]['jamSelesaiKuliah'] = $kls->jamSelesaiKuliah;
            $dataKelas["kelas"][$count]['hariPerkuliahan'] = $kls->hariPerkuliahan;
            $dataKelas["kelas"][$count]['mataKuliah'] =
                Matakuliah::where('id','=',$kls->id_matakuliah)->pluck('mataKuliah')->first();
            $count++;
        }
        return $dataKelas;
    }

    public function getClassVersion() {
        $version = DB::table('kelas_versi')->pluck('kelas_versi')->first();

        return $version;
    }
}