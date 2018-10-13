<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Validator;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    protected $rulesCreate = [
        'nim' => ['required','unique:mahasiswas', 'min:5'],
        'nama' => ['required', 'max:50'],
        'tanggalLahir' => ['required'],
        'jurusan_id' => ['required'],
        'agama_id' => ['required'],
        'kode_rfid' => ['required','unique:mahasiswas'],
        'email' => ['required','unique:mahasiswas'],
        'password' => ['required','min:6'],
    ];

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(20);
        return view('admin.pages.mahasiswa.indexMahasiswa', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/mahasiswa/createMahasiswa');
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

        $time = strtotime($data['tanggalLahir']);
        $newFormat = date('Y-m-d', $time);
        $data['tanggalLahir'] = $newFormat;

        Mahasiswa::create($data);

        return redirect()->route('admin.mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $timeForEdit = strtotime($mahasiswa['tanggalLahir']);
        $getFormat = date('d/m/Y', $timeForEdit);
        $mahasiswa['tanggalLahir'] = $getFormat;

        return view('admin.pages.mahasiswa.updateMahasiswa',compact('mahasiswa'));
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dataMahasiswa = $request->all();

        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mahasiswas,nim,'.$mahasiswa->id,
            'nama' => 'required|max:50',
            'tanggalLahir' => 'required',
            'jurusan_id' => 'required',
            'agama_id' => 'required',
            'kode_rfid' => 'required|unique:mahasiswas,kode_rfid,'.$mahasiswa->id,
            'email' => 'required|unique:mahasiswas,email,'.$mahasiswa->id,
        ]);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $time = strtotime($dataMahasiswa['tanggalLahir']);
        $newFormat = date('Y-m-d', $time);
        $dataMahasiswa['tanggalLahir'] = $newFormat;

        $mahasiswa->update($dataMahasiswa);

        return redirect()->route('admin.mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa.index');
    }
}
