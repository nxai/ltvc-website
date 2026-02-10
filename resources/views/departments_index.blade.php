<x-app-layout>
    <div class="py-5 text-white" style="background: linear-gradient(135deg, #004a99 0%, #002d5d 100%);">
        <div class="container text-center py-4">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">ພາກວິຊາທັງໝົດ</h1>
            <p class="lead opacity-75">ລວມທຸກສາຂາວິຊາທີ່ເປີດສອນໃນ ວິທະຍາໄລ ເຕັກນິກ-ວິຊາຊີບ ຫຼວງພະບາງ</p>
            <div class="mx-auto bg-warning rounded-pill" style="height: 5px; width: 80px;"></div>
        </div>
    </div>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                @forelse($departments as $dept)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 rounded-4 overflow-hidden dept-grand-card shadow-sm h-100">
                        <div class="position-relative" style="height: 250px;">
                            @if($dept->image)
                                <img src="{{ asset('storage/' . $dept->image) }}" class="w-100 h-100 object-fit-cover transition-img" alt="{{ $dept->name_la }}">
                            @else
                                <div class="w-100 h-100 bg-primary d-flex align-items-center justify-content-center text-white-50">
                                    <i class="bi bi-building fs-1"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, transparent 50%, rgba(0,74,153,0.8) 100%);"></div>
                            
                            <div class="position-absolute bottom-0 end-0 m-3">
                                <div class="bg-warning text-dark p-2 rounded-3 shadow d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi {{ $dept->icon ?? 'bi-bookmark-star' }} fs-3"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4 text-center">
                            <h4 class="fw-bold text-dark mb-3">{{ $dept->name_la }}</h4>
                            <p class="text-muted small mb-4" style="height: 4.5rem; overflow: hidden;">
                                {{ Str::limit($dept->description, 120) }}
                            </p>
                            <a href="{{ route('department.show', $dept->id) }}" class="btn btn-primary rounded-pill px-4 fw-bold w-100 transition-all shadow-sm">
                                ເບິ່ງຫຼັກສູດທັງໝົດ <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-folder2-open display-1 text-muted opacity-25"></i>
                    <p class="mt-3 text-muted">ຍັງບໍ່ມີຂໍ້ມູນພາກວິຊາໃນລະບົບ</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        .dept-grand-card { transition: all 0.4s ease; }
        .dept-grand-card:hover { transform: translateY(-12px); box-shadow: 0 20px 40px rgba(0,74,153,0.15) !important; }
        .transition-img { transition: transform 0.8s ease; }
        .dept-grand-card:hover .transition-img { transform: scale(1.1); }
        .object-fit-cover { object-fit: cover; }
        .transition-all { transition: all 0.3s ease; }
        
        .btn-primary { background-color: #004a99; border: none; }
        .btn-primary:hover { background-color: #002d5d; transform: scale(1.02); }
    </style>
</x-app-layout>