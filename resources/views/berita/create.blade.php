@extends('layout.template')

@section('konten')

<!-- START FORM -->
 <form action='{{ url('berita') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
         {{-- tombol kembali start--}}
         <a href='{{ url('berita') }}' class="btn btn-secondary"><<</a>
         {{-- tombol kembali end--}}
        <div class="mb-3 row">
            <label for="idberita" class="col-sm-2 col-form-label">ID Berita</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='idberita' id="idberita" readonly value="{{$idBerita}}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='judul' id="judul" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='deskripsi' id="deskripsi" required>
            </div>
        </div>

<div class="mb-3 row">
    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
    </div>
</div>

        
        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal' id="tanggal" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
        @include('sweetalert::alert')
    </div>

</form>
    <!-- AKHIR FORM -->
    @endsection

