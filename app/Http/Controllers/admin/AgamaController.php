<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\admin\Agama;
use Illuminate\Http\Request;
use Validator;

class AgamaController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    protected $rulesCreate = [
        'agama' => ['required', 'min:2','unique:agama'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agama = Agama::paginate(10);

        return view('admin.pages.agama.indexAgama', compact('agama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/agama/createAgama');
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

        Agama::create($data);

        return redirect()->route('admin.agama.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agama = Agama::findOrFail($id);
        return view('admin.pages.agama.updateAgama',compact('agama'));
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
        $agama = agama::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'agama' => 'required|unique:agama,agama,'.$agama->id,
        ]);

        //If Rules update not reached, return back with errors
        if($validator->fails()){
            return redirect('admin/agama/edit/'.$id)->withErrors($validator)->withInput();
        }

        $agama->update($request->all());
        return redirect()->route('admin.agama.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();
        return redirect()->route('admin.agama.index');
    }
}