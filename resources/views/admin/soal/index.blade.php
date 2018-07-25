@extends('layouts-admin.master')

@section('title', '- Soal')

@section('csslink')
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('content')

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Soal Ujian CAT
          <a class="btn btn-success btn-sm float-right" href="{{ route('soal.create') }}"><i class="fa fa-plus-circle"></i> Tambah Soal</a>
        </div>
        <div class="card-body">
      
        @if(count($soals)>0)
          @php
            $no = 0;
          @endphp
      
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Deskripsi</th>
                  <th>Jenis</th>
                  <th>Bidang</th>
                  <th>Subbidang</th>
                  <th>Kesulitan</th>
                  <th>File Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($soals as $soal)
                <tr>
                  <td>{{$no += 1}}</td>
                  <td>{{$soal->deskripsi}}</td>
                  <td>{{$soal->jenis->jenis}}</td>
                  <td>{{$soal->bidang['bidang']}}</td>
                  <td>{{$soal->subbidang->subbidang}}</td>
                  <td>{{$soal->kesulitan->kesulitan}}</td>
                  <td>{{$soal->image}}</td>
                  <td>
                    <a class="btn btn-sm btn-primary btn-block" href="/admin/soal/{{$soal->id}}">Lihat</a>
                    <a class="btn btn-sm btn-warning btn-block" href="/admin/soal/{{$soal->id}}/edit">Edit</a>
                    <br>
                    {!!Form::open(['action' => ['SoalController@destroy',$soal->id],'method' => 'POST']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Hapus',['class' => 'btn btn-danger btn-sm btn-block'])}}
                    {!!Form::close()!!}    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @else 
      <h5 class="text-center">Tidak ada soal, tekan tombol Tambah Soal untuk menambah soal</h5>   
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
  <script src="/js/ellipsis.js"></script>
@endsection