@extends('layouts-admin.master')

@section('title', '- Hasil')

@section('csslink')
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('content')

  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Hasil Ujian CAT</div>
        <div class="card-body">
        @if(count($hasils)>0)
          @php
            $no = 0;
          @endphp
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nilai TWK</th>
                  <th>Nilai TIU</th>
                  <th>Nilai TKP</th>
                  <th>Nilai Total</th>
                  <th>Waktu Selesai Ujian</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hasils as $hasil)
                <tr>
                  <td>{{$no += 1}}</td>
                  <td>{{$hasil->user->name}}</td>
                  <td>{{$hasil->nilaitwk}}</td>
                  <td>{{$hasil->nilaitiu}}</td>
                  <td>{{$hasil->nilaitkp}}</td>
                  <td>{{ $hasil->nilaitwk + $hasil->nilaitiu + $hasil->nilaitkp }}</td>
                  <td>{{ $hasil->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Diupdate yesterday at 11:59 PM</div>
        @else
        <h5 class="text-center">Tidak ada hasil ujian</h5>
      </div>
        @endif
@endsection

@section('jscript')

  <!-- Page level plugin JavaScript-->
  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for this page-->
  <script src="/js/sb-admin-datatables.min.js"></script>
  <script src="/js/sb-admin-charts.min.js"></script>

@endsection