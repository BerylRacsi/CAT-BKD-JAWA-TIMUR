@extends('layouts.app')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Selamat Datang di CAT - BKD</h1>
      <p class="lead">Silahkan pilih kategori soal yang berada dibawah ini untuk memulai test yang anda minati.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Wawasan Kebangsaan</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">TWK </h1>
            <div class="row">
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>Jumlah Soal</li>
                  <li>Waktu</li>
                  <li>Tipe Soal</li>
                  <li>Batas Tuntas</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>100 soal</li>
                  <li>120 menit</li>
                  <li>Pilihan Ganda</li>
                  <li>75</li>
                </ul>
              </div>
            </div>
            <button type="button" class="btn btn-lg btn-block btn-primary">Mulai Test</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Intelegensi Umum</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">TIU</h1>
            <div class="row">
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>Jumlah Soal</li>
                  <li>Waktu</li>
                  <li>Tipe Soal</li>
                  <li>Batas Tuntas</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>100 soal</li>
                  <li>120 menit</li>
                  <li>Pilihan Ganda</li>
                  <li>75</li>
                </ul>
              </div>
            </div>
            <button type="button" class="btn btn-lg btn-block btn-primary">Mulai Test</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Karakteristik Pribadi</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">TKP</h1>
            <div class="row">
              <div class="col">
                <ul class="list-unstyled text-left">
                  <li>Jumlah Soal</li>
                  <li>Waktu</li>
                  <li>Tipe Soal</li>
                  <li>Batas Tuntas</li>
                </ul>
              </div>
              <div class="col">
                <ul class="list-unstyled text-right">
                  <li>100 soal</li>
                  <li>120 menit</li>
                  <li>Pilihan Ganda</li>
                  <li>75</li>
                </ul>
              </div>
            </div>
            <button type="button" class="btn btn-lg btn-block btn-primary">Mulai Test</button>
          </div>
        </div>
      </div>

      
      
    </div>
@endsection

