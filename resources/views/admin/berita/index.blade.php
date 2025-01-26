@extends('admin.layout.main')
@section('konten')

<div class="container-scroller">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <h2 class="text-start mb-4">Berita</h2>

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('berita') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3" style="text-align:right;">
        <a href="{{ url('berita/create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- Tabel Berita -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Judul</th>
                <th class="col-md-2">Gambar</th>
                {{-- <th class="col-md-5">Deskripsi</th> --}}
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
                    <img src="{{ asset('images/'.$item->image) }}" width="150px" alt="Gambar Berita">
                </td>
                {{-- <td>{{ $item->deskripsi }}</td> --}}
                <td>{{ $item->tanggal }}</td>
                <td>
                    <a href="{{ url('berita/'.$item->id_berita.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="d-inline" action="{{ url('berita/'.$item->id_berita) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>  
    {{ $databerita->links() }}
    
    @include('sweetalert::alert')

</div>    

@endsection
