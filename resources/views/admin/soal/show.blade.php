<!DOCTYPE html>
<html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>

</head>
<body>
    <div id="app">
      <center>
      <h1>TAMPILAN SOAL PADA USER</h1>
      <a href="/admin/soal" class="btn btn-primary">Kembali</a>
      </center>
      <br>
    <div class="container p-4">
    <div class="col-10">
        <div class="card text-left">
            <div class="card-body">
              <h5 class="card-title">Soal No. {{$soals->id}}</h5>
              <p class="card-text">Kategori : {{$soals->kategori}}</p>
              <p class="card-text">Sub-Kategori : {{$soals->subkategori}}</p>
            </div>
        </div>
        <br>

        @if($soals->image != NULL)
        <div class="card">
          <img src="{{asset('/storage/img/'.$soals->image)}}" class="img-fluid">
        </div>
        <br>
        @endif

        <div class="card text-left">
          <div class="card-body">
            <p class="card-text">{{$soals->deskripsi}}</p>

              <div class="radio">
                <label><input type="radio" name="optradio" value="A"> A. {{$soals->opsi1}}
                </label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="B"> B. {{$soals->opsi2}}
                </label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="C"> C. {{$soals->opsi3}}
                </label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="D"> D. {{$soals->opsi4}}
                </label>
              </div>
              <div class="radio">
                <label><input type="radio" name="optradio" value="E"> E. {{$soals->opsi5}}
                </label>
              </div>
          </div>{{-- End of card body --}}
        </div>{{-- End of card text left --}}
        <br>
        <br>
      </div>{{-- End of kolom kanan col-8 --}}
        <center>
    </div>
  </div>
    <footer class="border-top" style="padding-top: 2em; padding-bottom: 1em;">
        <div class="container text-center">
          <span class="text-bold">Perencanaan Pengadaan Pengolahan Data & SI - BKD &copy 2018</span>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js" integrity="sha256-ifihHN6L/pNU1ZQikrAb7CnyMBvisKG3SUAab0F3kVU=" crossorigin="anonymous"></script>
    
</body>
</html>
