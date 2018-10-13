<?php

namespace App\Http\Controllers\dosen;

use App\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function index()
    {

        $dosen = Dosen::where('id',auth('dosen')->user()->id)->first();

        $kelas = DB::table('kelas')
            ->where('id_dosen', auth('dosen')->user()->id)->get();

        return view('dosen.home',compact('dosen','kelas'));
    }
}
