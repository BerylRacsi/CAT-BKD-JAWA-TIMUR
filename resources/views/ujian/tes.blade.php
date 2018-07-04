@extends('layouts.app')

@section('content')

<div class="container p-4">
<div class="row">

<div class="col-4">
	<div class="card text-center" style="width: 288px; ">
		
		<div class="card-body">
		<div class="row">
			<div class="col">
				<p style="font-weight: bold;">Soal Terjawab</p>
				<p>2</p>
			</div>
			<div class="col">
				<p style="font-weight: bold;">Masih Kosong</p>
				<p>98</p>
			</div>
		</div>
		<button class="btn btn-success btn-block">Selesai Ujian</button>
		</div>

	</div>
	<br>
	<div style="width: 288px; height: 248px; overflow: auto; border-style: ridge;">
	@php ($n=1)
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
	    		<button type="button" class="btn btn-sm btn-outline-secondary btn-block" style="width: 40px; font-weight:  500" >{{$n++}}
	    		</button>
			</div>
		  	@endfor
		</div>
		@endfor
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

	    		<div class="radio">
				  <label><input type="radio" name="optradio"> A. {{$soals->opsi1}}</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> B. {{$soals->opsi2}}</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> C. {{$soals->opsi3}}</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> D. {{$soals->opsi4}}</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> E. {{$soals->opsi5}}</label>
				</div>
	  		</div>

	  		
		</div>
		<br>
		<br>
	  		<center>
	  			@if ($soals->id == 1)
	  			<a href="#" class="btn btn-outline-secondary mr-3" style="font-weight: 500; "disabled><i class="fa fa-chevron-circle-left"></i> Sebelumnya</a>
	  			@else
	  			<a href="/ujian/{{$previous}}" class="btn btn-outline-secondary mr-3" style="font-weight: 500;"><i class="fa fa-chevron-circle-left"></i> Sebelumnya</a>
	  			@endif

	  			@if ($soals->id == 100)
	  			<a href="/ujian/{{$next}}" class="btn btn-outline-secondary ml-3" style="font-weight: 500;" disabled>Selanjutnya <i class="fa fa-chevron-circle-right"></i></a>
	  			@else
	  			<a href="/ujian/{{$next}}" class="btn btn-outline-secondary ml-3" style="font-weight: 500;">Selanjutnya <i class="fa fa-chevron-circle-right"></i></a>
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
@endsection