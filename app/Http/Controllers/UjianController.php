<?php

namespace App\Http\Controllers;

use App\Ujian;
use App\User;
use App\Soal;
use Auth;
use DateTime;
use App\Hasil;
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
        // Authenticate whether user logged in or not
      $this->middleware('auth');

    }


    public function show($id)
    {
        // Prevent user modify url into ujian/0 or ujian/100++
      $count = Ujian::where('user_id','=',Auth::user()->id)->count();
      if($id < 1 || $id > 100 || $count < 1){
        return redirect('/ujian/');
      }

        // Create index for array usage

        // Get necessary information (soal and jawaban column) from ujians table in DB
      $info_db = Ujian::select('soal','jawaban')->where('user_id','=',Auth::user()->id)->get();

        // Convert string separated by comma of "random question id" and "jawaban" into array
      $array_db = explode(',', $info_db);

        // Clean array value format
        // We get array with 200 index
        // Index 0 - 99 "random question id" from `ujians.soal`
        // Index 100-199 "answer" from `ujians.jawaban`
        // We need to clean because explode() collection return dirty value

      $array_db[0] = substr($array_db[0], 10);
      $array_db[99] = substr($array_db[99], 0,-1);

      $array_db[100] = substr($array_db[100], 11);
      $array_db[199] = substr($array_db[199], 0,-3);

        // Uncomment line below and go to /ujian/{id} in browser to check the array value
        // dd($array_db);

        // Get requested question id
      $nomor_di_db = $array_db[$id-1];

        // Get user answer to check if the question already answered
      $jawaban_di_db = $array_db[($id-1)+100];

        // Get the question
      $soals = Soal::find($nomor_di_db);

      $waktu = Ujian::select('created_at')->where('user_id','=',Auth::user()->id)->get();
      $waktu = substr($waktu, 16);
      $waktu = substr($waktu, 0 , -3);

      $waktu = new DateTime($waktu);
      $waktu = $waktu->getTimestamp();

      return view('ujian.tes',compact('soals'))->with('nomor_sekarang',$id)->with('jawaban',$jawaban_di_db)->with('array',$array_db)->with('waktu',$waktu);
        // return dd($jawaban_di_db);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // if hasil not empty, redirect to hasil. Prevent re attempt
        // $count = Hasil::where('user_id','=',Auth::user()->id)->first();
        // if($count > 0){
        // return redirect('hasil');
        // }

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
        // Check if user already generate question in DB
      $iduser = Auth::getUser()->id;
      $count = Ujian::where('user_id','=',$iduser)->count();

        // If question already generated, continue to already running quiz
      if ($count > 0) {
        return redirect('ujian/1');
      }

        // Assign random question id for each category
      $idtiu = Soal::select('id','jawaban')->where('kategori','=','TIU')->inRandomOrder()->take(30)->get();
      $idtwk = Soal::select('id','jawaban')->where('kategori','=','TWK')->inRandomOrder()->take(35)->get();
      $idtkp = Soal::select('id','jawaban')->where('kategori','=','TKP')->inRandomOrder()->take(35)->get();

        // Merge into single collection of "random question id"
      $soal = $idtiu->merge($idtwk)->merge($idtkp);

        // Convert collection of "random question id" into string separated by comma
      $idsoal = $soal->implode('id',',');
      $kuncisoal = $soal->implode('jawaban',',');

        // Initiate the "array of answer" with '0' value
      for ($i=0; $i < 100 ; $i++) {
        $jawaban_kosong[$i] = '0';
      }

         //Convert "array of answer" into string separated by comma
      $jawaban_kosong = implode(',', $jawaban_kosong);

        // Insert string of "random questionid" and "answer" into ujians table in DB
      $ujian = new Ujian;
      $ujian->soal = $idsoal;
      $ujian->user_id = $iduser;
      $ujian->kunci = $kuncisoal;
      $ujian->jawaban = $jawaban_kosong;
      $ujian->save();

      return redirect('ujian/1'); 
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
        // Get user answer on page
      $jawaban = $request->input('optradio');

        // Get necessary information (jawaban column) from ujians table in DB
      $iduser = Auth::getUser()->id;
      $info_db = Ujian::select('jawaban')->where('user_id','=',$iduser)->get();

        // Convert string separated by comma of "jawaban" column into array
      $array_db = explode(',', $info_db);

        // Clean array value format
      $array_db[0] = substr($array_db[0], 13);
      $array_db[99] = substr($array_db[99], 0,-3);

        // Replace value of specific array "jawaban" with user answer on page
      $array_db[$id-1] = $jawaban;

        // Convert back array of "jawaban" into string separated by comma
      $array_db = implode(',', $array_db);

        // Insert string of "jawaban" into ujians table in DB
      $update = Ujian::where('user_id',$iduser)->first();
      $update->jawaban = $array_db;
      $update->save();

      if ($id==100) {
        return back();
      }

      return redirect('ujian/'.($id+1));
    }

    public function finish()
    {

      $waktu = Ujian::select('created_at')->where('user_id','=',Auth::user()->id)->get();
      $waktu = substr($waktu, 16);
      $waktu = substr($waktu, 0 , -3);

      $waktu = new DateTime($waktu);
      $waktu = $waktu->getTimestamp();

      return view('ujian.finish', compact('waktu'));
    }

    public function hasil()
    {
      $hasil = Hasil::where('user_id','=',Auth::user()->id)->latest()->first();

      return view('ujian.hasil')->with('hasil',$hasil);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ujian = Ujian::where('user_id','=',$id)->first();

      $jawaban_user = explode(',',$ujian->jawaban);
      $kunci = explode(',',$ujian->kunci);

      $tiu=0;
      $twk=0;
      $tkp=0;

      for ($i = 0; $i < 100 ; $i++) { 
          if ($i < 30) {
            if ($jawaban_user[$i] == $kunci[$i]){
                $twk+=5;
            } 
          }
          else if ($i > 29 && $i < 65) {
            if ($jawaban_user[$i] == $kunci[$i]){
                $tiu+=5;
            }
          }
          else if ($i > 64 && $i < 100) {

            $kunci_tkp = $kunci[$i];
            for ($j = 0; $j < 5; $j++)
            {
                if($jawaban_user[$i] == $kunci_tkp[$j])
                {
                    $tkp+=($j+1);
                }
            }    
          }
        
      }

      $hasil = new Hasil;
      $hasil->user_id = Auth::user()->id;
      $hasil->nilaitiu = $tiu;
      $hasil->nilaitwk = $twk;
      $hasil->nilaitkp = $tkp;
      $hasil->save();

      $ujian->delete();

      return view('ujian.hasil')->with('hasil',$hasil);


    }
  }
