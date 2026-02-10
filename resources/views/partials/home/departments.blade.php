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
