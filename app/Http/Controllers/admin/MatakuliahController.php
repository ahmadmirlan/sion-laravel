<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Matakuliah;
use Validator;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    protected $rulesCreate = [
        'mataKuliah' => ['required','unique:matakuliah', 'max:50'],
        'bebanSks' => ['required'],
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
        $matakuliah = Matakuliah::paginate(10);

        return view('admin.pages.matakuliah.indexMatakuliah',compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.matakuliah.createMatakuliah');
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

        Matakuliah::create($data);

        return redirect()->route('admin.matakuliah.index');
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
        $matakuliah = Matakuliah::findOrFail($id);

        return view('admin.pages.matakuliah.updateMatakuliah',compact('matakuliah'));
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
        $matakuliah = Matakuliah::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'mataKuliah' => 'required|unique:matakuliah,mataKuliah,'.$matakuliah->id,
            'bebanSks' => 'required',
        ]);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $matakuliah->update($request->all());

        return redirect()->route('admin.matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('admin.matakuliah.index');
    }
}
