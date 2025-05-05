<link rel="stylesheet" href="{{ asset('css/detailberita.css') }}">

@if(isset($beritas))
    <section class="berita-section py-5">
        <div class="container-berita">
            <h2 class="section-title-berita">Berita Terkini</h2>
            <p class="section-subtitle-berita">Berita tentang Desa Kalipait</p>

            <div class="row-berita">
                @foreach($beritas as $berita)
                    <div class="col-berita">
                        <div class="card-berita h-100">
                            <img src="{{ asset('storage/imageberita/' . $berita->image) }}" class="card-img-berita" alt="{{ $berita->judul }}">
                            <div class="card-body-berita">
                                <h5 class="card-title-berita">{{ $berita->judul }}</h5>
                                <small class="text-muted">{{ date('d-m-Y', strtotime($berita->tanggal)) }}</small>
                                <p class="card-text-berita">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                                <a href="{{ route('landing_page.show', $berita->id_berita) }}" class="btn-berita">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@if(isset($berita))
    <section class="berita-detail py-5">
        <div class="container-berita">
            <div class="card-berita-detail">
                <img src="{{ asset('storage/imageberita/' . $berita->image) }}" alt="{{ $berita->judul }}" class="img-fluid mb-3">
                <div class="card-body-berita-detail">
                    <h2 class="card-title-berita-detail">{{ $berita->judul }}</h2>
                    <small class="text-muted">{{ date('d-m-Y', strtotime($berita->tanggal)) }}</small>
                    <p class="card-text-berita-detail mt-2">{!! $berita->deskripsi !!}</p>
                    <a href="{{ route('website') }}#berita-section" class="btn-berita">← Kembali ke Daftar Berita</a>
                </div>
            </div>
        </div>
    </section>
@endif