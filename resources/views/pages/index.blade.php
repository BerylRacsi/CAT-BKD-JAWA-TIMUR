@extends('layouts.app')

@section('content')


<div class="container pt-4 mx-auto">

<div class="d-flex justify-content-center">
<div class="card " style="width: 35rem;">
  <div class="card-header text-center">
    <h5>
      Informasi Peserta
    </h5>
  </div>

  <div class="card-body">
    <div class="row">
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>Nama Lengkap :</li>
                  <li>Alamat Email :</li>
                  

                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>{{Auth::user()->name}}</li>
                  <li>{{Auth::user()->email}}</li>

                </ul>
              </div>
    </div>
  </div>
</div>
</div>
<br>

<div class="d-flex justify-content-center">
  <div class="card" style="width: 35rem;">
  <div class="card-header text-center">
    <h5>
    Informasi Ujian
    </h5>
  </div>

  <div class="card-body">
    <div class="row">
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>Jumlah Soal :</li>
                  <li>Durasi Ujian :</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>100 soal</li>
                  <li>120 Menit</li>
                </ul>
              </div>
    </div>
  </div>
  </div>
</div>
  <br>
  <br>
  <br>  
  <div class="text-center">
        <button class="btn btn-lg btn-outline-primary mr-sm-1 " type="submit">Mulai Tes</button>
        <button class="btn btn-lg btn-danger ml-sm-1 " type="submit">Batal Tes</button>
  </div>  
</div>
@endsection 