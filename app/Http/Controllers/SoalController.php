<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use Storage;
use DB;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
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
        $soal->kategori = $request->input('kategori');
        $soal->subkategori = $request->input('subkategori');
        $soal->kesulitan = $request->input('kesulitan');
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
        $soal->kategori = $request->input('kategori');
        $soal->subkategori = $request->input('subkategori');
        $soal->kesulitan = $request->input('kesulitan');
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
