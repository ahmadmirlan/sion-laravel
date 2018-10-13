<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Jurusan;
use Validator;
use Illuminate\Http\Request;

class JurusanController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    protected $rulesCreate = [
        'jurusan' => ['required', 'min:2','unique:jurusan'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::paginate(10);

        return view('admin.pages.jurusan.indexJurusan', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/jurusan/createJurusan');
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

        Jurusan::create($data);

        return redirect()->route('admin.prodi.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.pages.jurusan.updateJurusan',compact('jurusan'));
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
        $jurusan = Jurusan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'jurusan' => 'required|unique:jurusan,jurusan,'.$jurusan->id,
        ]);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect('admin/prodi/edit/'.$id)->withErrors($validator)->withInput();
        }

        $jurusan->update($request->all());
        return redirect()->route('admin.prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('admin.prodi.index');
    }
}
