@extends('layouts.app')

@section('content')
<body class="text-center">

    <div class="container mx-auto flex-column" style="max-width: 42em; padding-top: 3em; padding-bottom: 1.5em;">
 
    <img class="mb-4" src="http://3.bp.blogspot.com/-GsOaw3nGH8Q/VnEWXS6SaJI/AAAAAAAAJFE/DdQhLSnyS48/s1600/logo%2BJawa%2BTimur.png" alt="" width="101" height="142">

      <main role="main" class="inner cover">
        <h2 >Selamat Datang di CAT BKD</h2>
        <p class="lead">Computer Assisted Test ini dipersembahkan oleh Badan Kepegawaian Daerah Jawa Timur bagi masyarakat yang ingin mencoba simulasi tes CPNS secara online dengan bank soal yang terbaru.</p><br>
        <p class="lead">
          <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary mr-sm-1">Sign in</a>
          <a href="{{ route('register') }}" class="btn btn-lg btn-outline-secondary ml-sm-1">Register</a>
        </p>
      </main>

    
    </div>

  </body>
@endsection