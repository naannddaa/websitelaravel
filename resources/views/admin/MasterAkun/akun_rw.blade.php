@extends('admin.layout.main')
@section('konten')
@include('sweetalert::alert')
<!doctype html>
<html lang="en">
{{-- header --}}
<body class="bg-light">
    <div class="container-scroller">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-start mb-4">Akun Rukun Warga</h2>
            </div>
{{-- end header --}}

{{-- form search --}}
<div class="pb-3">
    <form class="d-flex" action="{{ url('akunrw') }}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </form>
  </div>
{{-- end search --}}
{{-- tambah data start --}}
<div class="pb-3" style="text-align:right;">
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" >+ Tambah Data</a>
</div>
{{-- end tambah data --}}


{{-- display data start --}}
<div class="table-responsive">
    <table class="table">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Ketua Rukun Warga</th>
                <th>Nomer Handphone</th>
                <th>RW</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataakunrw as $a)
            @if (is_null($a->rt))  {{-- Jika RTnull, tampilkan data --}}
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->nik}}</td>
                <td>{{$a->nama}}</td>
                <td>{{$a->no_hp}}</td>
                <td>{{$a->rw}}</td>
              <td>
                <button type="button" data-bs-toggle="modal" href="#"
                data-bs-target="#modaledit-{{ $a->nik }}"
                class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i>
            </button>
                 <!-- Tombol Hapus -->
                 <a href="#" data-id="{{$a->no_kk}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                    <i class="bi bi-trash-fill"></i>
                  </a>
            </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
{{-- end data start --}}


{{-- start modal tambah data --}}
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Akun Ketua RW</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {{-- start field --}}
        <form action="{{ route('akunrw.store') }}" method="POST">
            @csrf
            <div class="col-12">
                <label class="form-label" hidden>ID Akun RW</label>
                <input type="text" class="form-control" name='id_rtrw' id="id_rtrw" value="{{$id_rtrw}}" readonly hidden>
            </div>
            <div class="col-12">
                <label class="form-label">Nama Ketua RW</label>
                <select type="text" class="form-control" name="nama" id="nama" required>
                <option value="">Pilih Nama</option>
                @foreach ($data as $value)
                <option
                    value="{{ $value->nama_lengkap }}"
                    data-nik="{{ $value->nik }}"
                    data-rw="{{ $value->rw }}">
                    {{ $value->nama_lengkap }}
                </option>
                @endforeach
                </select>
            </div>
            <div class="col-12 mt-2">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" name="no_hp" id="no_hp" required>
            </div>
        <div class="col-12 mt-2">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" readonly>
        </div>
        <div class="col mt-2">
            <label class="form-label">RW</label>
          <input type="text" class="form-control" name="rw" id="rw" readonly>
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
{{-- end modal tambah data --}}

{{-- jquery start --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event ketika nama dipilih
        $('#nama').change(function() {
            var selectedOption = $(this).find('option:selected');
            var nik = selectedOption.data('nik'); // Ambil nilai NIK dari data-nik
            var rw = selectedOption.data('rw');   // Ambil nilai RW dari data-rw

            if (nik) {
                // Isi kolom NIK, RT, dan RW dengan nilai yang sesuai
                $('#nik').val(nik);
                $('#rw').val(rw);
            } else {
                // Kosongkan kolom jika tidak ada data
                $('#nik').val('');
                $('#rw').val('');
            }
        });
    });
</script>
{{-- jquery end --}}

{{-- start modal edit --}}
@foreach ($dataakunrw as $data)
<div class="modal fade" id="modaledit-{{ $data->nik }}" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('akunrw.update', $data->nik) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Akun Ketua RW</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{ $data->nik }}" disabled>
                    </div>
                    <div class="col-12">
                        <label>Nama Ketua RW</label>
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="col-12">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $data->no_hp }}">
                    </div>
                    <div class="col-12">
                        <label>RW</label>
                        <input type="text" class="form-control" name="rw" value="{{ $data->rw }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
{{-- end modal edit --}}

{{-- delete --}}
<script>
    $('.delete').click(function() {
        var id_rtrw = $(this).attr('data-id');
        swal({
                title: "Hapus Akun",
                text: "Jika anda ingin menghapus akun Ketua RT " + id_rtrw + " maka akan hilang",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/akunr/" + id_rtrw + ""
                } else {
                    // swal("Tidak ingin menghapusnya?");
                }
            });
    });
</script>
{{-- delete --}}
</div>
</div>
</body>
</html>
@endsection
