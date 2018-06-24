@extends('layouts.app')

@section('content')


<div class="container pt-md-3 mx-auto">
<div class="d-flex justify-content-center">
  <div class="card border-dark " style="width: 25rem;">
  <div class="card-header text-center border-dark">
    <h5>
    Informasi Ujian
    </h5>
  </div>

  <div class="card-body">
    <div class="row">
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>Nama Ujian :</li>
                  <li>Kode Ujian :</li>
                  <li>Durasi :</li>
                  <li>Jumlah Soal :</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>Tes Wawasan Kebangsaan</li>
                  <li>TWK</li>
                  <li>120 Menit</li>
                  <li>100</li>
                </ul>
              </div>
    </div>
  </div>
  </div>
</div>
  <br>

<div class="d-flex justify-content-center">
<div class="card border-dark" style="width: 25rem;">
  <div class="card-header text-center border-dark">
    <h5>
      Informasi Peserta
    </h5>
  </div>

  <div class="card-body">
    <div class="row">
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>Nama Lengkap :</li>
                  <li>Email :</li>
                  <li>Jenis Kelamin :</li>
                  <li>Tempat Lahir :</li>
                  <li>Tanggal Lahir :</li>

                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>Budi Hartanto</li>
                  <li>budi@gmail.com</li>
                  <li>Laki - laki</li>
                  <li>Banjarmasin</li>
                  <li>17 Agustus 1990</li>
                </ul>
              </div>
    </div>
  </div>
</div>
</div>
<br>
    
  <div class="text-center">
        <button class="btn btn-primary mr-sm-1 " type="submit">Mulai Tes</button>
        <button class="btn btn-danger ml-sm-1 " type="submit">Batal Tes</button>
  </div>  
</div>
@endsection