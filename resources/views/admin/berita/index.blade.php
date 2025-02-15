@extends('admin.layout.main')
@section('konten')

<div class="container-scroller">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Border Box -->
    <div class="container-scroller">
        <div class="p-4 border rounded shadow bg-white">

            <h2 class="text-start mb-4">Berita</h2>
            <h4 class="text-start mb-4">Sediakan Berita Lokal Untuk Masyarakat</h4>

            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="{{ url('admin/berita') }}" method="get">
                    <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>

            <!-- TOMBOL TAMBAH DATA -->
            <div class="d-flex justify-content-end pb-3">
                <a href="{{ url('admin/berita/create') }}" class="btn btn-primary">+ Tambah Data</a>
            </div>

            <!-- Tabel Berita -->
            <div class="p-2 bg-body ">
                <table class="table  table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th class="col-md-1 text-center">No</th>
                            <th class="col-md-2">Judul</th>
                            <th class="col-md-2 text-center">Gambar</th>
                            <th class="col-md-3">Deskripsi</th>
                            <th class="col-md-1">Tanggal</th>
                            <th class="col-md-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $databerita->firstItem() ?>
                        @foreach ($databerita as $item)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $item->judul }}</td>
                            <td class="text-center">
                                <img src="{{ asset('images/'.$item->image) }}" class="border" style="width: 120px; height: 120px; object-fit: cover;">
                            </td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal }}</td>

                            <td class="text-center">
                                <a href="{{ url('admin/berita/'.$item->id_berita.'/edit') }}" class="btn btn-warning btn-lg me-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="d-inline" action="{{ url('admin/berita/'.$item->id_berita) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $databerita->links() }}
            </div>

        </div> <!-- Penutup Border Box -->
    </div>

    @include('sweetalert::alert')

</div>

@endsection
