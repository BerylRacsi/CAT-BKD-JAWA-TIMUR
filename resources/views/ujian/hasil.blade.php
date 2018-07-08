@extends('layouts.app')

@section('content')


<div class="container p-4 mx-auto">

<div class="d-flex justify-content-center">
<div class="card " style="width: 35rem;">
  <div class="card-header text-center">
    <h4>
      Hasil Ujian
    </h4>
  </div>

  <div class="card-body">
    <div class="row" style="padding-left: 2em;">
              <div class="col-8">
                <ul class="list-unstyled text-left" style="font-weight: 500;">
                  <li>Tes Wawasan Kebangsaan</li>
                  <li>Tes Intelegensia Umum</li>
                  <li>Tes Karakteristik Pribadi</li>
                </ul>
              </div>
              <div class="col-1">
                <ul class="list-unstyled text-left">
                  <li>:</li>
                  <li>:</li>
                  <li>:</li>
                </ul>
              </div>
              <div class="col-2">
                <ul class="list-unstyled text-right">
                  <li>30</li>
                  <li>121</li>
                  <li>45</li>
                </ul>
              </div>
    </div>
    <hr>
    <div class="row" style="padding-left: 2em;">
              <div class="col-8">
                <ul class="list-unstyled text-left" style="font-weight: 500;">
                  <li>Total Skor CAT</li>
                </ul>
              </div>
              <div class="col-1">
                <ul class="list-unstyled text-left" style="font-weight: 500;">
                  <li>:</li>
                </ul>
              </div>
              <div class="col-2">
                <ul class="list-unstyled text-right">
                  <li>234</li>
                </ul>
              </div>
    </div>
  </div>
  
</div>
</div> 
  <div class="text-center" style="padding-top: 2em; padding-bottom: 5em;">
        
          <a class="btn btn-lg btn-success" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>
                                            Selesai
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
  
  </div>  
</div>
@endsection 