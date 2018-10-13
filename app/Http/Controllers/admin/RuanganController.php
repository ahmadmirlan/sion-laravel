<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Ruangan;
use Validator;
use Illuminate\Http\Request;

class RuanganController extends Controller
{

    public function __construct(){
        //$this->middleware('auth');
    }

    protected $rulesCreate = [
        'ruangan' => ['required', 'min:2','unique:ruangan'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::paginate(10);

        return view('admin.pages.ruangan.indexRuangan', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/ruangan/createRuangan');
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

        Ruangan::create($data);

        return redirect()->route('admin.ruangan.index');
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
        $ruangan = Ruangan::findOrFail($id);
        return view('admin.pages.ruangan.updateRuangan',compact('ruangan'));
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
        $ruangan = Ruangan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'ruangan' => 'required|unique:ruangan,ruangan,'.$ruangan->id,
        ]);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect('admin/ruangan/edit/'.$id)->withErrors($validator)->withInput();
        }

        $ruangan->update($request->all());
        return redirect()->route('admin.ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect()->route('admin.ruangan.index');
    }
}
