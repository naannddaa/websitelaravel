@extends('admin.layout.main')
@section('title', 'Penduduk')
@section('konten')
@include('sweetalert::alert')
@php
    $no_kk = request('nokk');
@endphp

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

      <!-- Tombol Tambah -->
      <div class="pb-3 text-end">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-person-check-fill"></i> Tambah Anggota Keluarga
        </a>
      </div>

      <!-- Modal Tambah/Edit -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fs-5" id="exampleModalLabel">Tambah Anggota Keluarga</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="anggotaForm" action="{{ url('admin/master_penduduk/masuk') }}" method="POST">
                @csrf
                <input type="hidden" name="no_kk" value="{{ $no_kk }}">
                <input type="hidden" name="_method" id="formMethod" value="POST">

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" name="nik" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap"  required>
                </div>

                <div class="mb-3">
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
                <div class="mb-3">
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
                <div class="mb-3">
                    <label class="form-label">Tanggal Perkawinan</label>
                    <input type="date" class="form-control" name="tanggal_perkawinan">
                </div>

                <div class="mb-3 row">
                    <div class="col">
                        <label class="form-label">Status Keluarga</label>
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
                <div class="mb-3 row">
                <div class="col">
                    <label class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah" required>
                </div>
                <div class="col">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu" required>
                </div>
              </form>
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" form="anggotaForm">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Tabel Anggota Keluarga -->
      <div class="table-responsive">
        <table class="table">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>NO KK</th>
              <th>NIK</th>
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
              <td>{{ $loop->iteration }}</td>
              <td>{{ $a->no_kk }}</td>
              <td>{{ $a->nik }}</td>
              <td>{{ $a->nama_lengkap }}</td>
              <td>{{ $a->tempat_lahir }}</td>
              <td>{{ $a->tanggal_lahir }}</td>
              <td>{{ $a->status_keluarga }}</td>
              <td>
                <!-- Tombol Edit -->
                <a href="#" class="btn btn-warning btn-sm btn-edit"
                   data-nik="{{ $a->nik }}"
                   data-nama_lengkap="{{ $a->nama_lengkap }}"
                   data-tempat_lahir="{{ $a->tempat_lahir }}"
                   data-tanggal_lahir="{{ $a->tanggal_lahir }}"
                   data-jenis_kelamin="{{ $a->jenis_kelamin }}"
                   data-agama="{{ $a->agama }}"
                   data-pendidikan="{{ $a->pendidikan }}"
                   data-pekerjaan="{{ $a->pekerjaan }}"
                   data-golongan_darah="{{ $a->golongan_darah }}"
                   data-status_perkawinan="{{ $a->status_perkawinan }}"
                   data-tanggal_perkawinan="{{ $a->tanggal_perkawinan }}"
                   data-status_keluarga="{{ $a->status_keluarga }}"
                   data-kewarganegaraan="{{ $a->kewarganegaraan }}"
                   data-no_paspor="{{ $a->no_paspor }}"
                   data-no_kitap="{{ $a->no_kitap }}"
                   data-nama_ayah="{{ $a->nama_ayah }}"
                   data-nama_ibu="{{ $a->nama_ibu }}">
                   <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Tombol Hapus -->
                <a href="#" data-id="{{ $a->nik }}" class="btn btn-danger btn-sm delete">
                  <i class="bi bi-trash-fill"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-3">
        {{ $master_penduduk->links() }}
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.6.3.slim.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $('.btn-edit').click(function () {
    const data = $(this).data();

    $('#exampleModalLabel').text('Edit Anggota Keluarga');
    $('#anggotaForm').attr('action', '/admin/master_penduduk/' + data.nik);
    $('#formMethod').val('PUT');
    
    $('#anggota_nik').val(data.nik);
    $('[name="nik"]').val(data.nik).prop('readonly', true);
    $('[name="nama_lengkap"]').val(data.nama_lengkap);
    $('[name="tempat_lahir"]').val(data.tempat_lahir);
    $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
    $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
    $('[name="agama"]').val(data.agama);
    $('[name="pendidikan"]').val(data.pendidikan);
    $('[name="pekerjaan"]').val(data.pekerjaan);
    $('[name="golongan_darah"]').val(data.golongan_darah);
    $('[name="status_perkawinan"]').val(data.status_perkawinan);
    $('[name="tanggal_perkawinan"]').val(data.tanggal_perkawinan);
    $('[name="status_keluarga"]').val(data.status_keluarga);
    $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
    $('[name="no_paspor"]').val(data.no_paspor);
    $('[name="no_kitap"]').val(data.no_kitap);
    $('[name="nama_ayah"]').val(data.nama_ayah);
    $('[name="nama_ibu"]').val(data.nama_ibu);

    $('#exampleModal').modal('show');
  });

  $('#exampleModal').on('hidden.bs.modal', function () {
    $('#anggotaForm')[0].reset();
    $('#formMethod').val('POST');
    $('#anggotaForm').attr('action', '/admin/master_penduduk/masuk');
    $('#exampleModalLabel').text('Tambah Anggota Keluarga');
    $('[name="nik"]').prop('readonly', false);
  });

    $('.delete').click(function() {
      var nik = $(this).attr('data-id');
      swal({
        title: "Apakah Anda Yakin?",
        text: "Jika anda ingin menghapus NIK " + nik + ", maka datanya akan hilang.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          window.location = "/master_penduduk/" + nik;
        } else {
          swal("Data tidak jadi dihapus.");
        }
      });
    });
  </script>
</body>
@endsection
