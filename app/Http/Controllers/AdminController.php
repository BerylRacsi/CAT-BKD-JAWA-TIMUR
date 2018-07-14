<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hasil;
use App\User;
use App\Ujian;
use App\Soal;

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
        $users = User::count();
        $soals = Soal::count();
        $hasils = Hasil::count();
        $ujians = Ujian::count();

        return view('admin.index',compact('users', 'soals', 'hasils', 'ujians'));
    }
    public function hasil()
    {
        $hasils = Hasil::all();

        return view('admin.hasil',compact('hasils'));
    }
    public function live()
    {
        $ujians = Ujian::all();

        return view('admin.live',compact('ujians'));
    }
}
