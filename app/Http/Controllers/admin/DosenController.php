<?php

namespace App\Http\Controllers\admin;

use App\Dosen;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    protected $rulesCreate = [
        'nip' => ['required','unique:dosens', 'min:5'],
        'email' => ['required','unique:dosens', 'min:5'],
        'password' => ['required', 'min:5'],
        'nama' => ['required', 'max:50'],
        'tanggalLahir' => ['required'],
        'agama_id' => ['required'],
        'rfid' => ['required','unique:dosens', 'min:2'],
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
        $dosen = Dosen::paginate(20);
        return view('admin.pages.dosen.indexDosen', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/dosen/createDosen');
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

        Dosen::create($data);

        return redirect()->route('admin.dosen.index');
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
        $dosen = Dosen::findOrFail($id);

        $timeForEdit = strtotime($dosen['tanggalLahir']);
        $getFormat = date('d/m/Y', $timeForEdit);
        $dosen['tanggalLahir'] = $getFormat;

        return view('admin.pages.dosen.updateDosen',compact('dosen'));
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
        $dosen = Dosen::findOrFail($id);
        $dataDosen = $request->all();

        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:dosens,nip,'.$dosen->id,
            'email' => 'required|unique:dosens,email,'.$dosen->id,
            'nama' => 'required|max:50',
            'tanggalLahir' => 'required',
            'agama_id' => 'required',
            'rfid' => 'required|unique:dosens,rfid,'.$dosen->id,
        ]);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $time = strtotime($dataDosen['tanggalLahir']);
        $newFormat = date('Y-m-d', $time);
        $dataDosen['tanggalLahir'] = $newFormat;

        $dosen->update($dataDosen);

        return redirect()->route('admin.dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('admin.dosen.index');
    }
}