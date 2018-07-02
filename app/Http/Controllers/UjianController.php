<?php

namespace App\Http\Controllers;

use App\User;
use App\Soal;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soals = Soal::find($id);
        //$soals = Soal::inRandomOrder()->limit(10)->get();
        $previous = Soal::where('id','<',$soals->id)->max('id');
        $next = Soal::where('id','>',$soals->id)->min('id');
        //return view('ujian.tes',compact('soals'),compact('previous'),compact('next'));
        return view('ujian.tes')->with('soals',$soals)->with('previous', $previous)->with('next', $next);
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
