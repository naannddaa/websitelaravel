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
            <h2 class="text-start mb-4">Data Anggota Keluarga</h2>
        </div>
        <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('master_penduduk') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
  </div>

{{-- tambahtart s --}}

{{-- tambah data start --}}
<div class="pb-3" style="text-align:right;">

    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >
        <i class="bi bi-person-check-fill"></i>
        Tambah Anggota Keluarga
    </a>
    </div>
{{-- start modal --}}
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Anggota Keluarga</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

    {{-- start field --}}
    <form action="/master_penduduk/tambah" method="POST">
        @csrf



    <div class="col-12">
        <label class="form-label">NIK</label>
        <input type="text" class="form-control" name="nik" required>
    </div>
    <div class="col-12">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap"  required>
    </div>

    <div class="col-12">
        <label class="form-label">Jenis Kelamin</label>
        <select id="jenis_kelamin" class="form-select" name="jenis_kelamin"  required>
            <option selected></option>
            <option>Laki - Laki</option>
            <option>Perempuan</option>
          </select>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" required>
        </div>
        <div class="col">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" required>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Agama</label>
            <select id="agama" class="form-select" name="agama"  required>
                <option selected></option>
                <option>ISLAM</option>
                <option>HINDU</option>
                <option>KRISTEN</option>
                <option>KATHOLIK</option>
                <option>BUDHA</option>
              </select>
        </div>
        <div class="col">
            <label class="form-label">Pendidikan</label>
            <select id="pendidikan" class="form-select" name="pendidikan"  required>
                <option selected></option>
                <option>TIDAK / BELUM SEKOLAH</option>
                <option>BELUM TAMAT SD / SEDERAJAT</option>
                <option>TAMAT SD / SEDERAJAT</option>
                <option>SLTP / SEDERAJAT</option>
                <option>SLTA / SEDERAJAT</option>
                <option>Diploma I / II </option>
                <option>AKADEMI / DIPLOMA III / S.MUDA</option>
                <option>DIPLOMA IV / STRATA I</option>
                <option>STRATA II</option>
                <option>STRATA III</option>
              </select>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Pekerjaan</label>
        <input type="text" class="form-control" name="pekerjaan"  required>
    </div>


    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Golongan Darah</label>
            <select id="golongan_darah" class="form-select" name="golongan_darah"  required>
                <option selected></option>
                <option>A</option>
                <option>B</option>
                <option>AB</option>
                <option>O</option>
              </select>
        </div>
        <div class="col">
            <label class="form-label">Status Perkawinan</label>
            <select id="status_perkawinan " class="form-select" name="status_perkawinan"  required>
                <option selected></option>
                <option>BELUM KAWIN</option>
                <option>KAWIN</option>
                <option>CERAI HIDUP</option>
                <option>CERAI MATI</option>
              </select>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Tanggal Perkawinan</label>
        <input type="date" class="form-control" name="tanggal_perkawinan">
    </div>

    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Status Hubungan Keluarga</label>
            <select id="status_keluarga" class="form-select" name="status_keluarga"  required>
                <option selected></option>
                <option>KEPALA KELUARGA </option>
                <option>SUAMI</option>
                <option>ISTRI</option>
                <option>ANAK</option>
                <option>MENANTU</option>
                <option>ORANG TUA</option>
                <option>MERTUA</option>
                <option>PEMBANTU</option>
                <option>FAMILI LAIN</option>
              </select>
        </div>
        <div class="col">
            <label class="form-label">Kewarganegaraan</label>
            <select id="kewarganegaraan" class="form-select" name="kewarganegaraan"  required>
                <option selected></option>
                <option>WNI</option>
                <option>WNA</option>
              </select>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Nomer Paspor</label>
          <input type="text" class="form-control" name="no_paspor">
        </div>
        <div class="col">
            <label class="form-label">Nomer KITAP</label>
          <input type="text" class="form-control" name="no_kitap">
        </div>
    </div>
    <div class="row g-5">
    <div class="col">
        <label class="form-label">Nama Ayah</label>
        <input type="text" class="form-control" name="nama_ayah" required>
    </div>
    <div class="col">
        <label class="form-label">Nama Ibu</label>
        <input type="text" class="form-control" name="nama_ibu" required>
    </div>
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
{{-- end tambah --}}
  <div class="table-responsive">
    <table class="table">
      <thead class="table-primary">
        <tr>
              <tr>
                <th>No</th>
                <th>No Kk</th>
                <th>Nik</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status Keluarga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($master_penduduk as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->no_kk}}</td>
                <td>{{$a->nik}}</td>
                <td>{{$a->nama_lengkap}}</td>
                <td>{{$a->tempat_lahir}}</td>
                <td>{{$a->tanggal_lahir}}</td>
                <td>{{$a->status_keluarga}}</td>
                <td>
                  <!-- Tombol Edit -->
                  <a href="/master_penduduk/{{$a->nik}}/edit" class="btn btn-warning btn-sm left" title="Edit Data">
                    <i class="bi bi-pencil-square"></i>
                  </a>

                  <!-- Tombol Hapus -->
                  <a href="#" data-id="{{$a->nik}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                    <i class="bi bi-trash-fill"></i>
                  </a>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          {{$master_penduduk->links()}}
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
     $('.delete').click(function() {
        var master_penduduknik = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Jika anda ingin menghapus baris Nik Anggota Keluarga " + master_penduduknik + " maka akan hilang",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/master_penduduk/" + master_penduduknik + ""
                    swal("Berhasil!! Anda sudah menghapusnya!!", {
                        icon: "Berhasil!!",
                    });
                } else {
                    swal("Tidak ingin menghapusnya?");
                }
            });
    });
</script>


  </body>
</html>
@endsection
