<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kartu Keluarga</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

@include('sweetalert::alert')
@extends('layout.template')
@section('konten')


    {{-- Start: Modal Create Data --}}
    <body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="{{ route('kartukeluarga.store') }}">
                        @csrf
                        <div class="col-12">
                            <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" name="no_kk" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="rt" class="form-label">RT</label>
                            <input type="text" name="rt" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="rw" class="form-label">RW</label>
                            <input type="text" name="rw" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="kode_pos" class="form-label">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="desa" class="form-label">Desa</label>
                            <input type="text" name="desa" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="kabupaten" class="form-label">Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                            <input type="date" name="tanggal_dibuat" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End: Modal Create Data --}}


    {{-- view start --}}
    <div class="container my-3">
        <h2 class="text-start mb-4">Kartu Keluarga</h2>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah Data</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor KK</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->no_kk }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->rt }}</td>
                    <td>{{ $item->rw }}</td>
                    <td>

                        {{-- edit --}}
                        <a href="#" class="btn btn-warning btn-sm">Edit
                            <body>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kartu Keluarga</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <form class="row g-3" method="POST" action="{{ route('kartukeluarga.store') }}">
                                                    @csrf
                                                    <div class="col-12">
                                                        <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                                                        <input type="text" name="no_kk" class="form-control" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="rt" class="form-label">RT</label>
                                                        <input type="text" name="rt" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="rw" class="form-label">RW</label>
                                                        <input type="text" name="rw" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="kode_pos" class="form-label">Kode Pos</label>
                                                        <input type="text" name="kode_pos" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="desa" class="form-label">Desa</label>
                                                        <input type="text" name="desa" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                        <input type="text" name="kecamatan" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                                        <input type="text" name="kabupaten" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="provinsi" class="form-label">Provinsi</label>
                                                        <input type="text" name="provinsi" class="form-control" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="tanggal_dibuat" class="form-label">Tanggal Dibuat</label>
                                                        <input type="date" name="tanggal_dibuat" class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>




                        {{-- edit end --}}
                        <form class="d-inline" method="POST" action="{{ route('kartukeluarga.destroy', $item->no_kk) }}" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- end start --}}



{{-- start edit --}}

{{-- end edit --}}



</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>
@endsection
