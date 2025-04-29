@extends('admin.layout.main')
@section('konten')
@section('title', 'Akun RT')

<!doctype html>
<html lang="en">

<body class="bg-light">
    <div class="container-scroller">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-start mb-4">Akun Rukun Tetangga</h2>
            </div>

            {{-- Form Search --}}
            <div class="pb-3">
                <form class="d-flex" action="{{ url('akunrt') }}" method="get">
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>

            {{-- Tambah Data --}}
            <div class="pb-3" style="text-align:right;">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" id="addDataBtn">+ Tambah Data</a>
            </div>

            {{-- Display Data --}}
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Ketua Rukun Tetangga</th>
                            <th>Nomer Handphone</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataakunrt as $a)
                            @if (!is_null($a->rt))
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$a->nik}}</td>
                                    <td>{{$a->nama}}</td>
                                    <td>{{$a->no_hp}}</td>
                                    <td>{{$a->rt}}</td>
                                    <td>{{$a->rw}}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm btn-edit"
                                            data-id_rtrw="{{ $a->id_rtrw }}"
                                            data-nik="{{ $a->nik }}"
                                            data-nama="{{ $a->nama }}"
                                            data-no_hp="{{ $a->no_hp }}"
                                            data-rt="{{ $a->rt }}"
                                            data-rw="{{ $a->rw }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="{{ route('akunrt.destroy', $a->id_rtrw) }}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Modal Tambah/Edit Data --}}
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">Tambah Akun Ketua RT</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="modalForm" action="{{ route('akun.store') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label" hidden>ID Akun RT</label>
                                    <input type="text" class="form-control" name='id_rtrw' id="id_rtrw" value="{{$id_rtrw}}" readonly hidden>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Nama Ketua RT</label>
                                    <select class="form-control" name="nama" id="nama" required>
                                        <option value="">Pilih Nama</option>
                                        @foreach ($data as $value)
                                            <option value="{{ $value->nama_lengkap }}" data-nik="{{ $value->nik }}" data-rt="{{ $value->rt }}" data-rw="{{ $value->rw }}">
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
                                    <input type="text" class="form-control" name="nik" id="nik" required readonly>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <div class="col mt-2">
                                            <label class="form-label">RT</label>
                                            <input type="text" class="form-control" name="rt" id="rt" required>
                                        </div>
                                        <div class="col mt-2">
                                            <label class="form-label">RW</label>
                                            <input type="text" class="form-control" name="rw" id="rw" required>
                                        </div>
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
            </div>


            <!-- Tambahkan jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="{{ asset('js/rt.js') }}"></script>
        </div>
    </div>
</body>
</html>
@endsection
