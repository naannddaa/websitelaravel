@extends('admin.layout.main')
@section('title', 'Edit Landingpage')
@section('konten')

<!-- START FORM -->

<form action="{{ route('homepage.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">

        {{-- <a href="{{ url('/') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left-circle-fill"></i> Kembali ke Homepage
        </a> --}}
        <h4 class="text-start mb-4">Edit Landingpage</h4>
        <div class="mb-3 row mt-5">
            <label class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="{{ $data->judul }}" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" rows="6" required>{{ $data->deskripsi1 }}</textarea>
            </div>
        </div>

        {{-- Gambar Slide --}}
        <div id="fileInputsContainer">
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Gambar Slide</label>
        <div class="col-sm-10">
            <div id="inputContainer">
                @foreach(json_decode($data->gambar1) as $image)
                    {{-- Menampilkan gambar dari array --}}
                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid mt-2" width="200px" id="previewHeroImage">
                @endforeach
                @if(empty($data->gambar1)) 
                    {{-- Input pertama jika gambar tidak ada --}}
                    <input type="file" name="hero_image[]" class="form-control image-input">
                @endif
            </div>

            <!-- Tombol tambah harus di luar inputContainer -->
            <button type="button" class="btn btn-sm btn-primary mt-3" id="addImageInput">+ Tambah Gambar</button>

            <div id="previewContainer" class="d-flex flex-wrap gap-2 mt-2"></div>
        </div>
    </div>
</div>



        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Subjudul</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="subtittle">{{ $data->subtittle }}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Deskripsi Subjudul</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="section_text" rows="6" >{{ $data->section_text }}</textarea>
            </div>
        </div>

         {{-- Gambar Deskripsi 1 --}}
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Image Deskripsi 1</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="image_description1" id="image_description1">
                @if($data->image_description1)
                    <img src="{{ asset('storage/' . $data->image_description1) }}" class="img-fluid mt-2" width="200px" id="previewDesc1">
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Subjudul 2</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="subtitle_2">{{ $data->subtitle_2 }}</textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Deskripsi Subjudul 2</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="section_second" rows="6" >{{ $data->section_second }}</textarea>
            </div>
        </div>

        {{-- Gambar Deskripsi 2 --}}
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Image Deskripsi 2</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="image_description2" id="image_description2">
                @if($data->image_description2)
                    <img src="{{ asset('storage/' . $data->image_description2) }}" class="img-fluid mt-2" width="200px" id="previewDesc2">
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tentang Kami</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="about_content" rows="6" >{{ $data->about_us }}</textarea>
            </div>
        </div>

        

        <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2 text-end">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </div>
</form>

<!-- END FORM -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const fileInputsContainer = document.getElementById('inputContainer'); // hanya gunakan inputContainer
    const previewContainer = document.getElementById('previewContainer');
    const addBtn = document.getElementById('addImageInput');

    function createImagePreview(input) {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    const img = document.createElement('img');
                    img.src = evt.target.result;
                    img.className = 'img-thumbnail';
                    img.style.width = 'auto';
                    img.style.height = '150px';
                    img.style.marginRight = '10px';
                    img.style.marginBottom = '10px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Inisialisasi input pertama
    document.querySelectorAll('.image-input').forEach(input => createImagePreview(input));

    addBtn.addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'hero_image[]';
        input.classList.add('form-control', 'image-input');
        input.style.marginTop = '1rem';

        // Menambahkan input file baru di bawah input yang ada
        fileInputsContainer.appendChild(input); // Menggunakan appendChild untuk menambah di bawah
        createImagePreview(input);
    });

    // Preview untuk deskripsi
    document.getElementById('image_description1')?.addEventListener('change', function(e){
        if (e.target.files[0]) {
            document.getElementById('previewDesc1').src = URL.createObjectURL(e.target.files[0]);
        }
    });

    document.getElementById('image_description2')?.addEventListener('change', function(e){
        if (e.target.files[0]) {
            document.getElementById('previewDesc2').src = URL.createObjectURL(e.target.files[0]);
        }
    });
});

</script>

@endsection
