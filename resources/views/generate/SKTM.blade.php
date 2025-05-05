<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Tidak Mampu</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }
    
        .header-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            position: relative;
        }
    
        .logo-kiri {
            position: absolute;
            left: 0;
            top: 0;
        }
    
        .logo {
         width: 250px; 
         height: auto;
         margin-top: -40px;
        }

        .header-text {
            text-align: center;
            width: 100%;
        }
    
        .header-text h2, .header-text h3, .header-text p {
            margin: 2px;
        }

        .header-text h2 {
          font-size: 18px;
        }

        .header-text h3 {
        font-size: 16px;
        }
    
        .judul {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: bold;
        text-decoration: underline;
        font-size: 15px;
        }
    
        .nomor {
            text-align: center;
            margin-bottom: 20px;
        }
    
        .isi {
            text-align: justify;
            line-height: 1.7;
        }
    
        .data {
            margin-left: 30px;
        }
    
        .ttd {
            width: 100%;
            margin-top: 40px;
        }
    
        .ttd .kanan {
            float: right;
            text-align: center;
        }
    
        .clear {
            clear: both;
        }
    
        .stempel {
            margin-top: 80px;
            text-align: center;
        }
    
        .kip {
            margin-top: 50px;
            text-align: left;
        }
    
        img.kip-img {
            width: 300px;
            margin-top: 10px;
        }
    </style>
    
</head>
<body>
    <div class="header-wrapper">
        <div class="logo-kiri">
            <img src="{{ public_path('storage/logo/logo.png') }}" alt="Logo Desa" class="logo">
        </div>
        <div class="header-text">
            <h3>PEMERINTAH KABUPATEN BANYUWANGI</h3>
            <h2>KECAMATAN TEGALDLIMO</h2>
            <h2>DESA KALIPAIT</h2>
            <p>Jl Purwo Indah - Kalipait - Banyuwangi 68484</p>
        </div>
    </div>
    <hr>    

    <div class="judul">SURAT KETERANGAN TIDAK MAMPU</div>
    <div class="nomor">Nomor: 470/ /427.95.05/2023</div>

    <div class="isi">
        Yang bertanda tangan di bawah ini Kepala Desa Kalipait Kecamatan Tegakdlimo Kabupaten Banyuwangi menerangkan dengan sebenarnya bahwa:
        <br><br>
        <table style="margin-left: 30px;">
            <tr>
                <td style="width: 180px;">Nama lengkap</td>
                <td>: {{ $nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{ $nik }}</td>
            </tr>
            <tr>
                <td>Tempat & Tgl. Lahir</td>
                <td>: {{ $ttl }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: Laki-Laki</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $alamat }}</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>: Belum Kawin</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $agama }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $pekerjaan }}</td>
            </tr>
            <tr>
                <td>Kebangsaan</td>
                <td>: Indonesia</td>
            </tr>
        </table>
        
        <br>
        Adalah benar-benar warga desa kami dan berdasarkan pertimbangan yang ada, yang bersangkutan benar-benar tergolong keluarga tidak mampu dan surat keterangan ini dipergunakan untuk keperluan yang bersangkutan.
        <br><br>
        Demikian surat keterangan ini dibuat untuk dipergunakan seperlunya.
    </div>

    <div class="ttd">
        <div class="kanan">
            {{ $tanggal_surat }}<br>
            Kepala Desa Kalipait<br><br><br><br>
            <b><u>{{ $kepala_desa }}</u></b>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
