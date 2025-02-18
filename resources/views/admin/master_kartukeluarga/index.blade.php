@extends('admin.layout.main')
@section('konten')
@include('sweetalert::alert')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{-- modal --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- end modal --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
      .table-container {
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .btn {
        border-radius: 5px;
      }
      thead th {
        text-align: center;
      }
      tbody td {
        text-align: center;
        vertical-align: middle;
      }
    </style>
  </head>
  <body class="bg-light">
    <div class="container-scroller">
      <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-start mb-4">Data Kepala Keluarga</h2>
        </div>
        <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('master_kartukeluarga') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
    </div>


{{-- tambah data start --}}
    <div class="pb-3" style="text-align:right;">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Tambah Data</a>
        </div>


{{-- start modal --}}
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kepala Keluarga</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {{-- start field --}}
        <form action="/master_kartukeluarga/masuk" method="POST">
            @csrf
        <div class="col-12">
            <label class="form-label">Nomor Kartu Keluarga</label>
            <input type="text" class="form-control" name="no_kk"  required>
        </div>
        <div class="col-12">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" required>
        </div>
        <div class="col-12">
            <label class="form-label">Nama Kepala Keluarga</label>
            <input type="text" class="form-control" name="nama_lengkap"  required>
        </div>
        <div class="col-12">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">RT</label>
              <input type="text" class="form-control" name="rt" required>
            </div>
            <div class="col">
                <label class="form-label">RW</label>
              <input type="text" class="form-control" name="rw" required>
            </div>
            <div class="col">
                <label class="form-label">Kode Pos</label>
                <input type="text" class="form-control" name="kode_pos"  required>
            </div>
        </div>
        <div class="row g-5">
        <div class="col">
            <label class="form-label">Desa</label>
            <input type="text" class="form-control" name="desa" required>
        </div>
        <div class="col">
            <label class="form-label">Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan" required>
        </div>
    </div>
    <div class="row g-5">
        <div class="col">
            <label class="form-label">Kabupaten</label>
            <input type="text" class="form-control" name="kabupaten"  required>
        </div>
        <div class="col">
            <label class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" required>
        </div>
    </div>
        <div class="col-12">
            <label class="form-label">Tanggal Dibuat</label>
            <input type="date" class="form-control" name="tanggal_dibuat" required>
        </div>
        {{-- end field --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
{{-- end modal dan tambah data --}}



{{-- start edit --}}
{{-- start modal --}}
  <!-- Modal -->
  <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kepala Keluarga</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {{-- start field --}}
        <form action="/master_kartukeluarga/masuk" method="POST">
            @csrf
        <div class="col-12">
            <label class="form-label">Nomor Kartu Keluarga</label>
            <input type="text" class="form-control" name="no_kk"  required>
        </div>
        <div class="col-12">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" required>
        </div>
        <div class="col-12">
            <label class="form-label">Nama Kepala Keluarga</label>
            <input type="text" class="form-control" name="nama_lengkap"  required>
        </div>
        <div class="col-12">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
        </div>
        <div class="mb-3 row">
            <div class="col">
                <label class="form-label">RT</label>
              <input type="text" class="form-control" name="rt" required>
            </div>
            <div class="col">
                <label class="form-label">RW</label>
              <input type="text" class="form-control" name="rw" required>
            </div>
            <div class="col">
                <label class="form-label">Kode Pos</label>
                <input type="text" class="form-control" name="kode_pos"  required>
            </div>
        </div>
        <div class="row g-5">
        <div class="col">
            <label class="form-label">Desa</label>
            <input type="text" class="form-control" name="desa" required>
        </div>
        <div class="col">
            <label class="form-label">Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan" required>
        </div>
    </div>
    <div class="row g-5">
        <div class="col">
            <label class="form-label">Kabupaten</label>
            <input type="text" class="form-control" name="kabupaten"  required>
        </div>
        <div class="col">
            <label class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" required>
        </div>
    </div>
        <div class="col-12">
            <label class="form-label">Tanggal Dibuat</label>
            <input type="date" class="form-control" name="tanggal_dibuat" required>
        </div>
        {{-- end field --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
{{-- end edit --}}





{{-- start display data --}}
        <div class="table-responsive">
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>No Kartu Keluarga</th>
                <th>Nama Kepala Keluarga</th>
                <th>Alamat</th>
                <th>RW</th>
                <th>RT</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($master_kartukeluarga as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->no_kk}}</td>
                <td>{{$a->nama_lengkap}}</td>
                <td>{{$a->alamat}}</td>
                <td>{{$a->rw}}</td>
                <td>{{$a->rt}}</td>
                <td>
                  <!-- Tombol Edit -->
                  {{-- <a href="/master_kartukeluarga/{{$a->no_kk}}/edit" class="btn btn-warning btn-sm left" title="Edit Data">
                    <i class="bi bi-pencil-square"></i>
                  </a> --}}
                  <a href="/master_kartukeluarga/{{$a->no_kk}}/edit" data-bs-target="#modaledit" class="btn btn-warning btn-sm left" title="Edit Data">
                    <i class="bi bi-pencil-square"></i>
                  </a>


                  <!-- Tombol Hapus -->
                  <a href="#" data-id="{{$a->no_kk}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                    <i class="bi bi-trash-fill"></i>
                  </a>

                  <!-- Tombol Tambah -->
                  <a href='{{ url('/master_penduduk')}}' class="btn btn-success btn-sm right" title="Tambah Data">
                    <i class="bi bi-person-add"></i>
                  </a>
              </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
{{-- end display data --}}


      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
     $('.delete').click(function() {
        var master_kartukeluargano_kk = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Jika anda ingin menghapus No kartu keluarga " + master_kartukeluargano_kk + " maka akan hilang",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/master_kartukeluarga/" + master_kartukeluargano_kk + ""
                    // swal("Berhasil!! Anda sudah menghapusnya!!", {
                    //     icon: "Berhasil!!",
                    // });
                } else {
                    // swal("Tidak ingin menghapusnya?");
                }
            });
    });
</script>
  </body>
</html>

<div class="mt-3">
    {{$master_kartukeluarga->links()}}
  </div>
@endsection
