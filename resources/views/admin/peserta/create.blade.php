@extends('layouts-admin.master')

@section('title', '- Tambah Data Peserta')

@section('content')

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-pencil-square-o"></i> Form Tambah Data Peserta Ujian CAT
  </div>

  <div class="card-body">
    {!! Form::open(['action' => 'PesertaController@store' ,'method' => 'POST']) !!}
      <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-5">
          {{Form::label('name' , 'Nama Peserta')}}
          {{Form::text('name', '' , ['class' => 'form-control' , 'placeholder' => 'Nama Peserta' , 'required'])}}
          @if ($errors->has('name'))
          <br>
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-5">
          {{Form::label('email' , 'Email Peserta')}}
          {{Form::text('email' , '' ,['class' => 'form-control' , 'placeholder' => 'Email Peserta' , 'required'])}}
          @if ($errors->has('email'))
          <br>
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-5">
          {{Form::label('password' , 'Password')}}
          {{Form::text('password' , '' ,['class' => 'form-control','placeholder' => 'Password Peserta' , 'required'])}}
        </div>
        @if ($errors->has('password'))
        <br>
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
      </div>
      <br>
      <center>
      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
      </center>
    {!! Form::close() !!}
  </div>
</div>

@endsection