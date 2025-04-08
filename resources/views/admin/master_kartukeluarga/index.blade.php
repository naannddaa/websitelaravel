@extends('admin.layout.main')
@section('title', 'Kartu Keluarga')
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
        <a href="#" class="btn btn-primary" id="btnTambah" data-bs-toggle="modal" data-bs-target="#modalKeluarga">+ Tambah Data</a>
    </div>

 <!-- Modal Tambah/Edit -->
<div class="modal fade" id="modalKeluarga" tabindex="-1" aria-labelledby="modalKeluargaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="keluargaForm" method="POST" action="{{ url('admin/master_kartukeluarga/masuk') }}">
  @csrf
  <input type="hidden" name="_method" value="PUT">
 {{-- Digunakan saat edit --}}
  
  <!-- Form input lainnya tetap -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalKeluargaLabel">Tambah Data Kepala Keluarga</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nomor KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" pattern="\d{16}" title="Masukkan 16 digit angka" required>
          </div>
          <div class="mb-3">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" pattern="\d{16}" title="Masukkan 16 digit angka" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Kepala Keluarga</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
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
          <div class="mb-3 row">
            <div class="col">
              <label class="form-label">Desa</label>
              <input type="text" class="form-control" id="desa" name="desa" required>
            </div>
            <div class="col">
              <label class="form-label">Kecamatan</label>
              <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label class="form-label">Kabupaten</label>
              <input type="text" class="form-control" id="kabupaten" name="kabupaten" required>
            </div>
            <div class="col">
              <label class="form-label">Provinsi</label>
              <input type="text" class="form-control" id="provinsi" name="provinsi" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Tanggal Dibuat</label>
            <input type="date" class="form-control" id="tanggal_dibuat" name="tanggal_dibuat" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
        </div>
      </form>
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
                                    data-id="{{ $a->no_kk }}"
                                    data-no_kk="{{ $a->no_kk }}"
                                    data-nik="{{ $a->nik ?? '' }}"
                                    data-nama_lengkap="{{ $a->nama_lengkap ?? '' }}"
                                    data-alamat="{{ $a->alamat }}"
                                    data-rt="{{ $a->rt }}"
                                    data-rw="{{ $a->rw }}"
                                    data-kode_pos="{{ $a->kode_pos }}"
                                    data-desa="{{ $a->desa }}"
                                    data-kecamatan="{{ $a->kecamatan }}"
                                    data-kabupaten="{{ $a->kabupaten }}"
                                    data-provinsi="{{ $a->provinsi }}"
                                    data-tanggal_dibuat="{{ $a->tanggal_dibuat }}">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

        // Notifikasi sukses
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Notifikasi error validasi
        @if ($errors->any())
            let errText = '';
            @foreach ($errors->all() as $error)
                errText += '{{ $error }}\n';
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan!',
                text: errText,
                confirmButtonColor: '#d33',
                didOpen: () => {
                    const icon = document.querySelector('.swal2-icon');
                    if (icon) {
                        icon.style.marginTop = '30px';
                    }
                }
            });
        @endif

        // Konfirmasi Hapus
        $('.delete').click(function (e) {
            e.preventDefault();
            let nama = $(this).data('nama_lengkap');
            let url = $(this).attr('href');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data atas nama " + nama + " akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                didOpen: () => {
                    const icon = document.querySelector('.swal2-icon');
                    if (icon) {
                        icon.style.marginTop = '30px';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });

        // Mode Tambah
        $('#btnTambah').click(function () {
            $('#keluargaForm')[0].reset();
            $('#modalKeluargaLabel').text('Tambah Data Kepala Keluarga');
            $('#keluargaForm').attr('action', '{{ url("admin/master_kartukeluarga/masuk") }}');
            $('#keluargaForm').find('input[name="_method"]').remove();
            $('#no_kk_lama').val('');
        });

        // Mode Edit
        $('.editButton').click(function () {
            let data = $(this).data();
            $('#modalKeluargaLabel').text('Edit Data Kepala Keluarga');
            $('#keluargaForm').attr('action', '{{ url("admin/master_kartukeluarga") }}/' + data.id);
            $('#keluargaForm').find('input[name="_method"]').remove();
            $('#keluargaForm').append('<input type="hidden" name="_method" value="PUT">');

            $('#no_kk').val(data.no_kk);
            $('#nik').val(data.nik);
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

            $('#modalKeluarga').modal('show');
        });

    });
</script>



  </body>
</html>

<div class="mt-3">
    {{$master_kartukeluarga->links()}}
  </div>
@endsection
