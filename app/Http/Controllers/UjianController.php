<?php

namespace App\Http\Controllers;

use App\Ujian;
use App\User;
use App\Soal;
use App\Aturan;
use Auth;
use DateTime;
use App\Hasil;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function __construct()
    {
        // Authenticate whether user logged in or not
      $this->middleware('auth');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   /*  /ujian/$id  */

        // Prevent user go into ujian/0, ujian/100++
        // Prevent user go into ujian/finish ujian/hasil when ujian not started
      $count = Ujian::where('user_id','=',Auth::user()->id)->count();
      if($id < 1 || $id > 100 || $count < 1){
        return redirect('/ujian/');
      }

        // Get necessary information (soal and jawaban column) from ujians table in DB
      $info_db = Ujian::select('soal','jawaban')->where('user_id','=',Auth::user()->id)->first();

        // Convert string separated by comma of "random question id" into array
      $nomor_soal_acak = explode(',', $info_db->soal);

        // Convert string separated by comma of "jawaban user" into array
      $jawaban_user = explode(',', $info_db->jawaban);

        // Get requested question
      $soals = Soal::find($nomor_soal_acak[$id-1]);

        // Get created_at ujian time for timer countdown
      $waktu = Ujian::select('created_at')->where('user_id','=',Auth::user()->id)->first();
      $waktu = $waktu->created_at->timestamp;

      return view('ujian.tes',compact('soals'))->with('nomor_sekarang',$id)->with('jawaban',$jawaban_user)->with('waktu',$waktu);
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
    {   /*  when user click Mulai button do start ujian  */

        // Check if user already started ujian
      $count = Ujian::where('user_id','=',Auth::user()->id)->count();

        // If already started, continue to running ujian
      if ($count > 0) {
        return redirect('ujian/1');
      }

        // Assign random question id for each category
      $soal = Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',1)->where('subbidang_id',1)->where('kesulitan_id',2)->inRandomOrder()->take(5)->get();

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',1)->where('subbidang_id',2)->where('kesulitan_id',2)->inRandomOrder()->take(4)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',1)->where('subbidang_id',3)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',1)->where('subbidang_id',4)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',2)->where('subbidang_id',5)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',2)->where('subbidang_id',6)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',2)->where('subbidang_id',7)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',3)->where('subbidang_id',8)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',1)->where('bidang_id',3)->where('subbidang_id',9)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',4)->where('subbidang_id',10)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',4)->where('subbidang_id',11)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',4)->where('subbidang_id',12)->where('kesulitan_id',2)->inRandomOrder()->take(2)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',4)->where('subbidang_id',13)->where('kesulitan_id',2)->inRandomOrder()->take(2)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',14)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',15)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',16)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',17)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',18)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',19)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',20)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',5)->where('subbidang_id',21)->where('kesulitan_id',2)->inRandomOrder()->take(2)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',6)->where('subbidang_id',23)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',6)->where('subbidang_id',25)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',6)->where('subbidang_id',26)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',6)->where('subbidang_id',27)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',6)->where('subbidang_id',28)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',6)->where('subbidang_id',29)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',7)->where('subbidang_id',30)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',7)->where('subbidang_id',31)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',7)->where('subbidang_id',32)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',7)->where('subbidang_id',33)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',8)->where('subbidang_id',34)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',8)->where('subbidang_id',35)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',8)->where('subbidang_id',36)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',9)->where('subbidang_id',37)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',9)->where('subbidang_id',38)->where('kesulitan_id',2)->inRandomOrder()->take(2)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',9)->where('subbidang_id',39)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',9)->where('subbidang_id',40)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',9)->where('subbidang_id',41)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',2)->where('bidang_id',9)->where('subbidang_id',42)->where('kesulitan_id',2)->inRandomOrder()->take(1)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',10)->where('subbidang_id',43)->where('kesulitan_id',2)->inRandomOrder()->take(6)->get());

      $soal = $soal->merge($idtambah);


      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',10)->where('subbidang_id',44)->where('kesulitan_id',2)->inRandomOrder()->take(5)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',11)->where('subbidang_id',45)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',11)->where('subbidang_id',46)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',12)->where('subbidang_id',47)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',12)->where('subbidang_id',48)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',13)->where('subbidang_id',49)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',13)->where('subbidang_id',50)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',14)->where('subbidang_id',51)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

      $idtambah = (Soal::select('id','jawaban')->where('jenis_id',3)->where('bidang_id',14)->where('subbidang_id',52)->where('kesulitan_id',2)->inRandomOrder()->take(3)->get());

      $soal = $soal->merge($idtambah);

        // Convert collection of "random question id" and "kunci" into string separated by comma
      $id_soal = $soal->implode('id',',');
      $kunci_soal = $soal->implode('jawaban',',');

        // Initiate the "array of user answer" with '0' value
      for ($i=0; $i < 100 ; $i++) {
        $jawaban_kosong[$i] = '0';
      }

         //Convert "array of user answer" into string separated by comma
      $jawaban_kosong = implode(',', $jawaban_kosong);

        // Insert string of "random questionid" and "answer" into ujians table in DB
      $ujian = new Ujian;
      $ujian->soal = $id_soal;
      $ujian->user_id = Auth::user()->id;
      $ujian->kunci = $kunci_soal;
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
    {   /*  when user click answer Radio button do update "jawaban"  */

        // Get necessary information (jawaban column) from ujians table in DB
      $info_db = Ujian::select('jawaban')->where('user_id','=',Auth::user()->id)->first();

        // Convert string separated by comma of "jawaban" column into array
      $jawaban_user = explode(',', $info_db->jawaban);

        // Replace value of current number "jawaban user" array with user answer on page
      $jawaban_user[$id-1] = $request->input('optradio');

        // Re-Convert array of "jawaban" into string separated by comma
      $jawaban_user = implode(',', $jawaban_user);

        // Update string of "jawaban" into ujians table in DB
      $update = Ujian::where('user_id',Auth::user()->id)->first();
      $update->jawaban = $jawaban_user;
      $update->save();

        // Answering 100th number redirecting user back to the page, instead of 101th number
      if ($id==100) {
        return back();
      }
        // Answering redirect to next number
      return redirect('ujian/'.($id+1));
    }

    public function finish()
    {   /*  /ujian/finish confirmation page  */

        // Get necessary information (time, jawaban) from ujians table in DB
      $info_db = Ujian::select('created_at','jawaban')->where('user_id','=',Auth::user()->id)->first();
        // Get created_at ujian time for timer countdown
      $waktu = $info_db->created_at->getTimestamp();

        // Get user answer
      $jawaban_user = explode(',', $info_db->jawaban);

        // Count how much the empty answer
      for ($i=0, $j=0; $i < 100; $i++) { 
          if ($jawaban_user[$i] == '0') {
            $j++;
          }
      }

      return view('ujian.finish', compact('waktu'))->with('jawaban_kosong',$j);
    }

    public function hasil()
    { /*  ujian/hasil display user hasil ujian  */

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
    { /*  When user click Akhiri Ujian button do save hasil and delet ujian record  */

        // Get user ujian data
      $ujian = Ujian::where('user_id','=',$id)->first();

        // Convert string separated by comma of "jawaban" column into array
      $jawaban_user = explode(',',$ujian->jawaban);

        // Convert string separated by comma of "kunci" column into array
      $kunci = explode(',',$ujian->kunci);

        // Initiate nilai counter
      $tiu=0;
      $twk=0;
      $tkp=0;

        // Compare user "jawaban" with "kunci"
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

        // Insert user nilai into Hasil table in DB
      $hasil = new Hasil;
      $hasil->user_id = Auth::user()->id;
      $hasil->nilaitiu = $tiu;
      $hasil->nilaitwk = $twk;
      $hasil->nilaitkp = $tkp;
      $hasil->save();

        // Delete ujian record
      $ujian->delete();

      return view('ujian.hasil')->with('hasil',$hasil);
    }
  }
