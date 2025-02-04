<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        scroll-behavior: smooth;
      }
      .navbar {
        transition: all 0.3s;
      }
      .navbar.scrolled {
        background: rgba(52, 58, 64, 0.9) !important;
        backdrop-filter: blur(10px);
      }
      .nav-link {
        position: relative;
      }
      .nav-link::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #007bff;
        transition: width 0.3s;
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
      }
      .nav-link.active::after {
        width: 100%;
      }
      .hero-section {
        background: linear-gradient(135deg, #0e00a3, #5191ff);
        color: white;
        padding: 150px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
      }
      .hero-section h3 {
        font-size: 2rem;
        font-weight: bold;
        text-align: left;
        animation: fadeInDown 1s;
      }
      .hero-section h6 {
        text-align: left;
      }
      .btn-animated {
        transition: all 0.3s;
      }
      .btn-animated:hover {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      }
      .card-custom {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: hsl(211, 100%, 95%);
        height: 100%;
        display: flex;
        flex-wrap: wrap;
      }
      .card-custom:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);

        

        

      }
      .map-container {
        width: 100%;
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
      }
      iframe {
        width: 100%;
        height: 100%;
        border: 0;
      }
      .footer {
        text-align: center;
        padding: 20px;
        background: #f8f9fa;
        border-top: 1px solid #ddd;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#hero">Desa Digital</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#hero">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#wisata">Wisata</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link" href="#news">Berita</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
            <li class="nav-item"><a class="btn btn-primary" href="#login">Masuk</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div id="hero" class="hero-section">
      <h3>Selamat Datang di Desa Digital Desa Kalipait</h3>
      <h6>" Solusi Cerdas untuk Administrasi Desa Kalipait "</h6>
    </div>
    
    <div id="wisata" class="container my-5">
      <h2 class="text-center mb-4">Wisata Desa</h2>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-custom p-3">
            <img src="path-to-image1.jpg" class="card-img-top" alt="Wisata 1">
            <div class="card-body">
              <h5 class="card-title">Wisata 1</h5>
              <p class="card-text">Description or details about Wisata 1.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-custom p-3">
            <img src="path-to-image2.jpg" class="card-img-top" alt="Wisata 2">
            <div class="card-body">
              <h5 class="card-title">Wisata 2</h5>
              <p class="card-text">Description or details about Wisata 2.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-custom p-3">
            <img src="path-to-image3.jpg" class="card-img-top" alt="Wisata 3">
            <div class="card-body">
              <h5 class="card-title">Wisata 3</h5>
              <p class="card-text">Description or details about Wisata 3.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-custom p-3">
            <img src="path-to-image4.jpg" class="card-img-top" alt="Wisata 4">
            <div class="card-body">
              <h5 class="card-title">Wisata 4</h5>
              <p class="card-text">Description or details about Wisata 4.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div id="about" class="container my-5">
        <h2 class="text-center mb-4">Tentang Kami</h2>
        <div class="row">
          <!-- Visi Section -->
          <div class="col-md-6 mb-3">
            <div class="card card-custom p-4 h-100">
              <h5>Visi</h5>
              <p>"Melayani Masyarakat Desa Kalipait Dilandasi Dengan Niat Ibadah Demi Terciptanya Masyarakat Desa Kalipait Maju Dan Sejahtera"</p>
            </div>
          </div>
      
          <!-- Misi Section -->
          <div class="col-md-6 mb-3">
            <div class="card card-custom p-4 h-100">
              <h5>Misi</h5>
              <ul>
                <li>Mewujudkan pemerintah yang transparan, akuntabel, partisipatif, tertib, dan disiplin anggaran.</li>
                <li>Menghapus seluruh iuran-furan yang selama ini ada di Desa Kalipait.</li>
                <li>Memberdayakan masyarakat.</li>
                <li>Memberikan pelayanan birokrasi yang cepat dan sistematis.</li>
                <li>Mengedepankan musyawarah untuk mufakat dalam setiap pengambilan kebijakan.</li>
                <li>Menjaga kerukunan antar umat beragama dan antar warga sehingga terwujud kehidupan yang guyub, rukun, damai, dan sejahtera bagi seluruh warga Desa Kalipait.</li>
                <li>Melaksanakan program-program yang dicanangkan oleh Pemerintah Pusat, Provinsi, dan Daerah yang dibutuhkan serta menguntungkan bagi masyarakat.</li>
              </ul>
            </div>
          </div>
      
          <!-- Kondisi Section (placed below Visi) -->
          <div class="col-md-6 mb-3">
            <div class="card card-custom p-4 h-100">
              <h5>Kondisi Desa</h5>
              <p>Desa Kalipait adalah sebuah desa di Kabupaten Banyuwangi yang berada di wilayah bagian ujung Selatan, tepatnya kurang lebih 60 km dari Pusat Pemerintahan Kabupaten Banyuwangi ke arah Selatan jalur menuju ke Taman Nasional Alas Punwo.</p>
            </div>
          </div>
      
          <!-- Sejarah Section (placed below Visi) -->
          <div class="col-md-6 mb-3">
            <div class="card card-custom p-4 h-100">
              <h5>Sejarah</h5>
              <p>Diberi nama Kalipait karena dahulu di daerah tersebut banyak mengalir sungai-sungai kecil yang airnya sangat asin. Karena saking asinnya, rasanya sampai pait. Daerah tersebut suasananya sangat teduh serta asri sehingga nyaman untuk tempat beristirahat. Oleh penduduk setempat kemudian dinamakan "Kalipait", berasal dari kata sungai yang airnya sangat asin, dan karena sangat asin itu maka rasanya menjadi pait.</p>
            </div>
          </div>
        </div>
      </div>
      

    <div id="news" class="container my-5">
      <h2 class="text-center mb-4">Berita Terbaru</h2>
      <div class="row">
        <div class="col-md-3"><div class="card card-custom p-3"><p>Berita 1</p></div></div>
        <div class="col-md-3"><div class="card card-custom p-3"><p>Berita 2</p></div></div>
        <div class="col-md-3"><div class="card card-custom p-3"><p>Berita 3</p></div></div>
        <div class="col-md-3"><div class="card card-custom p-3"><p>Berita 4</p></div></div>
      </div>
    </div>
    
    <div id="contact" class="container my-5">
      <h2 class="text-center mb-4">Kontak Kami</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-custom p-4">
            <h5>Alamat</h5>
            <p>Desa Kalipait, Banyuwangi</p>
            <h5>Telepon</h5>
            <p>(0333) 123456</p>
            <h5>Email</h5>
            <p>contact@digitalvillage.com</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-custom p-4">
            <p>Untuk melihat lokasi Desa Kalipait di Google Maps, klik tautan berikut:</p>
            <a href="https://www.google.com/maps/place/Desa+Kalipait,+Tegaldlimo,+Kabupaten+Banyuwangi,+Jawa+Timur" target="_blank">Desa Kalipait, Tegaldlimo, Banyuwangi di Google Maps</a>
          </div>
        </div>
      </div>
    </div>

    <div class="footer">
      <p>&copy; 2025 Digital Village. All rights reserved.</p>
    </div>
    
    <script>
      document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
          document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
          this.classList.add('active');
        });
      });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
