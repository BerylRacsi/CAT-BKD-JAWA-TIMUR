<?php

namespace App\Http\Controllers;

use App\Ujian;
use App\User;
use App\Soal;
use Auth;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function start(Request $request)
    {
        //Check if user already take quiz in DB
        $iduser = Auth::getUser()->id;

        $count = Ujian::where('user_id','=',$iduser)->count();

        //if id count > 0, continue. Do not random
        if ($count > 0) {
            return redirect('ujian');
        }
        //Assign random question for each category

        $idtwk = Soal::select('id')->where('kategori','=','TWK')->inRandomOrder()->take(30)->get();
        $idtiu = Soal::select('id')->where('kategori','=','TIU')->inRandomOrder()->take(30)->get();
        $idtkp = Soal::select('id')->where('kategori','=','TKP')->inRandomOrder()->take(30)->get();
        
        $idsoal = $idtwk->merge($idtiu)->merge($idtkp);

        $idsoal = $idsoal->implode('id',',');

        $ujian = new Ujian;
        $ujian->soal = $request->input('idsoal',$idsoal);
        $ujian->user_id = $request->input('iduser',$iduser);
        $ujian->save();

        return view('ujian.start',compact('idsoal'));

    }

    public function show($id)
    {
        //agar bisa ambil soal index 0
        $id_array = $id-1;

        $iduser = Auth::getUser()->id;
        $soal_db = Ujian::select('soal')->where('user_id','=',$iduser)->get();
        $array_nomor_acak = explode(",", $soal_db);

        $array_nomor_acak[0] = substr($array_nomor_acak[0], 10);
        $array_nomor_acak[89] = substr($array_nomor_acak[89], 0,-3);

        $nomor_di_db = $array_nomor_acak[$id_array];

        $soals = Soal::find($nomor_di_db);

        $previous = $id-1;
        $next = $id+1;

        return view('ujian.tes')->with('soals',$soals)->with('previous',$previous)->with('next',$next)->with('no',$id);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
//        $soals = Soal::all();
//        $soals->id = 1;
        return view('ujian.index',compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
