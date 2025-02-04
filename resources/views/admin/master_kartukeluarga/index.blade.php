<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kartu Keluarga</title>
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
    <div class="container mt-5">
      <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="text-primary">Data Kartu Keluarga</h6>
          <a href="/master_kartukeluarga/tambah" class="btn btn-success">+ Tambah Data</a>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>No Kk</th>
                <th>Alamat</th>
                <th>RT</th>
                <th>RW</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Kode Pos</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($master_kartukeluarga as $a)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->no_kk}}</td>
                <td>{{$a->alamat}}</td>
                <td>{{$a->rt}}</td>
                <td>{{$a->rw}}</td>
                <td>{{$a->desa}}</td>
                <td>{{$a->kecamatan}}</td>
                <td>{{$a->kode_pos}}</td>
                <td>{{$a->kabupaten}}</td>
                <td>{{$a->provinsi}}</td>
                <td>{{$a->tanggal_dibuat}}</td>
                <td>
                  <a href="/master_kartukeluarga/{{$a->no_kk}}/edit" class="btn btn-warning btn-sm left">Edit</a>
                  <a href="#" data-id="{{$a->no_kk}}" class="btn btn-danger btn-sm delete right">Hapus</a>
                
                   
                 
                
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