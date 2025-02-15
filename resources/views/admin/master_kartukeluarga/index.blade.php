@extends('admin.layout.main')
@section('konten')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

          <div class="pb-3" style="text-align:right;">
          <a href="/master_kartukeluarga/tambah" class="btn btn-primary">+ Tambah Data</a>
          </div>
        </div>
        <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('master_kartukeluarga') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
      </form>
    </div>
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
                  <a href="/master_kartukeluarga/{{$a->no_kk}}/edit" class="btn btn-warning btn-sm left" title="Edit Data">
                      <i class="bi bi-pencil"></i>
                  </a>

                  <!-- Tombol Hapus -->
                  <a href="#" data-id="{{$a->no_kk}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                      <i class="bi bi-trash"></i>
                  </a>

                  <!-- Tombol Tambah -->
                  <a href="/master_penduduk" class="btn btn-success btn-sm right" title="Tambah Data">
                      <i class="bi bi-plus-circle"></i>
                  </a>
              </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          {{$master_kartukeluarga->links()}}
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
     $('.delete').click(function() {
        var master_kartukeluargano_kk = $(this).attr('data-id');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Jika anda ingin menghapus baris No kartu keluarga " + master_kartukeluargano_kk + " maka akan hilang",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/master_kartukeluarga/" + master_kartukeluargano_kk + ""
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
