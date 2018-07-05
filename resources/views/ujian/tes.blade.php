@extends('layouts.app')

@section('content')

<div class="container p-4">
<div class="row">

<div class="col-4">
  <div class="card border-secondary mb-3" style="max-width: 288px; height: 248px; overflow: auto;">
  <div class="card-header">Peta Soal</div>
  @php
  $n = 1;
  $kosong = 0;
  @endphp
  @for ($i=1; $i<=20;$i++)
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
      @if ($i==1)
      <p class="btn-block text-center"><br>- - - - - - - - - - TWK - - - - - - - - - -</p>
      @endif
      @if ($i==7)
      <p class="btn-block text-center"><br>- - - - - - - - - - TIU - - - - - - - - - -</p>      
      @endif
      @if ($i==15)
      <p class="btn-block text-center"><br>- - - - - - - - - - TKP - - - - - - - - - -</p>
      @endif
        @for ($j=1; $j<=5;$j++)
      <div class="btn-group mr-2" role="group" aria-label="First group" style="margin-left: 5px; margin-bottom: 5px;" >
          <a href="{{ url('/ujian/'.$n) }}" class="btn btn-sm btn<?php
          if($array[($n-1)+100] == '0')
          {
              echo '-outline';
              $kosong++;
          }
          ?>-secondary
          btn-block" style="width: 40px; font-weight:  500" >{{$n++}}
          </a>
      </div>
        @endfor
    </div>
    @endfor
  </div>
  <div class="card text-center" style="width: 288px; ">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <p style="font-weight: bold;">Soal Terjawab</p>
          {{100 - $kosong}}
        </div>
        <div class="col">
          <p style="font-weight: bold;">Masih Kosong</p>
          {{ $kosong }}
        </div>
      </div>
      <br>
      <button class="btn btn-success btn-block">Selesai Ujian</button>
      </div>
  </div>
  <br>
  <div class="card text-center text-white bg-dark" style="width: 288px; height: 64px;">
    
    <p id="demo" style="font-size: 40px;font-weight: bold; "></p>
    
  </div>
  <br>
  

</div>

<div class="col-8">
  
    <div class="card text-left">
        <div class="card-body">
          <h5 class="card-title">Soal No. {{$no}}</h5>
          <p class="card-text">Kategori : {{$soals->kategori}}</p>
        </div>
        
    </div>
    <br>
    <div class="card text-left">
        <div class="card-body">
          <p class="card-text">{{$soals->deskripsi}}</p>

        {!! Form::open(['action' => ['UjianController@update',$no],'method' => 'POST']) !!}
          <div class="radio">
            <label><input type="radio" name="optradio" value="A"
              @if ($jawaban == 'A')
                @php
                echo 'checked';
                @endphp
              @endif
              > A. {{$soals->opsi1}}</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="B"
              @if ($jawaban == 'B')
                @php
                echo 'checked';
                @endphp
              @endif
              > B. {{$soals->opsi2}}</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="C"
              @if ($jawaban == 'C')
                @php
                echo 'checked';
                @endphp
              @endif
              > C. {{$soals->opsi3}}</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="D"
              @if ($jawaban == 'D')
                @php
                echo 'checked';
                @endphp
              @endif
              > D. {{$soals->opsi4}}</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="optradio" value="E"
              @if ($jawaban == 'E')
                @php
                echo 'checked';
                @endphp
              @endif
              > E. {{$soals->opsi5}}</label>
          </div>
          {{Form::hidden('_method','PUT')}} 
        {!! Form::close() !!} 
        </div>

        
    </div>
    <br>
    <br>
        <center>
          @if ($no == 1)
          <div class="btn btn-outline-secondary mr-3 disabled" style="font-weight: 500; "disabled><i class="fa fa-chevron-circle-left"></i> Sebelumnya</div>
          @else
          <a type="submit" href="/ujian/{{$previous}}" class="btn btn-outline-secondary mr-3" style="font-weight: 500;"><i class="fa fa-chevron-circle-left"></i> Sebelumnya</a>
          @endif

          @if ($no == 100)
          <div class="btn btn-outline-secondary ml-3 disabled" style="font-weight: 500;" disabled>Selanjutnya <i class="fa fa-chevron-circle-right"></i></div>
          @else
          <a type="submit" href="/ujian/{{$next}}" class="btn btn-outline-secondary ml-3" style="font-weight: 500;">Selanjutnya <i class="fa fa-chevron-circle-right"></i></a>
          @endif
        </center>

</div>
</div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
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
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('input[name=optradio]').change(function(){
      $('form').submit();
    });
  });
</script>
@endsection