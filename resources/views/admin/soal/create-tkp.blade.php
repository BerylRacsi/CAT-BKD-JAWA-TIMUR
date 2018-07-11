@extends('layouts-admin.master')

@section('title', '- Soal')

@section('content')

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-pencil-square-o"></i> Form Tambah Soal Ujian CAT
	</div>

	<div class="card-body">
		{!! Form::open(['action' => 'SoalController@store','method' => 'POST']) !!}
			<div class="form-group">
				{{Form::label('kategori','Kategori')}}
				<br>					
				{{Form::select('kategori', ['TKP' => 'Tes Karakteristik Pribadi','TWK' => 'Tes Wawasan Kebangsaan', 'TIU' => 'Tes Intelegensi Umum'],null, array('class' => 'btn btn-light dropdown-toggle','id'=>'kategori'))}}
			</div>
			<div class="form-group">
				{{Form::label('deskripsi','Deskripsi')}}
				{{Form::textarea('deskripsi','',['class' => 'form-control','placeholder' => 'Deskripsi Soal'])}}
			</div>
			<div class="container">
			  <div class="row">
			    <div class="col">
			    	{{Form::label('opsi1','Pilihan Jawaban A')}}
			    	{{Form::text('opsi1','',['class' => 'form-control' ,'placeholder' => 'Jawaban A'])}}
			    </div>
			    <div class="col">
			    	{{Form::label('opsi2','Pilihan Jawaban B')}}
			    	{{Form::text('opsi2','',['class' => 'form-control','placeholder' => 'Jawaban B'])}}
			    </div>
			    <div class="w-100">
			    	<br>
			    </div>
			    <div class="col">
			    	{{Form::label('opsi3','Pilihan Jawaban C')}}
			    	{{Form::text('opsi3','',['class' => 'form-control','placeholder' => 'Jawaban C'])}}
			    </div>
			    <div class="col">
			    	{{Form::label('opsi4','Pilihan Jawaban D')}}
			    	{{Form::text('opsi4','',['class' => 'form-control','placeholder' => 'Jawaban D'])}}
			    </div>
			  </div>
			  <br>
			  <center>
			  	<div class="col-6">
			    	{{Form::label('opsi5','Pilihan Jawaban E')}}
			    	{{Form::text('opsi5','',['class' => 'form-control','placeholder' => 'Jawaban E'])}}
			    </div>
			  </center>
			</div>
			<br>
			
			<center>
			<label>Pilihan Kunci TKP</label><br>
			<label for="kunci1">Kunci 1 (Skor 1)</label>
		    <select name="kunci1" id="kunci1" onchange="setKunci1()">
		        <option value="" disabled="" selected="" style="display:none;">Select One...</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci2">Kunci 2 (Skor 2)</label>
		    <select name="kunci2" id="kunci2" onchange="setKunci2()">
		        <option value="" disabled="" selected="" style="display:none;">Select One...</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci3">Kunci 3 (Skor 3)</label>
		    <select name="kunci3" id="kunci3" onchange="setKunci3()">
		        <option value="" disabled="" selected="" style="display:none;">Select One...</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci4">Kunci 4 (Skor 4)</label>
		    <select name="kunci4" id="kunci4" onchange="setKunci4()">
		        <option value="" disabled="" selected="" style="display:none;">Select One...</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <label for="kunci5">Kunci 5 (Skor 5)</label>
		    <select name="kunci5" id="kunci5" onchange="setKunci5()">
		        <option value="" disabled="" selected="" style="display:none;">Select One...</option>
		        <option value="A">A</option>
		        <option value="B">B</option>
		        <option value="C">C</option>
		        <option value="D">D</option>
		        <option value="E">E</option>
		    </select>
		    <br>
		    <br>
		    </center>

			<center>
			<div class="form-group">
				<div class="col-6">
					{{Form::label('jawaban','Jawaban Benar')}}
			    	{{Form::text('jawaban','',['id'=>'demo','class' => 'form-control' ,'placeholder' => 'Ketik jawaban yang benar'])}}
			    	
			    </div>
			</div>
			</center>
			<center>
			<div class="form-group">
				<div class="col-6">
					{{Form::label('image','URL Gambar (opsional)')}}
			    	{{Form::text('image','',['class' => 'form-control' ,'placeholder' => 'Copy Link URL Gambar'])}}
			    </div>
			</div>
			</center>
			<center>
			{{Form::submit('Submit',['class' => 'btn btn-primary'])}}
			</center>
		{!! Form::close() !!}
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$('select').on('change', function()
	{
		if((this.value) == "TWK" || (this.value) == "TIU")
		{
	    	location.href = '/admin/soal/create';
	    	document.getElementById("kategori").value = "TIU";		
		}
	});
</script>


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

@endsection