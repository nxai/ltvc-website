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
