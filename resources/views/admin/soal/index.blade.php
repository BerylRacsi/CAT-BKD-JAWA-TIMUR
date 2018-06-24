@extends('layouts-admin.master')

@section('title', '- Soal')

@section('content')

      <div class="card mb-3">
        <div class="card-header">
          <a class="btn btn-success float-right btn-sm" href="{{ url('/admin/soal/create') }}"><i class="fa fa-plus-circle"></i> Tambah Soal</a>
          <i class="fa fa-table"></i> Daftar Soal Ujian CAT</div>
        <div class="card-body">
      
        @if(count($soals)>1)
      
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Deskripsi</th>
                  <th>Kategori</th>
                  <th>Opsi 1</th>
                  <th>Opsi 2</th>
                  <th>Opsi 3</th>
                  <th>Opsi 4</th>
                  <th>Kunci</th>
                  <th>PATH Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($soals as $soal)
                <tr>
                  <td>{{$soal->id}}</td>
                  <td>{{$soal->deskripsi}}</td>
                  <td>{{$soal->kategori}}</td>
                  <td>{{$soal->opsi1}}</td>
                  <td>{{$soal->opsi2}}</td>
                  <td>{{$soal->opsi3}}</td>
                  <td>{{$soal->opsi4}}</td>
                  <td>{{$soal->jawaban}}</td>
                  <td>{{$soal->image}}</td>
                  <td>
                    <a class="btn btn-sm btn-warning btn-block" href="/admin/soal/{{$soal->id}}/edit">Edit</a>
                    <br>
                    {!!Form::open(['action' => ['SoalController@destroy',$soal->id],'method' => 'POST']) !!}
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
        <div class="card-footer small text-muted">Diupdate {{$soal->created_at}}</div>
      @else 
      <h5 class="text-center">Tidak ada soal, tekan tombol Tambah Soal untuk menambah soal</h5>   

      </div>


  @endif

@endsection

@section('jscript')
<script src="/js/ellipsis.js"></script>
@endsection