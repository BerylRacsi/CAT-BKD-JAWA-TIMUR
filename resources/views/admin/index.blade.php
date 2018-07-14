@extends('layouts-admin.master')

@section('title', '- Dashboard')

@section('content')

<!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <a class="card text-white bg-primary o-hidden h-100" href="{{route('peserta.index')}}">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-group"></i>
              </div>
              <h4 class="font-weight-bold">{{$users}}</h4>
              <div class="mr-5">Peserta Terdaftar</div>
            </div>
            <div class="card-footer text-white clearfix small z-1">
              <span class="float-left">Lihat Peserta</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-superscript"></i>
              </div>
              <h4 class="font-weight-bold">{{$soals}}</h4>
              <div class="mr-5">Soal</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('soal.index')}}">
              <span class="float-left">Lihat Soal</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list-ol"></i>
              </div>
              <h4 class="font-weight-bold">{{$hasils}}</h4>
              <div class="mr-5">Ujian Terlaksana</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('admin.hasil')}}">
              <span class="float-left">Lihat Hasil</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-sort-numeric-asc"></i>
              </div>
              <h4 class="font-weight-bold">{{$ujians}}</h4>
              <div class="mr-5">Ujian Berlangsung</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('admin.live')}}">
              <span class="float-left">Lihat Skor</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

@endsection