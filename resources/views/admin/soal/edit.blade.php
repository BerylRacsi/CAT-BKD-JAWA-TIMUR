@extends('layouts-admin.master')

@section('title' , '- Soal')

@section('content')

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-pencil-square-o"></i> Form Edit Soal Ujian CAT
	</div>

	<div class="card-body">
		{!! Form::open(['action' => ['SoalController@update' , $soal->id] , 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
			<div class="form-group">
				{{Form::label('jenis' , 'Jenis')}}
				<br>					
				<select class="btn btn-light dropdown-toggle" id="jenis" name="jenis">
					@foreach($jenis as $key => $value)
					<option value="{{$key}}" @php 
					if ($key == $soal->jenis_id) {
						echo('selected="selected"');
					}
					@endphp>{{$value}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				{{Form::label('bidang' , 'Bidang')}}
				<br>
				<select class="btn btn-light dropdown-toggle" id="bidang" name="bidang">
					@foreach($bidangs as $bidang)
					<option value="{{$bidang->id}}" @php 
					if ($bidang->id == $soal->bidang_id) {
						echo('selected="selected"');
					}
					@endphp>{{$bidang->bidang}}</option>
					@endforeach
				</select>
	    </div>
			<div class="form-group">
				{{Form::label('subbidang' , 'Sub-Bidang')}}
				<br>					
				<select class="btn btn-light dropdown-toggle" id="subbidang" name="subbidang">
					@foreach($subbidangs as $subbidang)
					<option value="{{$subbidang->id}}" @php 
					if ($subbidang->id == $soal->subbidang_id) {
						echo('selected="selected"');
					}
					@endphp>{{$subbidang->subbidang}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				{{Form::label('kesulitan' , 'Kesulitan')}}
				<br>					
				<select class="btn btn-light dropdown-toggle" id="kesulitan" name="kesulitan">
          <option value="2" selected="selected">B : Sedang</option>
        </select>
			</div>
			<div class="form-group">
				{{Form::label('deskripsi' , 'Deskripsi')}}
				{{Form::textarea('deskripsi' , $soal->deskripsi , ['id'=>'article-ckeditor','class' => 'form-control' , 'placeholder' => 'Deskripsi Soal' , 'required'])}}
			</div>
			<div class="container">
			  <div class="row">
			    <div class="col">
			    	{{Form::label('opsi1' , 'Pilihan Jawaban A')}}
			    	{{Form::textarea('opsi1' , $soal->opsi1 , ['id'=>'article-ckeditor1','class' => 'form-control' , 'placeholder' => 'Jawaban A' , 'required'])}}
			    </div>
			    <div class="col">
			    	{{Form::label('opsi2' , 'Pilihan Jawaban B')}}
			    	{{Form::textarea('opsi2' , $soal->opsi2,['id'=>'article-ckeditor2','class' => 'form-control' , 'placeholder' => 'Jawaban B' , 'required'])}}
			    </div>
			    <div class="w-100">
			    	<br>
			    </div>
			    <div class="col">
			    	{{Form::label('opsi3' , 'Pilihan Jawaban C')}}
			    	{{Form::textarea('opsi3' , $soal->opsi3 , ['id'=>'article-ckeditor3','class' => 'form-control' , 'placeholder' => 'Jawaban C' , 'required'])}}
			    </div>
			    <div class="col">
			    	{{Form::label('opsi4' , 'Pilihan Jawaban D')}}
			    	{{Form::textarea('opsi4' , $soal->opsi4 , ['id'=>'article-ckeditor4','class' => 'form-control' , 'placeholder' => 'Jawaban D' , 'required'])}}
			    </div>
			  </div>
			  <br>
			  <center>
			  	<div class="col-6">
			    	{{Form::label('opsi5' , 'Pilihan Jawaban E')}}
			    	{{Form::textarea('opsi5' , $soal->opsi5 , ['id'=>'article-ckeditor5','class' => 'form-control' , 'placeholder' => 'Jawaban E' , 'required'])}}
			    </div>
			  </center>
			</div>
			<br>
			<br>

			<div id="tkpdiv" @php
			if ($soal->jenis_id == 3) echo('style="display : block;"');
			else echo('style="display : none;"');
			@endphp>
			<center>
			<label>Pilihan Kunci TKP</label><br>
			<label for="kunci1">Kunci 1 (Skor 1)</label>
		    <select name="kunci1" id="kunci1" onchange="setKunci1()" class="btn btn-light dropdown-toggle">
		        <option value="" disabled="" selected="" style="display:none;">Pilih Jawaban</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci2">Kunci 2 (Skor 2)</label>
		    <select name="kunci2" id="kunci2" onchange="setKunci2()" class="btn btn-light dropdown-toggle">
		        <option value="" disabled="" selected="" style="display:none;">Pilih Jawaban</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci3">Kunci 3 (Skor 3)</label>
		    <select name="kunci3" id="kunci3" onchange="setKunci3()" class="btn btn-light dropdown-toggle">
		        <option value="" disabled="" selected="" style="display:none;">Pilih Jawaban</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci4">Kunci 4 (Skor 4)</label>
		    <select name="kunci4" id="kunci4" onchange="setKunci4()" class="btn btn-light dropdown-toggle">
		        <option value="" disabled="" selected="" style="display:none;">Pilih Jawaban</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci5">Kunci 5 (Skor 5)</label>
		    <select name="kunci5" id="kunci5" onchange="setKunci5()" class="btn btn-light dropdown-toggle">
		        <option value="" disabled="" selected="" style="display:none;">Pilih Jawaban</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <br>
		    </center>
		    </div>

			<center>
			<div class="form-group">
				<div class="col-6">
					{{Form::label('jawaban' , 'Jawaban Benar')}}
			    	{{Form::text('jawaban' , $soal->jawaban , ['id'=>'demo' , 'class' => 'form-control' , 'placeholder' => 'Ketik jawaban yang benar' , 'required'])}}
			    </div>
			</div>
			</center>
			<center>
			<div class="form-group">
						{{Form::label('gambar' , 'Upload Gambar Soal')}}
				<div class="col-6">
			    	{{Form::file('image' , ['class' => 'form-control-file'])}}
			    </div>
			</div>
			</center>
			{{Form::hidden('_method' , 'PUT')}}
			<center>
			{{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
			</center>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('jscript')

{{-- <script type="text/javascript"> 
  $('select').on('change' , function()
  {
      var x = document.getElementById("tkpdiv");
      var jenis = document.getElementById("jenis");
      var text = jenis.options[jenis.selectedIndex].text;
      console.log(text);

    if((text) == "TKP")
    { 
        if (x.style.display == "none") {
            x.style.display = "block";
        }
    }
    else if ((text) == "TIU" || (text) == "TWK")
    {
      x.style.display = "none";
    }

  });
</script> --}}

<script type="text/javascript">
  var kunci1,kunci2,kunci3,kunci4,kunci5,kuncitkp;
  if (kunci1 == undefined || kunci2 == undefined || kunci3 == undefined || kunci4 == undefined || kunci5 == undefined) {
    kunci1 = "-";
    kunci2 = "-";
    kunci3 = "-";
    kunci4 = "-";
    kunci5 = "-";
  }
    function setKunci1(){
      kunci1 = document.getElementById('kunci1').value;
    var kuncitkp = kunci1.concat(kunci2,kunci3,kunci4,kunci5);
  document.getElementById("demo").value = kuncitkp;
    }
    function setKunci2(){
      kunci2 = document.getElementById('kunci2').value;
      var kuncitkp = kunci1.concat(kunci2,kunci3,kunci4,kunci5);
  document.getElementById("demo").value = kuncitkp;
	  }
	  function setKunci3(){
      kunci3 = document.getElementById('kunci3').value;
      var kuncitkp = kunci1.concat(kunci2,kunci3,kunci4,kunci5);
  document.getElementById("demo").value = kuncitkp;
    }
    function setKunci4(){
      kunci4 = document.getElementById('kunci4').value;
      var kuncitkp = kunci1.concat(kunci2,kunci3,kunci4,kunci5);
  document.getElementById("demo").value = kuncitkp;
    }
    function setKunci5(){
      kunci5 = document.getElementById('kunci5').value;
		  var kuncitkp = kunci1.concat(kunci2,kunci3,kunci4,kunci5);
  document.getElementById("demo").value = kuncitkp;
    }
</script>

<script type="text/javascript">
  $('#jenis').on('change',function(e){

    var x = document.getElementById("tkpdiv");
    var jenis_id = e.target.value;

    if((jenis_id) == 3) 
    { 
        if (x.style.display === "none") { 
            x.style.display = "block"; 
        }    
    } 
    else if ((jenis_id) == 1 || (jenis_id) == 2) 
    { 
      x.style.display = "none"; 
    }

    console.log(e);
    $.get('jsonbidang?jenis_id=' + jenis_id, function(data){
      console.log(data);
      $('#bidang').empty();
      $('#bidang').append('<option value="0" disabled selected>===Pilih Bidang===</option>');

      $('#subbidang').empty();
      $('#subbidang').append('<option value="0" disabled selected>===Pilih Sub-Bidang===</option>');

      $.each(data, function(index, bidangObj){
        $('#bidang').append('<option value="'+ bidangObj.id +'">'+ bidangObj.bidang +'</option>');
      })
    });
  });

  $('#bidang').on('change',function(e){
    var bidang_id = e.target.value;
    console.log(e);
    $.get('jsonsubbidang?bidang_id=' + bidang_id, function(data){
      console.log(data);
      $('#subbidang').empty();
      $('#subbidang').append('<option value="0" disabled selected>===Pilih Sub-Bidang===</option>');

      $.each(data, function(index, subbidangObj){
        $('#subbidang').append('<option value="'+ subbidangObj.id +'">'+ subbidangObj.subbidang +'</option>');
      })
    });
  });
</script>

@endsection