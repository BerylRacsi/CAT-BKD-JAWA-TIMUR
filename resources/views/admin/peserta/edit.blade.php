@extends('layouts-admin.master')

@section('title', '- Edit Data Peserta')

@section('content')

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-pencil-square-o"></i> Form Edit Data Peserta Ujian CAT
  </div>

  <div class="card-body">
    {!! Form::open(['action' => ['PesertaController@update',$user->id],'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('id','ID')}}
        {{Form::text('id',$user->id,['class' => 'form-control','placeholder' => 'ID'])}}
      </div>
      <div class="form-group">
        {{Form::label('name','Nama Peserta')}}
        {{Form::text('name',$user->name,['class' => 'form-control','placeholder' => 'Nama Peserta'])}}
      </div>
      <div class="form-group">
        {{Form::label('email','Email Peserta')}}
        {{Form::text('email',$user->email,['class' => 'form-control','placeholder' => 'Email Peserta'])}}
      </div>
      <br>
      {{Form::hidden('_method','PUT')}} 
      <center>
      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
      </center>
    {!! Form::close() !!}
  </div>
</div>

@endsection