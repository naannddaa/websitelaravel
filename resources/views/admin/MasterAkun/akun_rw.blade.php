@extends('admin.layout.main')
@section('konten')
@section('title', 'Akun RW')
<!doctype html>
<html lang="en">

<body class="bg-light">
    <div class="container-scroller">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-start mb-4">Akun Rukun Warga</h2>
            </div>

            {{-- form search --}}
            <div class="pb-3">
                <form class="d-flex" action="{{ url('akunrw') }}" method="get">
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>

            {{-- tambah data --}}
            <div class="pb-3 text-end">
                <button class="btn btn-primary" id="btn-add">+ Tambah Data</button>
            </div>

            {{-- display data --}}
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Ketua Rukun Warga</th>
                            <th>Nomor Handphone</th>
                            <th>RW</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataakunrw as $a)
                            @if (is_null($a->rt))
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->nik }}</td>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->no_hp }}</td>
                                    <td>{{ $a->rw }}</td>
                                    <td>
                                        <button 
                                            class="btn btn-warning btn-sm btn-edit"
                                            data-id_rtrw="{{ $a->id_rtrw }}"
                                            data-nik="{{ $a->nik }}"
                                            data-nama="{{ $a->nama }}"
                                            data-no_hp="{{ $a->no_hp }}"
                                            data-rw="{{ $a->rw }}"
                                            data-url="{{ route('akunrw.update', $a->id_rtrw) }}"
                                        >
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <form action="{{ route('akun.destroy', $a->id_rtrw) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete" title="Hapus Data">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="modalForm" action="{{ route('akunrw.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalTitle">Tambah Akun Ketua RW</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" name="id_rtrw" id="id_rtrw" value="{{ $id_rtrw }}">

                                <div class="mb-3">
                                    <label class="form-label">Nama Ketua RW</label>
                                    <select class="form-control" name="nama" id="nama" required>
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

                                <div class="mb-3">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control" name="nik" id="nik" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">RW</label>
                                    <input type="text" class="form-control" name="rw" id="rw" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- scripts --}}
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="{{ asset('js/rw.js') }}"></script>
        </div>
    </div>
</body>
</html>
@endsection
