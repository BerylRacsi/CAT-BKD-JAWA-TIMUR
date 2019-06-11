<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Soal;
use App\Bidang;
use App\Subbidang;
use App\Jenis;
use App\Kesulitan;
use Storage;
use DB;

class SoalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function rekap()
    {
        return view('admin.soal.rekap');
    }

    public function JSONbidang()
    {
        $jenis_id = Input::get('jenis_id');
        $bidangs = Bidang::where('jenis_id',$jenis_id)->get();

        return response()->json($bidangs);
    }

    public function JSONsubbidang()
    {
        $bidang_id = Input::get('bidang_id');
        $subbidangs = Subbidang::where('bidang_id',$bidang_id)->get();

        return response()->json($subbidangs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soals = Soal::all();

        return view('admin.soal.index',compact('soals'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::pluck('jenis','id');
        $kesulitans = Kesulitan::pluck('kesulitan','id')->toarray();
        
        return view('admin.soal.create',compact('jenis','kesulitans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'image' => 'image|nullable|max:1999'

        ]);
        // Check if image exist in user request
        // Prevent image with same filename collide when uploaded
        if($request->hasFile('image')){
            // Get full filename
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get only filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get extesion
            $extension = $request->file('image')->getClientOriginalExtension();
            // Merge filename with next given soal id
            // First, Find next id
            $id = DB::table('information_schema.tables')
                ->select('auto_increment')
                ->where('table_schema','=','cat-bkd')
                ->where('table_name','=','soals')
                ->first();

            $filenameToStore = $id->auto_increment.'_'.$filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('image')->StoreAs('public/img',$filenameToStore);
        } 
        else {
            $filenameToStore = NULL;

        }

        $soal = new Soal;
        $soal->deskripsi = $request->input('deskripsi');
        $soal->jenis_id = $request->input('jenis');
        $soal->bidang_id = $request->input('bidang');
        $soal->subbidang_id = $request->input('subbidang');
        $soal->kesulitan_id = $request->input('kesulitan');
        $soal->opsi1 = $request->input('opsi1');
        $soal->opsi2 = $request->input('opsi2');
        $soal->opsi3 = $request->input('opsi3');
        $soal->opsi4 = $request->input('opsi4');
        $soal->opsi5 = $request->input('opsi5');
        $soal->jawaban = $request->input('jawaban');
        $soal->image = $filenameToStore;
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
        $soals = Soal::find($id);

        return view('admin.soal.show', compact('soals'));
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
        $jenis = Jenis::pluck('jenis','id')->toarray();
        $bidangs = Bidang::where('jenis_id',$soal->jenis_id)->get();
        $subbidangs = Subbidang::where('bidang_id',$soal->bidang_id)->get();
        // dd($subbidangs);
        $kesulitans = Kesulitan::pluck('kesulitan','id')->toarray();

        return view('admin.soal.edit',compact('soal','jenis','bidangs','subbidangs','kesulitans'));
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


        $this->validate($request, [

            'image' => 'image|nullable|max:1999'

        ]);
        
        // Check if image exist in user request
        // Prevent image with same filename collide when uploaded
        if($request->hasFile('image')){
            // Get full filename
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get only filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get extesion
            $extension = $request->file('image')->getClientOriginalExtension();
            // Merge filename with unique id
            $filenameToStore = $id.'_'.$filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('image')->StoreAs('public/img',$filenameToStore);
        } 

        $soal = Soal::find($id);
        $soal->deskripsi = $request->input('deskripsi');
        $soal->jenis_id = $request->input('jenis');
        $soal->bidang_id = $request->input('bidang');
        $soal->subbidang_id = $request->input('subbidang');
        $soal->kesulitan_id = $request->input('kesulitan');
        $soal->opsi1 = $request->input('opsi1');
        $soal->opsi2 = $request->input('opsi2');
        $soal->opsi3 = $request->input('opsi3');
        $soal->opsi4 = $request->input('opsi4');
        $soal->opsi5 = $request->input('opsi5');
        $soal->jawaban = $request->input('jawaban');
        if($request->hasFile('image')){
            $soal->image = $filenameToStore;
        }
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

        if ($soal->image != NULL) {
            // Delete Image
            Storage::delete('public/img/'.$soal->image);
        }

        $soal->delete();
        return redirect('/admin/soal');
    }
}
