@extends('layouts.app')

@section('content')

<div class="container p-4">
<div class="row">

<div class="col-4">

	<div style="width: 260px; height: 248px; overflow: auto;">
	@php ($n=1)
	@for ($i=1; $i<=20;$i++)
		<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
	  		@for ($j=1; $j<=5;$j++)
			<div class="btn-group mr-2" role="group" aria-label="First group">
	    		<button type="button" class="btn btn-sm btn-outline-secondary btn-block" style="width: 40px" >{{$n++}}
	    		</button>
			</div>
		  	@endfor
		</div>
		@endfor
	</div>
	<br>
	<div class="card text-center" style="width: 260px;">
		<div class="card-body" >
		<p id="demo" style="font-size: 30px; "></p>
		</div>
	</div>

</div>

<div class="col-8">
	
		<div class="card text-left">
	  		<div class="card-body">
	    		<h5 class="card-title">Soal No. 1</h5>
	    		<p class="card-text">Kategori : Tes Wawasan Kebangsaan</p>
	  		</div>
	  		
		</div>
		<br>
		<div class="card text-left">
	  		<div class="card-body">
	    		<p class="card-text">Anak yang lahir dari perkawinan yang sah dari seorang ayah Warga Negara Indonesia dan ibu warga negara asing dan belum berusia 18 tahun.Mengakibatkan anak tersebut berkewarganegaraan</p>

	    		<div class="radio">
				  <label><input type="radio" name="optradio"> A. </label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> B. </label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> C. </label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> D. </label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="optradio"> E. </label>
				</div>
	  		</div>

	  		
		</div>
		<br>
	  		<center>
	  			<button class="btn btn-outline-secondary">Sebelumnya<i class="fa fa-step-backward"></i></button>
	  			<button class="btn btn-outline-secondary">Selanjutnya</button>
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
    document.getElementById("demo").innerHTML =  ('0' + hours).slice(-2) + ":"
    + ('0' + minutes).slice(-2) + ":" + ('0' + seconds).slice(-2) + "";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
@endsection