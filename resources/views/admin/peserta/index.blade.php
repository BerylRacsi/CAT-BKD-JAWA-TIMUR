@extends('layouts-admin.master')

@section('title', '- Peserta')

@section('csslink')
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@endsection


@section('content')
  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Peserta Ujian CAT
        </div>
        <div class="card-body">

        @if(count($users)>0)
          @php
            $no = 0;
          @endphp

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Tgl Daftar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{$no += 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>
                    <a type="button" class="btn btn-warning btn-sm btn-block" href="/admin/peserta/{{$user->id}}/edit">Edit</a>
                    {!!Form::open(['action' => ['PesertaController@destroy',$user->id],'method' => 'POST']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm btn-block'])}}
                    {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Diupdate </div>
        @else
        <h5 class="text-center">Tidak ada peserta</h5>
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