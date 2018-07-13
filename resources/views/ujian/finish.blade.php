@extends('layouts.app')
 
@section('content')
 
 
<div class="container p-4 mx-auto">
 
<div class="d-flex justify-content-center">
<div class="card " style="width: 35rem;">
  <div class="card-header text-center">
    <h4>
      Konfirmasi Akhiri Ujian
    </h4>
  </div>
 
  <div class="card-body">
    <h5 class="card-title">Identitas Peserta</h5>
    <div class="row" style="padding-left: 2em;">
      <div class="col-3">
        <ul class="list-unstyled text-left" style="font-weight: 500;">
          <li>Nama</li>
          <li>Alamat Email</li>
        </ul>
      </div>
      <div class="col-1">
        <ul class="list-unstyled text-left" style="font-weight: 500;">
          <li>:</li>
          <li>:</li>
        </ul>
      </div>
      <div class="col-8">
        <ul class="list-unstyled text-left">
          <li>{{Auth::user()->name}}</li>
          <li>{{Auth::user()->email}}</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card-body">
    <h5 class="card-title">Keterangan Ujian</h5>
    <div class="row" style="padding-left: 2em;">
      <div class="col-3">
        <ul class="list-unstyled text-left" style="font-weight: 500;">
{{--           <li>Soal Terjawab</li>
          <li>Soal Kosong</li> --}}
          <li>Sisa Waktu</li>
        </ul>
      </div>
      <div class="col-1">
        <ul class="list-unstyled text-left" style="font-weight: 500;">
{{--           <li>:</li>
          <li>:</li> --}}
          <li>:</li>
        </ul>
      </div>
      <div class="col-8">
        <ul class="list-unstyled text-left">
{{--           <li>5</li>
          <li>95</li> --}}
          <li><p id="demo"></p></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div> 
  <div class="text-center" style="padding-top: 2em;">
    <div class="d-flex justify-content-center">
    <div class="p-2 bd-highlight">
    <a href="/ujian/1" class="btn btn-lg btn-info"><i class="fa fa-toggle-left"></i> Kembali Mengerjakan</a>
    </div>
    <div class="p-2 bd-highlight">
    {!!Form::open(['action' => ['UjianController@destroy',Auth::user()->id],'method' => 'POST']) !!} 
    {{Form::hidden('_method','DELETE')}} 
      {{Form::button('Akhiri Ujian <i class="fa fa-exclamation-triangle"></i>',['type'=>'submit','class' => 'btn btn-lg btn-outline-danger'])}}
    {!!Form::close()!!}
  </div>
    </div>
  </div>  
</div>

<script type="text/javascript">
  var waktuJS = new Date({{$waktu}} * 1000).getTime();
  var waktuJS = waktuJS + 5400000;
</script>
<script>
// Set the date we're counting down to
 
//var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
 
 
// Update the count down every 1 second
var x = setInterval(function() {
 
    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now an the count down date
    var distance = waktuJS - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML =  ('0' + hours).slice(-2) + " : "
    + ('0' + minutes).slice(-2) + " : " + ('0' + seconds).slice(-2) + "";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "WAKTU HABIS";
    }
}, 1000);
</script>
@endsection 