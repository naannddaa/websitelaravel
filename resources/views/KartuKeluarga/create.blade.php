@extends('layout.template')
@section('konten')
    

<!-- START FORM -->
 <form action='{{ url('kartukeluarga') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="NomerKartuKeluarga" class="col-sm-2 col-form-label">Nomer Kartu Keluarga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='NomerKartuKeluarga' id="NomerKartuKeluarga" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nik' id="nik" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="NamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='NamaLengkap' id="NamaLengkap" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Alamat' id="Alamat" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="desa" class="col-sm-2 col-form-label">Desa</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='desa' id="desa" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='kecamatan' id="kecamatan" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="RT" class="col-sm-2 col-form-label">RT</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='RT' id="RT" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="RW" class="col-sm-2 col-form-label">RW</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='RW' id="RW" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kodepos" class="col-sm-2 col-form-label">Kode Pos</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='kodepos' id="kodepos" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='kabupaten' id="kabupaten" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name='provinsi' id="provinsi" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggaldibuat" class="col-sm-2 col-form-label">Tanggal Dibuat</label>
            <div class="col-sm-10"> 
                <input type="date" class="form-control" name='tanggaldibuat' id="tanggaldibuat" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
    <!-- AKHIR FORM -->
    @endsection