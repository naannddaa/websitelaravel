<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Kartu Keluarga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
<<<<<<< HEAD
=======
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 500px; /* Batasi lebar card */
            margin: 20px auto; /* Pusatkan card */
            padding: 20px; /* Kurangi padding */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

>>>>>>> cf20f72312a78abd9d6eb0a2c9ac4272e881ab4e
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            color: #dc3545;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #b02a37;
        }
<<<<<<< HEAD
    </style>
</head>
<body class="bg-light">

<div class="container mt-1">
    <div class="card shadow-sm p-4 position-relative">
        <!-- Tombol Close -->
        <i class="bi bi-x-circle close-btn" onclick="goBack()"></i>

        <h4 class="text-primary mb-4">Tambah Data Kartu Keluarga</h4>
        <form action="/master_kartukeluarga/masuk" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nomor KK</label>
                    <input type="number" class="form-control" name="no_kk" placeholder="Isi Nomor KK" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Isi Alamat" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" name="rt" placeholder="Isi RT" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" name="rw" placeholder="Isi RW" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Desa</label>
                    <input type="text" class="form-control" name="desa" placeholder="Isi Desa" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" placeholder="Isi Kecamatan" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kode Pos</label>
                    <input type="number" class="form-control" name="kode_pos" placeholder="Isi Kode Pos" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" name="kabupaten" placeholder="Isi Kabupaten" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" placeholder="Isi Provinsi" required>
                </div>
                <div class="col-md-6">
=======

        @media (max-width: 576px) {
            .card {
                padding: 15px; /* Kurangi padding pada layar kecil */
            }
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card shadow-sm position-relative">
        <!-- Tombol Close -->
        <i class="bi bi-x-circle close-btn" onclick="goBack()"></i>

        <h4 class="text-primary mb-4 text-center">Tambah Data Kartu Keluarga</h4>
        <form action="/master_kartukeluarga/masuk" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Nomor KK</label>
                    <input type="text" class="form-control" name="no_kk" placeholder="Isi Nomor KK" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Isi Alamat" required>
                </div>
                <div class="col-6">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" name="rt" placeholder="Isi RT" required>
                </div>
                <div class="col-6">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" name="rw" placeholder="Isi RW" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Desa</label>
                    <input type="text" class="form-control" name="desa" placeholder="Isi Desa" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" placeholder="Isi Kecamatan" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" name="kode_pos" placeholder="Isi Kode Pos" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" name="kabupaten" placeholder="Isi Kabupaten" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" placeholder="Isi Provinsi" required>
                </div>
                <div class="col-12">
>>>>>>> cf20f72312a78abd9d6eb0a2c9ac4272e881ab4e
                    <label class="form-label">Tanggal Dibuat</label>
                    <input type="date" class="form-control" name="tanggal_dibuat" required>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
