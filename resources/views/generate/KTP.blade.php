<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Pengantar</title>
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
    .clear {
      clear: both;
    }
    .kode-pos {
      text-align: center;
      font-size: 12px;
      margin: 5px 0 20px 0;
      font-weight: bold;
    }
    .title {
      text-align: center;
      font-weight: bold;
      font-size: 18px;
      text-decoration: underline;
      margin: 20px 0 10px;
    }
    .nomor {
      text-align: center;
      margin-bottom: 20px;
    }
    .content {
      line-height: 1.8;
      font-size: 14px;
    }
    .table td {
      padding: 3px 10px 3px 0;
      vertical-align: top;
    }
    .footer {
      margin-top: 40px;
    }
    .ttd {
      width: 50%;
      float: left;
      text-align: center;
      font-size: 14px;
    }
    .ttd-right {
      float: right;
      text-align: center;
      font-size: 14px;
    }
    .signature {
      font-weight: bold;
      text-align: center;
      margin-top: 60px;
    }
    .double-signature {
      display: flex;
      justify-content: space-between;
      margin-top: 80px;
    }
    .sign-box {
      text-align: center;
      width: 45%;
    }
    .sign-name {
      margin-top: 60px;
      font-weight: bold;
      text-decoration: underline;
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
    <div class="title">SURAT PENGANTAR PEMBUATAN KTP  </div>
    <div class="nomor">Nomor: 002/SP/RTR 001.008/VI/2022</div>

    <div class="content">
      Yang bertanda tangan di bawah ini menerangkan bahwa:
      <br><br>
      <table class="table">
        <tr><td>Nama</td><td>: ARBI GAMA JUNEISA</td></tr>
        <tr><td>Tempat / Tanggal Lahir</td><td>: JAKARTA, 20 JUNI 2005</td></tr>
        <tr><td>Jenis Kelamin</td><td>: LAKI-LAKI</td></tr>
        <tr><td>No KTP / KK / Nopen</td><td>: 3603112006050002</td></tr>
        <tr><td>Kewarganegaraan</td><td>: WNI</td></tr>
        <tr><td>Agama</td><td>: ISLAM</td></tr>
        <tr><td>Pekerjaan</td><td>: PELAJAR</td></tr>
        <tr><td>Status Perkawinan</td><td>: BELUM KAWIN</td></tr>
        <tr><td>Alamat</td><td>: PERUM PURI MEKAR BLOK C NO 06 RT 001 RW 008</td></tr>
      </table>
      <p style="text-align: justify;">
        Nama tersebut di atas saat ini bertempat tinggal di lingkungan kami RT 001 RW 008. Selanjutnya surat pengantar/keterangan ini diberikan kepada yang bersangkutan untuk keperluan: <strong>Permohonan Pembuatan KTP</strong>.
        <br><br>
        Demikian surat pengantar ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
      </p>
    </div>
    <div class="footer">
      <div class="ttd">
        KETUA RW 008<br><br><br><br>
        <div class="signature"><u>Bambang Paryoco</u></div>
      </div>
      <div class="ttd-right">
        Perum Puri Mekar, 01/06/2022<br>
        KETUA RT 001<br><br>  
        <div class="signature"><u>Isnaini Akbar, Amd</u></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</body>
</html>
