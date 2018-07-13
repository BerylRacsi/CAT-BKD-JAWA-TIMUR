<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;
use App\User;
use App\Ujian;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.index');
    }
    public function hasil()
    {
        $hasils = Hasil::all();
        //dd($hasils);
        return view('admin.hasil',compact('hasils'));
    }
    public function live()
    {
        $ujian = Ujian::all();

        return view('admin.live');
    }
}
