@extends('layouts-admin.master')

@section('title', '- Soal')

@section('content')

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-pencil-square-o"></i> Form Tambah Soal Ujian CAT
	</div>

	<div class="card-body">
		{!! Form::open(['action' => ['SoalController@update',$soal->id],'method' => 'POST']) !!}
			<div class="form-group">
				{{Form::label('kategori','Kategori')}}
				<br>					
				{{Form::select('kategori', ['TWK' => 'Tes Wawasan Kebangsaan', 'TIU' => 'Tes Intelegensi Umum','TKP' => 'Tes Karakteristik Pribadi'],$soal->kategori, array('class' => 'btn btn-light dropdown-toggle'))}}
			</div>
			<div class="form-group">
				{{Form::label('deskripsi','Deskripsi')}}
				{{Form::textarea('deskripsi',$soal->deskripsi,['class' => 'form-control','placeholder' => 'Deskripsi Soal'])}}
			</div>
			<div class="container">
			  <div class="row">
			    <div class="col">
			    	{{Form::label('opsi1','Pilihan Jawaban A')}}
			    	{{Form::text('opsi1',$soal->opsi1,['class' => 'form-control' ,'placeholder' => 'Jawaban A'])}}
			    </div>
			    <div class="col">
			    	{{Form::label('opsi2','Pilihan Jawaban B')}}
			    	{{Form::text('opsi2',$soal->opsi2,['class' => 'form-control','placeholder' => 'Jawaban B'])}}
			    </div>
			    <div class="w-100">
			    	<br>
			    </div>
			    <div class="col">
			    	{{Form::label('opsi3','Pilihan Jawaban C')}}
			    	{{Form::text('opsi3',$soal->opsi3,['class' => 'form-control','placeholder' => 'Jawaban C'])}}
			    </div>
			    <div class="col">
			    	{{Form::label('opsi4','Pilihan Jawaban D')}}
			    	{{Form::text('opsi4',$soal->opsi4,['class' => 'form-control','placeholder' => 'Jawaban D'])}}
			    </div>
			  </div>
			</div>
			<br>
			
			<center>
			<div class="form-group">
				<div class="col-6">
					{{Form::label('jawaban','Jawaban Benar')}}
			    	{{Form::text('jawaban',$soal->jawaban,['class' => 'form-control' ,'placeholder' => 'Ketik jawaban yang benar'])}}
			    </div>
			</div>
			</center>
			<center>
			<div class="form-group">
				<div class="col-6">
					{{Form::label('image','URL Gambar (opsional)')}}
			    	{{Form::text('image',$soal->image	,['class' => 'form-control' ,'placeholder' => 'Copy Link URL Gambar'])}}
			    </div>
			</div>
			</center>
			{{Form::hidden('_method','PUT')}}	
			<center>
			{{Form::submit('Submit',['class' => 'btn btn-primary'])}}
			</center>
		{!! Form::close() !!}
	</div>
</div>

@endsection