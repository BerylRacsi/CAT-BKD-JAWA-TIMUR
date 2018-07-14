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
            <div class="btn btn-danger btn-block disabled">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
      </div>
      <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-5">
          {{Form::label('email' , 'Email Peserta')}}
          {{Form::email('email' , '' ,['class' => 'form-control' , 'placeholder' => 'Email Peserta' , 'required'])}}
          @if ($errors->has('email'))
            <div class="btn btn-danger btn-block disabled">
              {{ $errors->first('email') }}
            </div>
          @endif
        </div>
      </div>
      <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="col-5">
          {{Form::label('password' , 'Password')}}
          {{Form::text('password' , '' ,['class' => 'form-control','placeholder' => 'Password Peserta' , 'required'])}}
        @if ($errors->has('password'))
          <div class="btn btn-danger btn-block disabled">
            {{ $errors->first('password') }}
          </div>
        @endif
        </div>
      </div>
      <br>
      <center>
      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
      </center>
    {!! Form::close() !!}
  </div>
</div>

@endsection