<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soals = Soal::all();
        //return view('admin.index')->with('soals',$soals);
        return view('admin.soal.index',compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.soal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $soal = new Soal;
        $soal->deskripsi = $request->input('deskripsi');
        $soal->kategori = $request->input('kategori');
        $soal->opsi1 = $request->input('opsi1');
        $soal->opsi2 = $request->input('opsi2');
        $soal->opsi3 = $request->input('opsi3');
        $soal->opsi4 = $request->input('opsi4');
        $soal->jawaban = $request->input('jawaban');
        $soal->image = $request->input('image');
        $soal->save();

        return redirect('/admin/soal');
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
        $soal = Soal::find($id);
        return view('admin.soal.edit',compact('soal'));
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
        $soal = Soal::find($id);
        $soal->deskripsi = $request->input('deskripsi');
        $soal->kategori = $request->input('kategori');
        $soal->opsi1 = $request->input('opsi1');
        $soal->opsi2 = $request->input('opsi2');
        $soal->opsi3 = $request->input('opsi3');
        $soal->opsi4 = $request->input('opsi4');
        $soal->jawaban = $request->input('jawaban');
        $soal->image = $request->input('image');
        $soal->save();

        return redirect('/admin/soal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::find($id);
        $soal->delete();
        return redirect('/admin/soal');
    }
}
