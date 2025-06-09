@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- HERO SECTION (CAROUSEL) -->
    <div class="position-relative mb-5">
        <div id="heroCarousel" class="carousel slide carousel-fade rounded-4 shadow-sm overflow-hidden" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero-img-wrapper position-relative">
                        <img src="https://udd.pmibuleleng.or.id/wp-content/uploads/2024/02/1694164055_813e070670bb6397618b-1200x450.jpeg" class="w-100 hero-img" style="height: 450px; object-fit: cover;" alt="Banner 1">
                        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                        <div class="hero-caption position-absolute top-50 start-50 translate-middle text-center text-white px-4 px-md-5">
                            <h1 class="fw-bold display-5 mb-3 animate__animated animate__fadeInDown">Bersama Kita Bisa Membahagiakan Anak Panti</h1>
                            <p class="lead mb-4 animate__animated animate__fadeInUp">Ulurkan tanganmu, bahagiakan masa depan mereka</p>
                            <a href="/donasi" class="btn btn-gradient btn-lg rounded-pill px-5 fw-semibold shadow animate__animated animate__fadeInUp">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-img-wrapper position-relative">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80" class="w-100 hero-img" style="height: 450px; object-fit: cover;" alt="Banner 2">
                        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                        <div class="hero-caption position-absolute top-50 start-50 translate-middle text-center text-white px-4 px-md-5">
                            <h1 class="fw-bold display-5 mb-3 animate__animated animate__fadeInDown">Setiap Donasi Anda Adalah Harapan</h1>
                            <p class="lead mb-4 animate__animated animate__fadeInUp">Bantu mereka wujudkan impian dan masa depan yang lebih baik</p>
                            <a href="/donasi" class="btn btn-gradient btn-lg rounded-pill px-5 fw-semibold shadow animate__animated animate__fadeInUp">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hero-img-wrapper position-relative">
                        <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1200&q=80" class="w-100 hero-img" style="height: 450px; object-fit: cover;" alt="Banner 3">
                        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                        <div class="hero-caption position-absolute top-50 start-50 translate-middle text-center text-white px-4 px-md-5">
                            <h1 class="fw-bold display-5 mb-3 animate__animated animate__fadeInDown">Ayo Jadi Bagian dari Kebaikan</h1>
                            <p class="lead mb-4 animate__animated animate__fadeInUp">Bersama Bantu Peduli, kebaikanmu sampai ke yang membutuhkan</p>
                            <a href="/donasi" class="btn btn-gradient btn-lg rounded-pill px-5 fw-semibold shadow animate__animated animate__fadeInUp">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-indicators mb-3">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </div>

    <!-- KATEGORI DONASI -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-center mb-4" style="color:#000000 !important;z-index:2;position:relative;">Pilih Kategori Donasi</h2>
        <div class="d-flex justify-content-center flex-wrap gap-4">
            @php
                $kategori = [
                    ['title' => 'Anak Asuh', 'img' => 'https://png.pngtree.com/png-vector/20230222/ourmid/pngtree-donate-icon-for-ramadan-png-image_6614916.png'],
                    ['title' => 'Makanan & Nutrisi', 'img' => 'https://png.pngtree.com/png-vector/20221029/ourmid/pngtree-food-donation-rgb-color-icon-donation-starvation-charity-vector-png-image_39941808.png'],
                    ['title' => 'Pendidikan', 'img' => 'https://cdn-icons-png.freepik.com/512/3197/3197780.png'],
                    ['title' => 'Kesehatan', 'img' => 'https://www.kanal-kesehatan.com/wp-content/uploads/2016/09/cropped-medical-icon.png?w=640'],
                    ['title' => 'Pakaian & Kebutuhan', 'img' => 'https://cdn-icons-png.freepik.com/512/5208/5208370.png']
                ];
            @endphp
            @foreach($kategori as $item)
            <div class="kategori-card-glass text-center">
                <div class="kategori-icon-glass mb-2 mx-auto d-flex align-items-center justify-content-center">
                    <img src="{{ $item['img'] }}" width="38" height="38" alt="{{ $item['title'] }}">
                </div>
                <div class="fw-semibold kategori-title">{{ $item['title'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- KAMPANYE UTAMA -->
    <div class="mb-5 pt-4">
        <h2 class="fw-bold text-center mb-4" style="color:#000000 !important;z-index:2;position:relative;">Campaign Populer</h2>
        <p class="mb-4 text-center">Mereka butuh uluran tangan kita. Karena sedikit bantuan dari kita</br>adalah harapan besar bagi mereka.</p>
        <div class="row justify-content-center">
            @forelse($posts as $post)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://paybill.id/cfd/upload/banner-program/compress/paybill-program-banner-1-WCNTXI-1715940733994.png' }}"
                        class="card-img-top" style="height: 140px; object-fit: cover;" alt="{{ $post->title }}">

                    <div class="card-body">
                        {{-- Judul --}}
                        <h5 class="fw-bold mb-2">{{ $post->title }}</h5>

                        {{-- Progress --}}
                        <div class="progress mb-2 position-relative" style="height: 11px;">
                            @php
                                $percent = $post->target > 0 ? min(100, round(($post->total_donasi / $post->target) * 100, 2)) : 0;
                            @endphp
                            <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%; background-color: #0d47a1;"></div>
                            <!-- <span class="position-absolute top-0 start-50 translate-middle-x small text-dark" style="font-size:10px;line-height:6px;">{{ $percent }}%</span> -->
                        </div>

                        {{-- Donasi dan Hari --}}
                        <div class="d-flex justify-content-between text-muted small mb-2">
                            <div>
                                <strong>Rp {{ number_format($post->total_donasi,0,',','.') }}</strong><br>
                                <span>{{ $post->donations->count() }} Donasi</span>
                            </div>
                            <div class="text-end">
                            <strong>Batas Waktu</strong><br>
                                @if($post->batas_waktu)
                                    <div class="small text-muted">s/d {{ \Carbon\Carbon::parse($post->batas_waktu)->translatedFormat('d M Y') }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- Profil Panti --}}
                        <div class="d-flex align-items-center mt-3">
                            @if($post->orphanage && $post->orphanage->logo)
                                <img src="{{ asset('storage/' . $post->orphanage->logo) }}" alt="Logo" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">
                                    {{ strtoupper(Str::substr($post->orphanage->name ?? 'P', 0, 2)) }}
                                </div>
                            @endif
                            <span class="small text-truncate" style="max-width: 200px;">{{ $post->orphanage->name ?? 'Lembaga Tidak Diketahui' }}</span>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-0 text-end">
                        <a href="{{ route('campaign.show', $post->slug) }}" class="btn btn-outline-primary btn-sm btn-detail-square">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada kampanye donasi yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- STATISTIK DONASI -->
    <div class="mb-5">
        <div class="rounded-4 p-4 mb-4 statistik-glass">
            <div class="row text-center align-items-center justify-content-center g-4">
                <div class="col-12 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-cash-coin"></i></div>
                        <div class="fs-2 fw-bold">Rp{{ number_format($stat['total_donasi'],0,',','.') }}</div>
                        <div class="fw-semibold stat-label">Dana Terkumpul</div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-arrow-repeat"></i></div>
                        <div class="fs-2 fw-bold">{{ number_format($stat['total_transaksi']) }}</div>
                        <div class="fw-semibold stat-label">Kali Donasi</div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-people"></i></div>
                        <div class="fs-2 fw-bold">{{ number_format($stat['total_user']) }}</div>
                        <div class="fw-semibold stat-label">Orang Terdaftar</div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-flag"></i></div>
                        <div class="fs-2 fw-bold">{{ number_format($stat['total_campaign']) }}</div>
                        <div class="fw-semibold stat-label">Campaign Dibuat</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TENTANG KAMI -->
    <div class="container mb-5">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <div class="bg-light rounded-4 p-4 h-100">
                    <div class="fw-bold text-primary mb-2">Tentang Kami</div>
                    <h2 class="fw-bold mb-3" style="font-family:'Poppins',sans-serif;">Apa itu Bantu Peduli?</h2>
                    <p class="mb-3">Bantu Peduli mempertemukan orang yang ingin berdonasi dengan orang yang ingin menggalang dana. Bantu Peduli memiliki banyak kelebihan antara lain :</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Hadir di berbagai macam platform seperti Website dan juga pada aplikasi iPhone dan Android</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Donasi mudah dengan berbagai macam metode pembayaran seperti bank transfer dan eWallet.</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Menggalang dana sangat mudah hanya dalam 2 langkah.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                    <iframe src="https://www.youtube.com/embed/3jOpqDcFcdocMJek" title="APA ITU BANTU PEDULI??" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- KENAPA MEMILIH BANTU PEDULI -->
    <div class="container mb-5">
        <div class="row align-items-center g-4">
            <div class="col-md-6 text-center">
                <img src="https://atapkita.com/images/linmas.png" alt="Penerima Bantuan" class="img-fluid" style="max-height:400px;object-fit:contain;">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-3" style="font-family:'Poppins',sans-serif;">Kenapa Memilih Bantu Peduli?</h2>
                <p class="mb-3">BantuPeduli.com sudah berdiri sejak tahun 2018 dan sudah berpengalaman dalam penggalangan dana dan donasi secara online.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Campaign yang tepat sasaran</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Dana yang disalurkan dapat dilihat secara transparan</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-primary me-2"></i>Siapa saja dapat menggalang dana dan berdonasi dengan mudah</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- TESTIMONI -->
    <div class="container mb-5">
        <div class="text-center mb-4">
            <span class="fw-semibold text-primary">Testimoni</span>
            <h2 class="fw-bold mb-2" style="font-family:'Poppins',sans-serif;">Apa Kata Mereka?</h2>
            <p class="mb-0">Mereka adalah #SobatKita yang telah menggunakan Bantu Peduli dan berbuat baik untuk sesama.</p>
        </div>
        <div id="logoCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 col-lg-5 mb-4 mb-md-0 text-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Testimoni 1">
                            <blockquote class="blockquote">
                                <p class="fs-5"><span style="color:#ff7043;font-size:2rem;vertical-align:top;">&ldquo;</span>Kategori di Bantu Peduli sangat lengkap, jadi kebutuhan apapun bisa dilakukan melalui platform ini.</p>
                            </blockquote>
                            <div class="fw-bold">Masad</div>
                            <div class="text-muted">PNS</div>
                        </div>
                        <div class="col-md-6 col-lg-5 text-center">
                            <img src="https://randomuser.me/api/portraits/men/44.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Testimoni 2">
                            <blockquote class="blockquote">
                                <p class="fs-5"><span style="color:#ff7043;font-size:2rem;vertical-align:top;">&ldquo;</span>Dengan Bantu Peduli saya lebih mudah mengumpulkan dana untuk campaign saya. Jadi saya dapat lebih cepat menyalurkan bantuan.</p>
                            </blockquote>
                            <div class="fw-bold">Ahmad Tri</div>
                            <div class="text-muted">Pegiat Sosial</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 col-lg-5 mb-4 mb-md-0 text-center">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Testimoni 3">
                            <blockquote class="blockquote">
                                <p class="fs-5"><span style="color:#ff7043;font-size:2rem;vertical-align:top;">&ldquo;</span>Platformnya mudah digunakan dan sangat membantu anak-anak panti asuhan.</p>
                            </blockquote>
                            <div class="fw-bold">Siti Aminah</div>
                            <div class="text-muted">Relawan</div>
                        </div>
                        <div class="col-md-6 col-lg-5 text-center">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Testimoni 4">
                            <blockquote class="blockquote">
                                <p class="fs-5"><span style="color:#ff7043;font-size:2rem;vertical-align:top;">&ldquo;</span>Donasi jadi lebih transparan dan aman. Saya sangat merekomendasikan!</p>
                            </blockquote>
                            <div class="fw-bold">Budi Santoso</div>
                            <div class="text-muted">Donatur</div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- PENGGUNA KAMI -->
    <div class="container mb-5">
        <div class="text-center mb-4">
            <span class="fw-semibold text-primary">Yang Pernah Menggunakan Bantu Peduli</span>
            <h2 class="fw-bold mb-2" style="font-family:'Poppins',sans-serif;">Pengguna Kami</h2>
            <p class="mb-0">Perusahaan dan lembaga berikut pernah menggunakan dan bekerjasama dengan Bantu Peduli</p>
        </div>
        <div id="logoCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap py-4">
                        <img src="https://katamata.wordpress.com/wp-content/uploads/2009/01/logo-its-biru-transparan.png" alt="ITS" style="height:100px;object-fit:contain;">
                        <img src="https://bmh.or.id/wp-content/uploads/2022/11/Logo-BMH-1-1024x413.png" alt="BMH" style="height:90px;object-fit:contain;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Logo_BAZNAS_RI-Hijau-01.png" alt="Baznas" style="height:90px;object-fit:contain;">
                        <img src="https://static.wixstatic.com/media/458dcb_2ec2bc76d562409b81414949e97385b1~mv2.png/v1/fit/w_2500,h_1330,al_c/458dcb_2ec2bc76d562409b81414949e97385b1~mv2.png" alt="BASMI FIP" style="height:90px;object-fit:contain;">
                        <img src="https://tadamon.community/uploads/images/Logo_ASAR_Humanity_logo_cc890593-59dc-44c7-a1ac-4ecec5ccadbb.png?v=63853423906" alt="Asar Humanity" style="height:90px;object-fit:contain;">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap py-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d9/Logo-web-dd-hijau.png" alt="Dompet Dhuafa" style="height:60px;object-fit:contain;">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEijWPi0sQzhDPUXYvFKa_B-ngmiVJixnxWQFLpIi1716AbRRYBsc9s4I_3lMsIIYezYyEOS1FDkcRoquGJv98bXgI5WKSxGuUi1ar7nNwg3OQfxt89KN2XtkvX8_zy5MM2Ndcb2R-w5F2E/s1600/aksi-cepat-tanggap-act-vector-logo.png" alt="ACT" style="height:60px;object-fit:contain;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Lazismu.png" alt="Lazismu" style="height:60px;object-fit:contain;">
                        <img src="https://care.rumahzakat.org/images/logoRZ.png" alt="Rumah Zakat" style="height:60px;object-fit:contain;">
                        <img src="https://wakafmandiri.org/storage/uploads/cR3KDoJCdA9oBGvIgvqo4J9LkLLOrwpuTLjMdiq7.png" alt="Yatim Mandiri" style="height:60px;object-fit:contain;">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#logoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#logoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<style>
.statistik-glass {
    background: linear-gradient(90deg, #0d47a1 20%, #1976d2 100%);
    backdrop-filter: blur(6px);
    box-shadow: 0 8px 32px rgba(21,101,192,0.12);
    color: #fff;
}
.stat-card {
    background: rgba(255,255,255,0.08);
    border-radius: 18px;
    padding: 24px 12px 18px 12px;
    box-shadow: 0 2px 12px rgba(21,101,192,0.04);
    transition: transform 0.15s;
    color: #fff;
}
.stat-card:hover {
    transform: translateY(-4px) scale(1.03);
    box-shadow: 0 8px 32px rgba(21,101,192,0.18);
}
.stat-icon {
    font-size: 2.2rem;
    margin-bottom: 8px;
    color: #fff;
    opacity: 0.85;
}
.stat-label {
    font-size: 1rem;
    opacity: 0.92;
    margin-top: 2px;
    color: #fff;
}
.fs-2.fw-bold, .fw-semibold {
    color: #fff !important;
}
/* Smooth transition for carousel fade */
#logoCarousel .carousel-item {
    transition: opacity 1s ease-in-out;
}
.hero-img-wrapper { position: relative; }
.hero-img { filter: brightness(0.7) blur(0px); width: 100%; height: 450px; object-fit: cover; }
.hero-overlay {
    background: linear-gradient(120deg, rgba(13,71,161,0.7) 0%, rgba(0,0,0,0.5) 100%);
    z-index: 1;
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
}
.hero-caption { z-index: 2; padding-top: 2.5rem; padding-bottom: 2.5rem; }
.btn-gradient {
    background: linear-gradient(90deg, #0d47a1 0%, #1976d2 100%);
    color: #fff;
    border: none;
    box-shadow: 0 4px 24px rgba(13,71,161,0.15);
    transition: background 0.3s, transform 0.2s;
}
.btn-gradient:hover {
    background: linear-gradient(90deg, #1976d2 0%, #0d47a1 100%);
    color: #fff;
    transform: translateY(-2px) scale(1.03);
}
.carousel-indicators [data-bs-target] {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #fff;
    opacity: 0.7;
    border: 2px solid #0d47a1;
}
.carousel-indicators .active {
    opacity: 1;
    background: #0d47a1;
}
.carousel-control-prev, .carousel-control-next {
    width: 3rem;
    height: 3rem;
    top: 50%;
    transform: translateY(-50%);
}
.carousel-control-prev-icon, .carousel-control-next-icon {
    width: 2.2rem;
    height: 2.2rem;
}
@media (max-width: 1200px) {
    .hero-img, .carousel-item img { height: 320px !important; }
    .hero-caption h1 { font-size: 1.7rem !important; }
    .hero-caption p { font-size: 1.05rem !important; }
}
@media (max-width: 768px) {
    .hero-img, .carousel-item img { height: 38vw !important; min-height: 180px !important; max-height: 220px !important; }
    .hero-caption { padding-top: 1.2rem; padding-bottom: 1.2rem; }
    .hero-caption h1 { font-size: 1.15rem !important; }
    .hero-caption p { font-size: 0.97rem !important; }
    .btn-gradient { font-size: 1rem; padding: 0.55rem 1.7rem; }
    .carousel-control-prev, .carousel-control-next {
        width: 2.1rem;
        height: 2.1rem;
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
        width: 1.3rem;
        height: 1.3rem;
    }
}
@media (max-width: 480px) {
    .hero-img, .carousel-item img { height: 42vw !important; min-height: 120px !important; max-height: 160px !important; }
    .hero-caption { padding-top: 0.7rem; padding-bottom: 0.7rem; }
    .hero-caption h1 { font-size: 0.98rem !important; }
    .hero-caption p { font-size: 0.8rem !important; }
    .btn-gradient { font-size: 0.85rem; padding: 0.4rem 1.1rem; }
    .carousel-control-prev, .carousel-control-next {
        width: 1.5rem;
        height: 1.5rem;
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
        width: 0.9rem;
        height: 0.9rem;
    }
}
.btn-detail-square {
    border-radius: 8px !important;
    border-width: 2px;
    font-weight: 500;
    padding: 0.32rem 1rem;
    font-size: 0.97rem;
    transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(13,71,161,0.04);
    letter-spacing: 0.5px;
}
.btn-detail-square:hover, .btn-detail-square:focus {
    background: #0d47a1;
    color: #fff;
    border-color: #0d47a1;
    box-shadow: 0 4px 18px rgba(13,71,161,0.13);
    transform: translateY(-2px) scale(1.04);
}
.kategori-card-glass {
    background: rgba(255,255,255,0.7);
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(13,71,161,0.07);
    border: 1.5px solid rgba(13,71,161,0.08);
    padding: 1.2rem 1.3rem 1rem 1.3rem;
    min-width: 120px;
    min-height: 120px;
    max-width: 150px;
    margin-bottom: 0.5rem;
    transition: box-shadow 0.22s, transform 0.22s, border 0.22s;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.kategori-card-glass:hover, .kategori-card-glass:focus {
    box-shadow: 0 8px 32px rgba(13,71,161,0.18);
    border: 2px solid #1976d2;
    transform: translateY(-6px) scale(1.04);
    background: rgba(255,255,255,0.92);
}
.kategori-icon-glass {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #e3f0ff 0%, #b3d1ff 100%);
    box-shadow: 0 2px 8px rgba(13,71,161,0.10);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 0.5rem;
}
.kategori-title {
    font-size: 1.08rem;
    color: #000 !important;
    letter-spacing: 0.1px;
    margin-top: 0.2rem;
}
@media (max-width: 768px) {
    .kategori-card-glass {
        min-width: 100px;
        max-width: 120px;
        padding: 0.8rem 0.7rem 0.7rem 0.7rem;
    }
    .kategori-title { font-size: 0.97rem; }
    .kategori-icon-glass { width: 44px; height: 44px; }
}
</style>
@endsection
