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
        //Check if user already generate question in DB
        $iduser = Auth::getUser()->id;
        $count = Ujian::where('user_id','=',$iduser)->count();

        //if question already generated, continue to start quiz
        if ($count > 0) {
            return redirect('ujian/1');
        }
        
        //Assign random question for each category
        $idtwk = Soal::select('id')->where('kategori','=','TWK')->inRandomOrder()->take(30)->get();
        $idtiu = Soal::select('id')->where('kategori','=','TIU')->inRandomOrder()->take(30)->get();
        $idtkp = Soal::select('id')->where('kategori','=','TKP')->inRandomOrder()->take(40)->get();

        $idsoal = $idtwk->merge($idtiu)->merge($idtkp);

        //change collection to array, with value separated
        $idsoal = $idsoal->implode('id',',');

        //insert into DB
        $ujian = new Ujian;
        $ujian->soal = $request->input('idsoal',$idsoal);
        $ujian->user_id = $request->input('iduser',$iduser);
        $ujian->save();

        return redirect('ujian/1');

    }

    public function show($id)
    {
        //mencegah error perubahan link
        if($id < 1 || $id > 100){
            return redirect('ujian');
        }

        //create index for array
        $id_array = $id-1;

        $iduser = Auth::getUser()->id;
        $soal_db = Ujian::select('soal')->where('user_id','=',$iduser)->get();

        //get random question number from DB
        $array_nomor_acak = explode(",", $soal_db);

        //clean array value format
        $array_nomor_acak[0] = substr($array_nomor_acak[0], 10);
        $array_nomor_acak[99] = substr($array_nomor_acak[99], 0,-3);

        $nomor_di_db = $array_nomor_acak[$id_array];

        //get question based on random
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

        return view('ujian.index');
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
