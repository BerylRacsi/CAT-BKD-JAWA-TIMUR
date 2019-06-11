@extends('layouts.app')

@section('content')

    <div class="container p-3 mx-auto flex-column text-center" style="max-width: 42em; margin-top: 2rem">
 
    <img class="mb-4" src="{{ asset('logo.png') }}" alt="Logo-Jatim" width="113" height="158">

      <main role="main" class="inner cover">
        <h1 >Selamat Datang di CAT BKD</h1>
        <p class="lead">Computer Assisted Test ini dipersembahkan oleh Badan Kepegawaian Daerah Provinsi Jawa Timur untuk dipergunakan sebagai Tes Kompetensi Dasar (TKD) secara online.</p><br>
        @if(Auth::guest())
        <p class="lead">
          <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary mr-sm-1">Sign in</a>
          <a href="{{ route('register') }}" class="btn btn-lg btn-outline-secondary ml-sm-1">Register</a>
        </p>
        @endif
      </main>

    
    </div>
@endsection