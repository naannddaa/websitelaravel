@extends('admin.layout.main')
@section('konten')

<div class="container-scroller">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <div class="pb-3" style="text-align:right;">
        <a href="{{ url('admin/berita/create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- Tabel Berita -->
    {{-- <table class="table table-striped"> --}}
        <table class="container-scroller"> 
            {{-- <div class="my-3 p-3 bg-body rounded shadow-sm"> --}}
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Judul</th>
                <th class="col-md-2">Gambar</th>
                <th class="col-md-4">Deskripsi</th>
                <th class="col-md-1">Tanggal</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $databerita->firstItem() ?>
            @foreach ($databerita as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->judul }}</td>
                <td>
                    <!-- Menampilkan Gambar -->
                    <img src="{{ asset('images/'.$item->image) }}" width="180px" height="150px" alt="Gambar Berita">
                </td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                    <a href="{{ url('admin/berita/'.$item->id_berita.'/edit') }}" class="btn btn-warning btn-sm">
                        {{-- icon edit --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg>
                    </a>
                    <form onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="d-inline" action="{{ url('admin/berita/'.$item->id_berita) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">
                           {{-- icon trash --}}
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                          </svg>
                        </button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    {{ $databerita->links() }}
</table>  
    @include('sweetalert::alert')
</div>    
@endsection
