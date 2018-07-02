@extends('layouts-admin.master')

@section('csslink')
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('title', '- Peserta')

@section('content')

  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <button type="button" class="btn btn-success float-right btn-sm" data-toggle="modal" data-target="#tambahModal">Tambah Peserta</button>
          <i class="fa fa-table"></i> Daftar Peserta Ujian CAT
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Telpon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Telpon</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>5115100</td>
                  <td>Racsi Beryl W</td>
                  <td>berylracsi@gmail.com</td>
                  <td>Keputih GG 1 C</td>
                  <td>0892837232</td>
                  <td>
                    <a type="button" class="btn btn-warning btn-sm" href="/peserta/1/edit">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPeserta">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Diupdate yesterday at 11:59 PM</div>
      </div>

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