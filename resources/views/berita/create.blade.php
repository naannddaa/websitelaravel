@extends('layout.template')

@section('konten')

<!-- START FORM -->
 <form action='{{ url('berita') }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
         {{-- tombol kembali start--}}
         <a href="{{ url('berita') }}" class="btn btn-secondary">&laquo; Kembali</a>
         {{-- tombol kembali end--}}
        <div class="mb-3 row">
            <label for="id_berita" class="col-sm-2 col-form-label">ID Berita</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='id_berita' id="id_berita" value="{{$idBerita}}" required disabled readonly>
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
                {{-- <input type="text" class="form-control" name='deskripsi' id="deskripsi" required> --}}
                <textarea type="text" class="form-control" name='deskripsi' id="deskripsi" required ></textarea>
            </div>
        </div>

<div class="mb-3 row">
    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="image" id="image" required>
        <img src="" id="showImage" class="img-fluid" width="200px">
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
            <script type="text/javascript">
            $(document).ready(function(){
               $('#image').change(function(e)){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
               } 
            });
            </script>

    @endsection

