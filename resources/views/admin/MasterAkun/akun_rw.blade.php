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

{{-- form searc --}}
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
            @foreach ($master_akun as $a)
            @if (is_null($a->rt))  {{-- Jika RTnull, tampilkan data --}}
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->nik}}</td>
                <td>{{$a->nama}}</td>
                <td>{{$a->no_hp}}</td>
                <td>{{$a->rw}}</td>
              <td>
                <button type="button" data-bs-toggle="modal" href="#"
                    data-bs-target="#modaledit-{{ $a->id }}"app
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
        {{-- akunrtcreate berdasarkan yang diroute store --}}
        <form action="" method="POST">
            @csrf
        <div class="col-12">
            <label class="form-label">NIK</label>
            <input type="text" class="form-control" name="nik" required>
        </div>
        <div class="col-12">
            <label class="form-label">Nama Ketua RW</label>
            <input type="text" class="form-control" name="nama"  required>
        </div>
        <div class="col-12">
            <label class="form-label">No HP</label>
            <input type="text" class="form-control" name="no_hp"  required>
        </div>
        <div class="col">
            <label class="form-label">RW</label>
          <input type="text" class="form-control" name="rw" required>
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


{{-- start modal edit --}}
@foreach ($master_akun as $data)
        <div class="modal fade" id="modaledit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog">
                <form  action="/akun_rt/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Akun Ketua RW</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" hidden>
                                <label>ID</label>
                                <input type="text" class="form-control" placeholder="id" name="id"
                                    value="{{ $data->id }}">
                            </div>
                            <div class="col-12">
                                <label>NIK</label>
                                <input type="text" class="form-control" placeholder="nik" name="nik"
                                    value="{{ $data->nik }}">
                                @error('nik')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label>Nama Ketua RW</label>
                                <input type="text" class="form-control" placeholder="nama" name="nama"
                                    value="{{ $data->nama }}">
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label>No HP</label>
                                <input type="text" class="form-control" placeholder="nohp" name="no_hp"
                                    value="{{ $data->nik }}">
                                @error('no hp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>RW</label>
                                <input type="text" class="form-control" placeholder="rw" name="rw"
                                    value="{{ $data->rw }}">
                                @error('rw  ')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                        </div>
                        </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
    {{-- end --}}
{{-- end modal edit --}}


@endsection
