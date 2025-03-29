@extends('admin.layout.main')
@section('konten')
@include('sweetalert::alert')
<!doctype html>
<html lang="en">

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
        <div class="col-12 mt-3">
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

        <div class="col-12">
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
    </div>


    <div class="col-12">
        <div class="mb-3 row">
            <div class="col">
            <label class="form-label">Desa</label>
            <input type="text" class="form-control" name="desa" required>
        </div>
        <div class="col">
            <label class="form-label">Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan" required>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="mb-3 row">
        <div class="col">
            <label class="form-label">Kabupaten</label>
            <input type="text" class="form-control" name="kabupaten"  required>
        </div>
        <div class="col">
            <label class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" required>
        </div>
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
                            <button class="btn btn-warning btn-sm editButton"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit"
                                        data-id="{{$a->id}}"
                                        data-no_kk="{{$a->no_kk}}"
                                        data-nik="{{$a->nik}}"
                                        data-nama_lengkap="{{$a->nama_lengkap}}"
                                        data-alamat="{{$a->alamat}}"
                                        data-rt="{{$a->rt}}"
                                        data-rw="{{$a->rw}}"
                                        data-kode_pos="{{$a->kode_pos}}"
                                        data-desa="{{$a->desa}}"
                                        data-kecamatan="{{$a->kecamatan}}"
                                        data-kabupaten="{{$a->kabupaten}}"
                                        data-provinsi="{{$a->provinsi}}"
                                        data-tanggal_dibuat="{{$a->tanggal_dibuat}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                          <!-- Tombol Hapus -->
                          <a href="{{ route('kartukeluarga.delete',$a->no_kk) }}" data-nama_lengkap="{{$a->nama_lengkap}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
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
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Kepala Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="/master_kartukeluarga/update" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" required>
                        </div>

                        <div class="mb-3 ">
                            <div class="mb-3 row">
                                <div class="col">
                                    <label class="form-label">RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">RW</label>
                                    <input type="text" class="form-control" id="rw" name="rw" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
                                </div>
                            </div>
                        </div>

                       <div class="mb-3 ">
                            <div class="mb-3 row">
                                <div class="col">
                            <label class="form-label">Desa</label>
                            <input type="text" class="form-control" id="desa" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3 ">
                    <div class="mb-3 row">
                        <div class="col">
                            <label class="form-label">Kabupaten</label>
                            <input type="text" class="form-control" id="kabupaten"  required>
                        </div>
                        <div class="col">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" required>
                        </div>
                    </div>
                </div>
                    <div class="mb-3">
                            <label class="form-label">Tanggal Dibuat</label>
                            <input type="date" class="form-control" id="tanggal_dibuat" required>
                        </div>
                        {{-- end field --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                let data = $(this).data();
                $('#id').val(data.id);
                $('#no_kk').val(data.no_kk);
                $('#nama_lengkap').val(data.nama_lengkap);
                $('#alamat').val(data.alamat);
                $('#rt').val(data.rt);
                $('#rw').val(data.rw);
                $('#kode_pos').val(data.kode_pos);
                $('#desa').val(data.desa);
                $('#kecamatan').val(data.kecamatan);
                $('#kabupaten').val(data.kabupaten);
                $('#provinsi').val(data.provinsi);
                $('#tanggal_dibuat').val(data.tanggal_dibuat);
            });
        });
    </script>

</body>
            </tbody>
          </table>
        </div>
      </div>
    </div>
{{-- end display data --}}


    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
     $('.delete').click(function() {
        var master_kartukeluarganama_lengkap = $(this).attr('data-nama_lengkap');
        swal({
                title: "Apakah Anda Yakin?",
                text: "Jika anda ingin menghapus " + master_kartukeluarganama_lengkap + " maka akan hilang",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/master_kartukeluarga/" + master_kartukeluarganama_lengkap + ""
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
