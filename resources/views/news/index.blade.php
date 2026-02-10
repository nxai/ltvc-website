<x-app-layout>
    <div class="py-5 text-white" style="background: linear-gradient(135deg, #004a99 0%, #002d5d 100%);">
        <div class="container text-center py-4">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">ຂ່າວສານ ແລະ ກິດຈະກຳ</h1>
            <p class="lead opacity-75">ຕິດຕາມທຸກຄວາມເຄື່ອນໄຫວ ແລະ ປະກາດສຳຄັນຈາກ LTVC</p>
            <div class="mx-auto bg-warning rounded-pill" style="height: 5px; width: 80px;"></div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            @forelse($news as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 news-card-modern">
                    <div class="position-relative overflow-hidden" style="height: 220px; background-color: #f8f9fa;">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-100 h-100 object-fit-cover transition-img" alt="{{ $item->title }}">
                        @else
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted opacity-50">
                                <i class="bi bi-image fs-1"></i>
                            </div>
                        @endif
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-warning text-dark rounded-pill px-3 shadow-sm fw-bold">ຂ່າວໃໝ່</span>
                        </div>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="d-flex align-items-center mb-3 text-muted small">
                            <i class="bi bi-calendar3 me-2 text-primary"></i> {{ $item->created_at->format('d/m/Y') }}
                            <span class="mx-2 text-light">|</span>
                            <i class="bi bi-eye me-1 text-primary"></i> {{ number_format($item->views) }} ເຂົ້າຊົມ
                        </div>
                        <h5 class="fw-bold text-dark mb-3 line-clamp-2 h-auto" style="min-height: 3rem; line-height: 1.5;">
                            {{ $item->title }}
                        </h5>
                        <p class="text-muted small mb-4 flex-grow-1 line-clamp-3">
                            {{ Str::limit(strip_tags($item->content), 120) }}
                        </p>
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-outline-primary rounded-pill fw-bold w-100 transition-all border-2">
                            ອ່ານລາຍລະອຽດ <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-newspaper display-1 text-muted opacity-25"></i>
                <p class="mt-3 text-muted">ຍັງບໍ່ມີຂ່າວສານໃນເວລານີ້</p>
            </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center custom-pagination">
            {{ $news->links() }}
        </div>
    </div>
</x-app-layout>