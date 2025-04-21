<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Village</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">

</head>
<body>

    <section class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#" class="logo">
                        Digital Village
                    </a>
                </div>
                <div class="col-lg-6">
               <div class="menu">
    <ul>
        <li>
            <a href="#hero-section" class="nav-link active">Home</a>
        </li>
        <li>
            <a href="#service-section" class="nav-link">Blog</a>
        </li>
        <li>
            <a href="#section-1-first" class="nav-link">Services</a>
        </li>
        <li>
            <a href="#footer-section" class="nav-link">About us</a>
        </li>
        <li>
            <a href="#" class="nav-link">Login</a>
        </li>
    </ul>
</div>

                </div>
            </div>
        </div>
    </section>
    <section class="hero-section" id="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="left-section">
                    <h1>{{ $data->judul }}</h1>
                    <p>{{ $data->deskripsi1 }}</p>
                        <div class="d-flex">
                            <a href="#" class="contact-button">Download </a>
                            <!-- <a href="#" class="view-more-button" id="toggle-description">View More</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                <?php if (!empty($data['gambar1'])): ?>
            <img src="{{ asset('storage/' . $data->gambar1) }}" style="width: 400px; height: auto;" alt="Hero Image" class="hero-image" alt="Hero Image">
            <?php endif; ?>
                </div>
                <style>
                    .hero-image {
                        width: 80%;
                        height: auto;
                        display: block;
                        margin: 110px auto 0 auto;
                    }
                </style>                
            </div>
        </div>
    </section>
    <section class="service-section" id="service-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                   <div class="inner">
                        <img src="{{ asset('image/1.png') }}" alt="">
                        <div class="service">
                            <h1>Website</h1>
                            <p>
                                Pusat informasi dan e-form Desa Kalipait
                            </p>
                        </div>
                   </div>
                </div>
                <div class="col-lg-3">
                     <div class="inner">
                         <img src="{{ asset('image/2.png') }}" alt="">
                         <div class="service">
                             <h1>Pengajuan Surat</h1>
                             <p>
                                 Ajukan dokumen resmi tanpa antre
                             </p>
                         </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="inner">
                         <img src="{{ asset('image/3.png') }}" alt="">
                         <div class="service">
                             <h1>Berita</h1>
                             <p>
                                  Info dan pengumuman desa terkini
                             </p>
                         </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="inner">
                         <img src="{{ asset('image/4.png') }}" alt="">
                         <div class="service">
                             <h1>Aplikasi Mobile </h1>
                             <p>
                                  Layanan desa dalam genggaman anda
                             </p>
                         </div>
                     </div>
                  </div>
            </div>
        </div>
    </section>
    <section class="dummy-section" id="dummy-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Aplikasi Desa Digital : Semua Layanan Surat Kini dalam Genggaman </h3>
                    <p>
                        Ajukan Akta Kelahiran, Kartu Keluarga, KTP, dan beragam surat lainya 
                        <br>tanpa antre cukup menggunakan handphone
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-1" id="section-1-first">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <h3>{{ $data->subtittle }}</h3>
                    <p>{{ $data->section_text }}</p>
                </div>
                <div class="col-lg-6">
                <?php if (!empty($data['image_description1'])): ?>
    <div style="display: flex; justify-content: flex-end; max-width: 90%; margin: auto;">
        <img src="{{ asset('storage/' . $data->image_description1) }}" style="width: 500px; height: auto;" class="image-description1" alt="Description Image">
    </div>
<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-1" id="section-1-second">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <?php if (!empty($data['image_description2'])): ?>
       <img src="{{ asset('storage/' . $data->image_description2) }}" style="width: 400px; height: auto;" class="image-description2" alt="Description Image2">
    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                <h3>{{ $data->subtitle_2 ?? '' }}</h3>
                <p id="section-second">{{ nl2br(e($data->section_second ?? '')) }}</p>
                </div>

            </div>
        </div>
    </section>

        <footer class="footer-section" id="footer-section">
            <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>About Us</h4>
                <p>
                    <p>{{ $data->about_us }}</p>
                </p>
            </div>
            <div class="col-lg-4">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="#hero-section">Home</a></li>
                    <li><a href="#footer-section">About Us</a></li>
                    <li><a href="#section-1-first">Services</a></li>
                    <li><a href="#service-section">Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4>Contact Us</h4>
                <p>Email: DesaKalipait@gmail.com</p>
                <p>Phone: +62 857 4878 2437</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126275.58843042006!2d114.2060889218844!3d-8.488476627450437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd3effd0234747f%3A0x3ef5ac1d39badfe2!2sKantor%20Desa%20Kalipait!5e0!3m2!1sid!2sid!4v1743259735533!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="copyright">
                    © 2025 KELOMPOK 3. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/landingpage.js') }}"></script>


    
</body>
</html>