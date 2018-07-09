@extends('layouts.app')

@section('content')


<div class="container p-4 mx-auto">

<div class="d-flex justify-content-center">
<div class="card " style="width: 35rem;">
  <div class="card-header text-center">
    <h4>
      Informasi Tes
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
                  <h5 class="card-title">Deskripsi Ujian</h5>
    <div class="row" style="padding-left: 2em;">
              <div class="col-3">
                <ul class="list-unstyled text-left" style="font-weight: 500;">
                  <li>Jumlah Soal</li>
                  <li>Durasi Ujian</li>
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
                  <li>100 soal</li>
                  <li>120 Menit</li>
                </ul>
              </div>
    </div>
  </div>
</div>
</div> 
  <div class="text-center" style="padding-top: 2em;">
    <center>
    {!! Form::open(['action' => 'UjianController@store','method' => 'POST']) !!}
      {{Form::submit('Mulai',['class' => 'btn btn-lg btn-outline-primary'])}}
    {!! Form::close() !!}
    </center>
  </div>  
</div>
@endsection 