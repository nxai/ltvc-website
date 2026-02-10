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
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="5000">
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
