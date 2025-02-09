<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Kartu Keluarga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            max-width: 500px; /* Card lebih kecil */
            margin: 20px auto; /* Center card */
            padding: 20px; /* Kurangi padding */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

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
            <!-- Tombol Close di dalam Card/Form -->
            <i class="bi bi-x-circle close-btn" onclick="goBack()"></i>

            <h4 class="text-warning mb-4 text-center">Edit Data Kartu Keluarga</h4>
            <form action="/master_kartukeluarga/{{$master_kartukeluarga->no_kk}}" method="post">
                @csrf
                @method('put')
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nomor KK</label>
                        <input type="text" class="form-control" name="no_kk" value="{{ $master_kartukeluarga->no_kk }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $master_kartukeluarga->alamat }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" name="rt" value="{{ $master_kartukeluarga->rt }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" name="rw" value="{{ $master_kartukeluarga->rw }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Desa</label>
                        <input type="text" class="form-control" name="desa" value="{{ $master_kartukeluarga->desa }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan" value="{{ $master_kartukeluarga->kecamatan }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" value="{{ $master_kartukeluarga->kode_pos }}" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten" value="{{ $master_kartukeluarga->kabupaten }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Provinsi</label>
                        <input type="text" class="form-control" name="provinsi" value="{{ $master_kartukeluarga->provinsi }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Tanggal Dibuat</label>
                        <input type="date" class="form-control" name="tanggal_dibuat" value="{{ $master_kartukeluarga->tanggal_dibuat }}" required>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">Update</button>
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
