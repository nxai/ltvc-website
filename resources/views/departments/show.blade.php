<x-app-layout>
    <x-page-header 
        :title="$department->name_la" 
        subtitle="ລາຍລະອຽດພາກວິຊາ ແລະ ຫຼັກສູດທີ່ເປີດສອນ" 
    />

    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">ໜ້າຫຼັກ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}" class="text-decoration-none">ພາກວິຊາ</a></li>
                <li class="breadcrumb-item active text-muted">{{ $department->name_la }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden sticky-top" style="top: 100px;">
                    @if($department->image)
                        <img src="{{ asset('storage/'.$department->image) }}" class="img-fluid w-100" style="max-height: 250px; object-fit: cover;">
                    @else
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="bi bi-building fs-1"></i>
                        </div>
                    @endif
                    <div class="card-body p-4">
                        <h3 class="fw-bold text-primary mb-3">{{ $department->name_la }}</h3>
                        <p class="text-muted small" style="line-height: 1.8;">{{ $department->description }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-warning p-2 rounded-3 me-3">
                        <i class="bi bi-journal-check fs-4"></i>
                    </div>
                    <h4 class="fw-bold mb-0">ຫຼັກສູດທີ່ເປີດສອນ</h4>
                </div>

                <div class="row g-4">
                    @forelse($department->courses as $course)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden hover-effect">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        @if($course->image)
                                            <img src="{{ asset('storage/' . $course->image) }}" 
                                                 class="img-fluid h-100 w-100 object-fit-cover" 
                                                 style="min-height: 180px;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center h-100 w-100" style="min-height: 180px;">
                                                <i class="bi bi-camera text-muted fs-1 opacity-25"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h5 class="fw-bold text-dark mb-0">{{ $course->course_name }}</h5>
                                                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3">
                                                    {{ $course->level }}
                                                </span>
                                            </div>
                                            <p class="text-muted small mb-3">{{ Str::limit($course->description, 150) }}</p>
                                            
                                            <div class="d-flex gap-3 align-items-center">
                                                <small class="text-primary fw-bold"><i class="bi bi-clock me-1"></i> {{ $course->duration ?? '3 ປີ' }}</small>
                                                <small class="text-muted">|</small>
                                                <small class="text-success fw-bold"><i class="bi bi-check-circle me-1"></i> ເປີດຮັບສະໝັກ</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                            <i class="bi bi-folder2-open display-4 text-muted opacity-25"></i>
                            <p class="mt-3 text-muted">ຍັງບໍ່ມີຂໍ້ມູນຫຼັກສູດໃນພາກວິຊານີ້</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
