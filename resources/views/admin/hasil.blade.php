@extends('layouts-admin.master')

@section('title', '- Hasil')

@section('csslink')
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection

@section('content')

  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Hasil Ujian CAT</div>
        <div class="card-body">
        @if(count($hasils)>0)
          @php
            $no = 0;
          @endphp
          <div class="table-responsive">
           <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
				  <th>NIP/NIP PTT PK</th>
                  <th>Nilai TIU</th>
                  <th>Nilai TWK</th>
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
				  <td>{{$hasil->user->email}}</td>
                  <td>{{$hasil->nilaitiu}}</td>
                  <td>{{$hasil->nilaitwk}}</td>
                  <td>{{$hasil->nilaitkp}}</td>
                  <td>{{ $hasil->nilaitwk + $hasil->nilaitiu + $hasil->nilaitkp }}</td>
                  <td>{{ $hasil->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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
  <script src="/js/ellipsis.js"></script>
  
<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"type="text/javascript"></script>


 <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    } );
  </script>
@endsection