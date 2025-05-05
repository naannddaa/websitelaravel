<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Keterangan Pengantar</title>
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

        .title {
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    .number {
      text-align: center;
      margin-bottom: 30px;
    }
    .info, .content {
      font-size: 14px;
      line-height: 1.6;
    }

    .table-info td {
      padding: 4px 8px;
      vertical-align: top;
    }

    .signature-section {
      margin-top: 30px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }

    .signature {
      text-align: center;
      margin-top: 60px;
    }

    .stamp {
      margin-top: -30px;
    }

    .bold {
      font-weight: bold;
    }

    .footer {
      margin-top: 40px;
    }
    .ttd {
      float: right;
      text-align: center;
    }
    .gray-box {
      background-color: #f0f0f0;
      padding: 2px 6px;
      display: inline-block;
      border-radius: 3px;
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
        
        <div class="title">SURAT KETERANGAN MISKIN</div>
        <div class="number">Nomor: ___ / ___ / 2020</div>

  <div class="info">
    Yang bertanda tangan di bawah ini:
    <table class="table-info">
      <tr><td>Nama</td><td>: Supriyono</td></tr>
      <tr><td>Jabatan</td><td>: Kepala Desa Kalipait</td></tr>
      <tr><td>Alamat</td><td>: Jl. Raya Tegaldlimo</td></tr>
    </table>

    <p>Dengan ini menerangkan bahwa:</p>

    <table class="table-info">
      <tr><td>Nama lengkap</td><td>: Fery Sawilan</td></tr>
      <tr><td>Jenis kelamin</td><td>: Laki - Laki</td></tr>
      <tr><td>Agama</td><td>: Islam</td></tr>
      <tr><td>Status</td><td>: Kawin</td></tr>
      <tr><td>No KTP/NIK</td><td>: 7110032020190001</td></tr>
      <tr><td>Tempat / Tanggal lahir</td><td>: Motongkad, 20 Februari 1991</td></tr>
      <tr><td>Pekerjaan</td><td>: Wiraswasta</td></tr>
      <tr><td>Alamat</td><td>: Jl. Raya Tegaldlimo No 14 </td></tr>
      <tr><td>Keperluan</td><td>: Melengkapi persyaratan Pembuatan Kartu Keluarga</td></tr>
      <tr><td>Keterangan lain-lain</td><td>: Keterangan secara lengkap terlampir</td></tr>
    </table>

    <p>Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>
  </div>

  <div class="ttd">
    Kalipait, 30 April 2018<br>
    Kepala Desa Kalipait<br><br><br><br>
    <b><u>Supriyono</u></b>
  </div>
  </div>

</body>
</html>
