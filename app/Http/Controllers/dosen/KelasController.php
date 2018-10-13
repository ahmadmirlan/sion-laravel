<?php

namespace App\Http\Controllers\dosen;

use App\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function __construct(){
        $this->middleware('dosen');
    }

    public function index()
    {

        $kelas = \App\admin\Kelas::where('id_dosen',Auth::guard('dosen')->id())->get();

        return view('dosen.pages.kelas.kelasindex', compact('kelas'));
    }

    public function detail($id)
    {
        $kelas = Kelas::findOrFail($id);

        if($kelas->id_dosen != Auth::guard('dosen')->id()){
            return '5000';
        }
        $mahasiswa = DB::table('kelas_mahasiswa_relation')
            ->join('mahasiswas', 'kelas_mahasiswa_relation.id_mahasiswa', '=', 'mahasiswas.id')
            ->select('mahasiswas.*','kelas_mahasiswa_relation.*')
            ->where('kelas_mahasiswa_relation.id_kelas', '=', $id)
            ->get();

        return view('dosen.pages.kelas.detailkelas',compact('kelas','mahasiswa'));
    }

    public function kehadiran(){

        $kehadiran = DB::table('kelas_mahasiswa_relation')
            ->join('kelas', 'kelas_mahasiswa_relation.id_kelas', '=', 'kelas.id')
            ->where('kelas_mahasiswa_relation.id_mahasiswa', '=', Auth::guard('dosen')->id())
            ->select('kelas_mahasiswa_relation.*','kelas.id_matakuliah')
            ->get();

        return view('mahasiswa.pages.kehadiran.kehadiran', compact('kehadiran'));

    }

    public function editKehadiran(Request $request)
    {
        $data = $request->all();


        $kehadiran = DB::table('kelas_mahasiswa_relation')
            ->leftJoin('mahasiswas', 'kelas_mahasiswa_relation.id_mahasiswa', '=', 'mahasiswas.id')
            ->leftjoin('kelas','kelas_mahasiswa_relation.id_kelas', '=', 'kelas.id')
            ->select('mahasiswas.nama','mahasiswas.nim','kelas_mahasiswa_relation.id_kelas'
                ,'kelas_mahasiswa_relation.id_mahasiswa','kelas_mahasiswa_relation.'.$data['pertemuan'].' AS pertemuan','kelas.*')
            ->where('id_kelas','=', $data['id_kelas'])
            ->get();

        $pertemuan = $data['pertemuan'];

        return view('dosen.pages.kelas.kehadiranKelas',compact('kehadiran','pertemuan'));
    }

    public function updateKehadiran(Request $request, $id_kelas, $id_pertemuan){
        $data = $request->all();
        $dataSize = count($data);
        $dataSize /= 2 ;
        $dataSize -= 1;


        for($i=0; $i<$dataSize; $i++)
        {
            DB::table('kelas_mahasiswa_relation')
                ->where('id_kelas',$id_kelas)
                ->where('id_mahasiswa', $data['id_mahasiswa'.$i])
                ->update([$id_pertemuan => $data['P'.$i]]);
        }

        $kelas = Kelas::findOrFail($id_kelas);


        $mahasiswa = DB::table('kelas_mahasiswa_relation')
            ->join('mahasiswas', 'kelas_mahasiswa_relation.id_mahasiswa', '=', 'mahasiswas.id')
            ->select('mahasiswas.*','kelas_mahasiswa_relation.*')
            ->where('kelas_mahasiswa_relation.id_kelas', '=', $id_kelas)
            ->get();
        return redirect(route('dosen.kelas.detail', $id_kelas));
    }
}
