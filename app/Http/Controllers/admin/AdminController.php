<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    protected $rulesCreate = [
        'email' => ['required','unique:admins', 'min:5'],
        'password' => ['required', 'min:5'],
        'name' => ['required', 'max:50'],
    ];

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $admins = Admin::paginate(10);

        return view('admin.pages.admin.indexAdmin', compact('admins'));
    }

    public function create()
    {
        return view('admin/pages/admin/createAdmin');
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

        Admin::create($data);

        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.user.index');
    }
}
