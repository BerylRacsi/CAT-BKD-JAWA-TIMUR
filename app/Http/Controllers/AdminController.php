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

        // $jawaban_user = explode(',',$ujian->jawaban);
        // $kunci = explode(',',$ujian->kunci);

        // $tiu=0;
        // $twk=0;
        // $tkp=0;

        // for ($i = 0; $i < 100 ; $i++) { 
        //     if ($i < 30) {
        //       if ($jawaban_user[$i] == $kunci[$i]){
        //           $twk+=5;
        //       } 
        //     }
        //     else if ($i > 29 && $i < 65) {
        //       if ($jawaban_user[$i] == $kunci[$i]){
        //           $tiu+=5;
        //       }
        //     }
        //     else if ($i > 64 && $i < 100) {

        //       $kunci_tkp = $kunci[$i];
        //       for ($j = 0; $j < 5; $j++)
        //       {
        //           if($jawaban_user[$i] == $kunci_tkp[$j])
        //           {
        //               $tkp+=($j+1);
        //           }
        //       }    
        //     }
          
        // }

        // return view('admin.live',compact('ujian','tiu','twk','tkp'));
        return view('admin.live');
    }
}
