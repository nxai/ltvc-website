<x-app-layout>
    <div class="container py-5" style="max-width: 1100px;">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-white p-3 rounded-pill px-4 shadow-sm border small">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-primary fw-bold">ໜ້າຫຼັກ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="text-decoration-none text-primary fw-bold">ຂ່າວສານ</a></li>
                <li class="breadcrumb-item active text-muted" aria-current="page">ລາຍລະອຽດ</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-8">
                <article class="bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                    <h1 class="fw-bold text-dark mb-4" style="line-height: 1.4; font-size: 2.3rem;">{{ $news->title }}</h1>
                    
                    <div class="d-flex align-items-center gap-4 text-muted mb-4 pb-3 border-bottom small">
                        <span><i class="bi bi-calendar3 me-2 text-primary"></i> {{ $news->created_at->format('d/m/Y') }}</span>
                        <span><i class="bi bi-eye me-2 text-primary"></i> ເຂົ້າຊົມ: {{ number_format($news->views) }} ຄັ້ງ</span>
                    </div>

                    @if($news->image)
                        <div class="mb-5 rounded-4 overflow-hidden shadow-sm">
                            <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid w-100" style="max-height: 550px; object-fit: cover;">
                        </div>
                    @endif

                    <div class="news-content fs-5 text-dark" style="line-height: 2.2; text-align: justify; font-family: 'Noto Sans Lao', sans-serif;">
                        {!! $news->content !!}
                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                            <p class="fw-bold text-muted mb-0"><i class="bi bi-share me-2"></i> ແບ່ງປັນຂ່າວນີ້:</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary rounded-circle shadow-sm"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="btn btn-success rounded-circle shadow-sm"><i class="bi bi-whatsapp"></i></a>
                                <a href="#" class="btn btn-dark rounded-circle shadow-sm"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <div class="p-4 bg-white rounded-4 shadow-sm border border-start border-warning border-5 mb-4">
                        <h4 class="fw-bold text-primary mb-0">ຂ່າວສານອື່ນໆ</h4>
                    </div>
                    
                    <div class="row g-3">
                        @foreach($relatedNews as $related)
                        <div class="col-12">
                            <a href="{{ route('news.show', $related->id) }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm rounded-3 overflow-hidden transition-all related-card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-4">
                                            @if($related->image)
                                                <img src="{{ asset('storage/' . $related->image) }}" class="w-100 h-100 object-fit-cover" style="height: 90px !important;">
                                            @else
                                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted small" style="height: 90px !important;">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-8 p-3">
                                            <h6 class="fw-bold text-dark small mb-1 line-clamp-2">{{ $related->title }}</h6>
                                            <small class="text-muted"><i class="bi bi-calendar me-1"></i> {{ $related->created_at->format('d/m/Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .related-card { transition: 0.3s; background: white; }
        .related-card:hover { transform: translateX(8px); background: #f8f9fa; }
        .news-content p { margin-bottom: 1.8rem; }
    </style>
</x-app-layout>