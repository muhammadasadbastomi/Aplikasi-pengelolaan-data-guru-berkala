@extends('layouts.sekolah')
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
              <h3 class="mb-0">Tabel Data Berkala</h3>
              <div class="text-right"> 
              <a href="{{Route('dataBerkalaSekolahCetak')}}" class="btn btn-icon btn-sm btn-outline-info"><span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                <span class="btn-inner--text">Cetak Laporan</span></a>
              </div>
            </div>
            <div class="table-responsive">
              <table id="datatable" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Nomor Keputusan</th>
                    <th scope="col">Gaji Baru</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
 
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

        //fungsi hapus        
        hapus = (uuid, nama) =>{
            let csrf_token=$('meta[name="csrf_token"]').attr('content');
            Swal.fire({
                        title: 'apa anda yakin?',
                        text: " Menghapus  Data permohonan " + nama,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'hapus data',
                        cancelButtonText: 'batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url : "{{ url('/api/data-sekolah')}}" + '/' + uuid,
                                type : "POST",
                                data : {'_method' : 'DELETE', '_token' :csrf_token},
                                success: function (response) {
                                    Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Data Berhasil Dihapus',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            $('#datatable').DataTable().ajax.reload(null, false);
                        },
                    })
                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        Swal.fire(
                        'Dibatalkan',
                        'data batal dihapus',
                        'error'
                        )
                    }
                })
            }

            //fungsi render datatable            
            $(document).ready(function() {
                $('#datatable').DataTable( {
                    responsive: true,
                    processing: true,
                    serverSide: false,
                    searching: true,
                    ajax: {
                        "type": "GET",
                        "url": "{{route('API.data-sekolah.get')}}",
                        "dataSrc": "data",
                        "contentType": "application/json; charset=utf-8",
                        "dataType": "json",
                        "processData": true
                    },
                    columns: [
                        {data: null , render : function ( data, type, row, meta ) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        {"data": "guru.nama"},
                        {"data": "guru.NIP"},
                        {"data": "perihal"},
                        {"data": "no_keputusan"},
                        {data: null , render : function ( data, type, row, meta ) {
                            let gaji = row.gaji_baru;
                           return '<p>Rp.'+ gaji +' </p>'
                        }},
                        {data: null , render : function ( data, type, row, meta ) {
                            let status = row.status;
                            if(status == 1){
                                return '<a class="btn btn-sm btn-success"> Terverifikasi </a>';
                            }else if(status == 2){
                                return '<a class="btn btn-sm btn-warning"> Ditolak </a>';
                            }else{
                                return '<a class="btn btn-sm btn-success"> Terverifikasi </a>';
                            }
                        }},
                    ]
                });
                } );
    </script>
@endsection