@extends('admin.layout.main')
@section('konten')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kartu Keluarga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            color: #dc3545;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #b02a37;
        }

        @media (max-width: 576px) {
            .card {
                padding: 15px;
            }
        }
      
    </style>
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="text-primary">Data Anggota Keluarga</h6>
          <div class="pb-3" style="text-align:right;">
          <a href="/master_penduduk/tambah" class="btn btn-primary">+ Tambah Data</a>
          </div>
        </div>
        <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('master_penduduk') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
  </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>No Kk</th>
                <th>Nik</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Golongan Darah</th>
                <th>Status Perkawinan</th>
                <th>Tanggal Perkawinan</th>
                <th>Status Keluarga</th>
                <th>Kewarganegaraan</th>
                <th>No Paspor</th>
                <th>No Kitap</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
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
                <td>{{$a->jenis_kelamin}}</td>
                <td>{{$a->tempat_lahir}}</td>
                <td>{{$a->tanggal_lahir}}</td>
                <td>{{$a->agama}}</td>
                <td>{{$a->pendidikan}}</td>
                <td>{{$a->pekerjaan}}</td>
                <td>{{$a->golongan_darah}}</td>
                <td>{{$a->status_perkawinan}}</td>
                <td>{{$a->tanggal_perkawinan}}</td>
                <td>{{$a->status_keluarga}}</td>
                <td>{{$a->kewarganegaraan}}</td>
                <td>{{$a->no_paspor}}</td>
                <td>{{$a->no_kitap}}</td>
                <td>{{$a->nama_ayah}}</td>
                <td>{{$a->nama_ibu}}</td>
                <td>
                  <!-- Tombol Edit -->
                  <a href="/master_penduduk/{{$a->nik}}/edit" class="btn btn-warning btn-sm left" title="Edit Data">
                      <i class="bi bi-pencil"></i>
                  </a>
              
                  <!-- Tombol Hapus -->
                  <a href="#" data-id="{{$a->nik}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                      <i class="bi bi-trash"></i>
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
