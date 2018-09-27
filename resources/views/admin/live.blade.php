@extends('layouts-admin.master')

@section('title', '- Live Score')
@section('csslink')
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('content')
  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Live Score Peserta Ujian CAT</div>
        <div class="card-body">
          @if(count($ujians)>0)
          @php
            $no = 0;
          @endphp
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nilai TIU</th>
                  <th>Nilai TWK</th>
                  <th>Nilai TKP</th>
                  <th>Nilai Total</th>
                  <th>Waktu Mulai Ujian</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ujians as $ujian)
                @php
                  $jawaban_user = explode(',',$ujian->jawaban);
                  $kunci = explode(',',$ujian->kunci);

                  $tiu=0;
                  $twk=0;
                  $tkp=0;

                  for ($i = 0; $i < 100 ; $i++) { 
                    if ($i < 30) {
                      if ($jawaban_user[$i] == $kunci[$i]){
                        $tiu+=5;
                      } 
                    }
                    else if ($i > 29 && $i < 65) {
                      if ($jawaban_user[$i] == $kunci[$i]){
                        $twk+=5;
                      }
                    }
                    else if ($i > 64 && $i < 100) {
                      $kunci_tkp = $kunci[$i];
                      for ($j = 0; $j < 5; $j++)
                      {
                        if($jawaban_user[$i] == $kunci_tkp[$j])
                        {
                          $tkp+=($j+1);
                        }
                      }    
                    }
                  }
                  $ujian->tiu = $tiu;
                  $ujian->twk = $twk;
                  $ujian->tkp = $tkp;
                @endphp
                <tr>
                  <td>{{$no += 1}}</td>
                  <td>{{$ujian->user->name}}</td>
                  <td>{{$ujian->tiu}}</td>
                  <td>{{$ujian->twk}}</td>
                  <td>{{$ujian->tkp}}</td>
                  <td>{{$ujian->twk + $ujian->tiu + $ujian->tkp}}</td>
                  <td>{{$ujian->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @else 
      <h5 class="text-center">Tidak ada peserta yang melakukan ujian</h5>
      </div>
      @endif
@endsection

@section('jscript')

  <!-- Page level plugin JavaScript-->
  <script src="/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for this page-->
  <script src="/js/sb-admin-datatables.min.js"></script>
  <script src="/js/ellipsis.js"></script>

@endsection

