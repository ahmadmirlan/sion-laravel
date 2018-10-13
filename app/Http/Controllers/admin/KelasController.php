<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Kelas;
use App\admin\KelasMahasiswaRelation;
use App\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

class KelasController extends Controller
{


    public function __construct(){
        $this->middleware('admin');
    }

    protected $rulesCreate = [
        'id_dosen' => ['required'],
        'id_matakuliah' => ['required'],
        'id_ruangan' => ['required'],
        'jamKuliah' => ['required'],
        'jamSelesaiKuliah' => ['required'],
        'hariPerkuliahan' => ['required'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::paginate(20);
        return view('admin.pages.kelas.indexKelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kelas.createKelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rulesCreate);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Kelas ::create($data);
        DB::table('kelas_versi')->increment('kelas_versi');

        return redirect()->route('admin.kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);

        $mahasiswa = DB::table('kelas_mahasiswa_relation')
            ->join('mahasiswas', 'kelas_mahasiswa_relation.id_mahasiswa', '=', 'mahasiswas.id')
            ->select('mahasiswas.*','kelas_mahasiswa_relation.*')
            ->where('kelas_mahasiswa_relation.id_kelas', '=', $id)
            ->get();

        return view('admin.pages.kelas.detailKelas',compact('kelas','mahasiswa'));
    }

    public function tambahMahasiswa($id){
        $kelas = Kelas::findOrFail($id);

        return view('admin.pages.kelas.tambahMahaSiswaKelas',compact('kelas'));
    }

    public function tambahMahasiswaStore(Request $request){
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'id_kelas' => 'required',
            'id_mahasiswa' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $rfid = Mahasiswa::where(['id' => $data['id_mahasiswa']])->pluck('kode_rfid')->first();
        $data['kode_rfid'] = $rfid;

        KelasMahasiswaRelation::create($data);

        return redirect()->route('admin.kelas.view', $data['id_kelas']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('admin.pages.kelas.updateKelas',compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $dataKelas = $request->all();
        $validator = Validator::make($dataKelas, $this->rulesCreate);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $kelas->update($dataKelas);
        DB::table('kelas_versi')->increment('kelas_versi');
        return redirect()->route('admin.kelas.index');
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

        return view('admin.pages.kelas.kehadiranKelas',compact('kehadiran','pertemuan'));
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

        return redirect(route('admin.kelas.view',$id_kelas));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        DB::table('kelas_versi')->increment('kelas_versi');
        return redirect()->route('admin.kelas.index');
    }

    public function hapusMahasiswa($id_kelas, $id_mahasiswa){


        $mahasiswa = DB::table('kelas_mahasiswa_relation')
            ->where('id_kelas', '=', $id_kelas)
            ->where('id_mahasiswa', '=' , $id_mahasiswa)
            ->delete();

        return redirect()->route('admin.kelas.view', $id_kelas);
    }
}
