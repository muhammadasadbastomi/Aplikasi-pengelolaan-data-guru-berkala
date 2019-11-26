@extends('layouts.admin')
@section('content')    
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">

      </div>
    </div>
    <div class="container-fluid mt--9">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" style="padding:10px;">
            <div class="card-header border-0">
              <h3 class="mb-0">Tabel Data</h3>
              <div class="text-right">
              <button class="btn btn-icon btn-sm btn-outline-info" type="button">
	            <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                <span class="btn-inner--text">Cetak Laporan</span>
              </button>
              <button class="btn btn-icon btn-sm btn-outline-primary" type="button">
	            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">Tambah Data</span>
              </button>
              </div>
            </div>
            <div class="table-responsive">
              <table id="datatable" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">npsn</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No SK</th>
                    <th scope="col">Status Pemilik</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                   <td>1213141212121</td>
                    <td>
                      SMAN 2 BANJARBARU
                    </td>
                    <td>
                      Kemendik/1212/213/1981
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> Negeri
                      </span>
                    </td>
                    <td>
                    <button class="btn btn-sm  btn-outline-success" type="button">
	                    <span class="btn-inner--icon">detail</span>
                    </button>
                    <button class="btn btn-sm  btn-outline-primary" type="button">
	                    <span class="btn-inner--icon">edit</span>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" type="button">
	                    <span class="btn-inner--icon">hapus</span>
                    </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#datatable').DataTable();
} );
</script>
@endsection