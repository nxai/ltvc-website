<x-app-layout>
  <section id="hero-slider" class="carousel slide carousel-fade shadow-sm" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($sliders as $key => $slide)
            <button type="button" data-bs-target="#hero-slider" data-bs-slide-to="{{ $key }}" 
                class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}">
            </button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @forelse($sliders as $key => $slide)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000"> {{-- ປ່ຽນຮູບທຸກໆ 5 ວິນາທີ --}}
            <div class="position-relative hero-wrapper">
                <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100 h-100 object-fit-cover">
                <div class="hero-overlay"></div>
                <div class="carousel-caption d-none d-md-flex align-items-center h-100 start-0 text-start">
                    <div class="container">
                        <div class="glass-box p-5 animate__animated animate__fadeInUp">
                            <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold">WELCOME TO LTVC</span>
                            <h1 class="display-3 fw-bold text-white mb-3">{{ $slide->title }}</h1>
                            <p class="fs-5 text-white-50 mb-4">{{ $slide->description }}</p>
                            <div class="d-flex gap-3">
                                <a href="#departments" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold shadow-lg">ເລີ່ມຕົ້ນຮຽນຮູ້</a>
                                <a href="{{ route('news.index') }}" class="btn btn-outline-light btn-lg rounded-pill px-5 fw-bold backdrop-blur">ຂ່າວສານໃໝ່</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="carousel-item active">
            <div class="bg-primary d-flex align-items-center justify-content-center text-white hero-wrapper">
                <h2 class="fw-bold">ວິທະຍາໄລ ເຕັກນິກ-ວິຊາຊີບ ຫຼວງພະບາງ</h2>
            </div>
        </div>
        @endforelse
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#hero-slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

    <div class="container mt-n5 position-relative z-index-10">
        <div class="row g-0 rounded-4 shadow-xl overflow-hidden bg-white">
            <div class="col-md-4 p-4 border-end d-flex align-items-center justify-content-center bg-primary text-white">
                <i class="bi bi- Mortarboard fs-1 me-3"></i>
                <div class="text-start">
                    <h4 class="fw-bold mb-0">15+</h4>
                    <p class="small mb-0 opacity-75">ສາຂາວິຊາທີ່ເປີດສອນ</p>
                </div>
            </div>
            <div class="col-md-4 p-4 border-end d-flex align-items-center justify-content-center bg-white text-dark">
                <i class="bi bi-people fs-1 me-3 text-primary"></i>
                <div class="text-start">
                    <h4 class="fw-bold mb-0">1,200+</h4>
                    <p class="small mb-0 text-muted">ນັກສຶກສາໃນສົກຮຽນນີ້</p>
                </div>
            </div>
            <div class="col-md-4 p-4 d-flex align-items-center justify-content-center bg-warning text-dark">
                <i class="bi bi-trophy fs-1 me-3"></i>
                <div class="text-start">
                    <h4 class="fw-bold mb-0">100%</h4>
                    <p class="small mb-0 opacity-75">ເນັ້ນການປະຕິບັດຕົວຈິງ</p>
                </div>
            </div>
        </div>
    </div>

    <section id="news" class="py-5 mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase tracking-wider mb-2">LATEST UPDATES</h6>
                <h2 class="fw-bold display-5 text-dark">ຂ່າວສານ & ກິດຈະກຳ</h2>
                <div class="mx-auto bg-primary rounded-pill mt-3" style="width: 60px; height: 4px;"></div>
            </div>

            <div class="row g-4">
                @foreach($latestNews as $news)
                <div class="col-lg-4">
                    <div class="card border-0 h-100 shadow-hover transition-all rounded-4 overflow-hidden">
                        <div class="img-zoom-container" style="height: 240px;">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image text-muted display-4"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 me-3">ກິດຈະກຳ</span>
                                <small class="text-muted"><i class="bi bi-clock me-1"></i> {{ $news->created_at->format('d M Y') }}</small>
                            </div>
                            <h5 class="fw-bold mb-3 line-clamp-2 text-dark lh-base">{{ $news->title }}</h5>
                            <p class="text-muted small mb-4 line-clamp-3">{{ strip_tags($news->content) }}</p>
                            <a href="{{ url('/news/'.$news->id) }}" class="btn btn-link p-0 text-primary fw-bold text-decoration-none">
                                ອ່ານເພີ່ມເຕີມ <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

   <section id="departments" class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold text-uppercase tracking-widest mb-2">Academic Programs</h6>
                <h2 class="fw-bold display-5">ພາກວິຊາທີ່ເປີດສອນ</h2>
                <div class="mx-auto bg-warning rounded-pill mt-3" style="width: 80px; height: 5px;"></div>
            </div>

            <div class="row g-4">
                @forelse($departments as $dept)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 rounded-4 overflow-hidden dept-grand-card shadow">
                        <div class="dept-img-wrapper">
                            @if($dept->image)
                                <img src="{{ asset('storage/' . $dept->image) }}" class="w-100 h-100 object-fit-cover" alt="{{ $dept->name_la }}">
                            @else
                                <div class="w-100 h-100 bg-primary d-flex align-items-center justify-content-center">
                                    <i class="bi bi-mortarboard text-white-50 display-1"></i>
                                </div>
                            @endif
                        </div>

                        <div class="dept-overlay-layer"></div>

                        <div class="dept-content-box p-5 text-white d-flex flex-column justify-content-end">
                            <div class="dept-icon-box mb-3 shadow-lg">
                                <i class="bi {{ $dept->icon ?? 'bi-bookmark-star' }}"></i>
                            </div>
                            <h3 class="fw-bold mb-2">{{ $dept->name_la }}</h3>
                            <p class="text-white-50 mb-4 line-clamp-2">{{ Str::limit($dept->description, 100) }}</p>
                            
                            <div class="pt-3 border-top border-white border-opacity-25 d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-warning small text-uppercase">Explore More</span>
                                <i class="bi bi-arrow-right-circle fs-3 text-warning"></i>
                            </div>
                            
                            <a href="{{ route('department.show', $dept->id) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">ຍັງບໍ່ມີຂໍ້ມູນພາກວິຊາ</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        /* ໂຄງສ້າງ Card ໃຫມ່ */
        .dept-grand-card {
            position: relative;
            height: 480px; /* ຂະໜາດໃຫຍ່ຂຶ້ນ (ປັບໄດ້ຕາມໃຈ) */
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
        }

        .dept-img-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            transition: transform 1.2s ease;
        }

        .dept-grand-card:hover .dept-img-wrapper {
            transform: scale(1.1); /* Zoom ຮູບພາບ */
        }

        /* Overlay ແບບ Premium */
        .dept-overlay-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, 
                rgba(0, 0, 0, 0) 0%, 
                rgba(0, 0, 0, 0.2) 40%, 
                rgba(0, 74, 153, 0.95) 100%);
            z-index: 2;
            transition: 0.4s;
        }

        .dept-grand-card:hover .dept-overlay-layer {
            background: linear-gradient(to bottom, 
                rgba(0, 0, 0, 0.2) 0%, 
                rgba(0, 40, 80, 0.98) 100%);
        }

        /* ສ່ວນເນື້ອຫາ */
        .dept-content-box {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            transition: 0.4s;
        }

        .dept-grand-card:hover .dept-content-box {
            transform: translateY(-10px);
        }

        /* Icon Box */
        .dept-icon-box {
            width: 65px;
            height: 65px;
            background: #ffcc00;
            color: #000;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            transition: 0.5s;
        }

        .dept-grand-card:hover .dept-icon-box {
            transform: rotateY(180deg);
            background: #fff;
            color: #004a99;
        }

        .tracking-widest { letter-spacing: 0.2em; }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 991px) {
            .dept-grand-card { height: 400px; }
        }
    </style>

    <style>
        :root { --primary-ltvc: #004a99; --warning-ltvc: #ffcc00; }
        
        body { font-family: 'Noto Sans Lao', sans-serif; color: #333; }
        .hero-wrapper { height: 650px; }
        .hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.2) 100%); }
        
        /* Glassmorphism Effect */
        .glass-box { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-left: 5px solid var(--warning-ltvc); border-radius: 1rem; }
        .backdrop-blur { backdrop-filter: blur(5px); }
        
        /* News Cards */
        .shadow-hover { transition: all 0.3s ease; }
        .shadow-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important; }
        .img-zoom-container { overflow: hidden; }
        .img-zoom-container img { transition: transform 0.5s ease; }
        .shadow-hover:hover img { transform: scale(1.1); }
        .bg-primary-subtle { background-color: #e7f1ff; }

        /* Modern Dept Cards */
        .dept-modern-card { position: relative; height: 320px; border: none; }
        .dept-img-box { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; transition: 0.5s; }
        .dept-modern-card:hover .dept-img-box { transform: scale(1.1); }
        .dept-card-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: linear-gradient(to bottom, transparent 30%, rgba(0,74,153,0.9) 100%); transition: 0.3s; }
        .dept-modern-card:hover .dept-card-overlay { background: linear-gradient(to bottom, transparent 10%, rgba(0,30,80,0.95) 100%); }
        .dept-icon-circle { width: 60px; height: 60px; background: var(--warning-ltvc); color: #000; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: 0.3s; }
        .dept-modern-card:hover .dept-icon-circle { transform: rotateY(180deg); background: #fff; color: var(--primary-ltvc); }

        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .mt-n5 { margin-top: -5rem !important; }
        .z-index-10 { z-index: 10; }
        
        @media (max-width: 768px) { .hero-wrapper { height: 400px; } .mt-n5 { margin-top: -2rem !important; } }
    </style>
</x-app-layout>