@extends('admin.layout.main')
@section('konten')
@section('title', 'Surat Masuk')
<!doctype html>
<html lang="en">

<body class="bg-light">
    <div class="container-scroller">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-start mb-4">Surat Masuk</h2>
            </div>

            {{-- Form Search --}}

            <div class="pb-3">
                <form class="d-flex" action="{{ url('akunrt') }}" method="get">
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>

            {{-- Display Data --}}
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Waktu Pengajuan</th>
                            <th>RW</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
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
                                <button type="button" data-bs-toggle="modal" href="#"
                                    data-bs-target="#modaledit-{{ $a->nik }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <a href="#" data-id="{{$a->id_rtrw}}" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody> --}}
                </table>
            </div>

 {{-- Modal Tambah Data --}}
{{-- <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Akun Ketua RT</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('akun.store') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" hidden>ID Akun RT</label>
                        <input type="text" class="form-control" name='id_rtrw' id="id_rtrw" value="{{$id_rtrw}}" readonly hidden>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<!-- Tambahkan jQuery -->

            

           
        </div>
    </div>
</body>
</html>
@endsection
