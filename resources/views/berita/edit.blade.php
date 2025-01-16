@extends('layout.template')

@section('konten')

<!-- START FORM -->
<form action="{{ url('berita/' . $databerita->id_berita) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        {{-- Tombol kembali --}}
        <a href="{{ url('berita') }}" class="btn btn-secondary">&laquo; Kembali</a>

        {{-- Field ID Berita (Hidden) --}}
        <input type="hidden" name="id_berita" value="{{ $databerita->id_berita }}">

        {{-- Field Judul --}}
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $databerita->judul }}" required>
            </div>
        </div>

        {{-- Field Deskripsi --}}
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required>{{ $databerita->deskripsi }}</textarea>
            </div>
        </div>

        {{-- Field Gambar --}}
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                @if($databerita->image)
                    <img src="{{ asset('images/' . $databerita->image) }}" alt="Gambar Berita" class="img-fluid mb-3" style="max-width: 200px; max-height: 200px;">
                @else
                    <p class="text-muted">Tidak ada gambar</p>
                @endif
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
            </div>
        </div>

        {{-- Field Tanggal --}}
        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ $databerita->tanggal }}" required>
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

        {{-- SweetAlert Notification --}}
        @include('sweetalert::alert')
    </div>
</form>
<!-- AKHIR FORM -->

@endsection
