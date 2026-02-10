<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-family: 'Noto Sans Lao', sans-serif;">
            <i class="bi bi-speedometer2 me-2 text-primary"></i>{{ __('ແຜງຄວບຄຸມ (Dashboard)') }}
        </h2>
    </x-slot>

    <div class="py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="container">
            
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card blue-gradient h-100">
            <div class="card-body p-4 position-relative">
                <div class="position-relative z-1">
                    <h6 class="text-white text-uppercase opacity-75 small fw-bold mb-1">ພາກວິຊາທັງໝົດ</h6>
                    <h1 class="display-5 fw-bold text-white mb-0">{{ number_format($totalDepartments) }}</h1>
                    <div class="mt-3">
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-primary shadow-sm">
                            ຈັດການ <i class="bi bi-arrow-right-short ms-1"></i>
                        </a>
                    </div>
                </div>
                <i class="bi bi-building position-absolute end-0 bottom-0 m-3 text-white opacity-25" style="font-size: 4rem;"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card yellow-gradient h-100">
            <div class="card-body p-4 position-relative">
                <div class="position-relative z-1">
                    <h6 class="text-dark text-uppercase opacity-75 small fw-bold mb-1">ຫຼັກສູດທັງໝົດ</h6>
                    <h1 class="display-5 fw-bold text-dark mb-0">{{ number_format($totalCourses) }}</h1>
                    <div class="mt-3">
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-dark btn-sm rounded-pill px-3 fw-bold shadow-sm">
                            ຈັດການ <i class="bi bi-arrow-right-short ms-1"></i>
                        </a>
                    </div>
                </div>
                <i class="bi bi-mortarboard position-absolute end-0 bottom-0 m-3 text-dark opacity-10" style="font-size: 4rem;"></i>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden stat-card green-gradient h-100">
            <div class="card-body p-4 position-relative">
                <div class="position-relative z-1">
                    <h6 class="text-white text-uppercase opacity-75 small fw-bold mb-1">ຂ່າວສານທັງໝົດ</h6>
                    <h1 class="display-5 fw-bold text-white mb-0">{{ number_format($totalNews) }}</h1>
                    <div class="mt-3">
                        <a href="{{ route('admin.news.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-bold text-success shadow-sm">
                            ຈັດການຂ່າວ <i class="bi bi-arrow-right-short ms-1"></i>
                        </a>
                    </div>
                </div>
                <i class="bi bi-newspaper position-absolute end-0 bottom-0 m-3 text-white opacity-25" style="font-size: 4rem;"></i>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card border-0 shadow-sm rounded-4 bg-info text-white">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="fw-bold">ຂໍ້ຄວາມໃໝ່</h6>
                    <h2 class="fw-bold mb-0">{{ $unreadMessages }}</h2>
                </div>
                <i class="bi bi-chat-left-dots fs-1 opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 mt-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">ຂໍ້ຄວາມຕິດຕໍ່ລ່າສຸດ</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ຜູ້ຕິດຕໍ່</th>
                        <th>ຫົວຂໍ້</th>
                        <th>ວັນທີ</th>
                        <th>ສະຖານະ</th>
                        <th>ຈັດການ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentMessages as $msg)
                    <tr>
                        <td>{{ $msg->name }} <br> <small class="text-muted">{{ $msg->phone }}</small></td>
                        <td>{{ $msg->subject }}</td>
                        <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($msg->is_read)
                                <span class="badge bg-success-subtle text-success">ອ່ານແລ້ວ</span>
                            @else
                                <span class="badge bg-danger">ໃໝ່</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $msg->id) }}" class="btn btn-sm btn-outline-primary">ເບິ່ງລາຍລະອຽດ</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-4 px-4 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-primary">
                        <i class="bi bi-clock-history me-2"></i>ຫຼັກສູດທີ່ເພີ່ມເຂົ້າມາລ່າສຸດ
                    </h5>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 small">
                        ຂໍ້ມູນໃໝ່ {{ count($recentCourses) }} ລາຍການ
                    </span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 border-0 text-muted small text-uppercase">ຊື່ຫຼັກສູດ</th>
                                    <th class="py-3 border-0 text-muted small text-uppercase">ພາກວິຊາ</th>
                                    <th class="py-3 border-0 text-muted small text-uppercase text-center">ລະດັບຊັ້ນ</th>
                                    <th class="pe-4 py-3 border-0 text-muted small text-uppercase text-end">ວັນທີເພີ່ມ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentCourses as $course)
                                    <tr>
                                        <td class="ps-4 py-3 fw-bold text-dark">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary-subtle text-primary rounded-3 p-2 me-3 d-none d-sm-block">
                                                    <i class="bi bi-journal-text"></i>
                                                </div>
                                                {{ $course->course_name }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-light text-primary border border-primary-subtle px-3 py-2">
                                                {{ $course->department->name_la ?? 'ບໍ່ມີຂໍ້ມູນ' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-muted small fw-bold">{{ $course->level }}</span>
                                        </td>
                                        <td class="pe-4 py-3 text-end text-muted small">
                                            <i class="bi bi-calendar3 me-1"></i> {{ $course->created_at->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <i class="bi bi-folder2-open display-4 text-muted opacity-25"></i>
                                            <p class="mt-3 text-muted italic">ຍັງບໍ່ມີຂໍ້ມູນການເຄື່ອນໄຫວໃນເວລານີ້</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white py-3 text-center border-0 border-top border-light">
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-link btn-sm text-primary fw-bold text-decoration-none">
                        ເບິ່ງລາຍຊື່ຫຼັກສູດທັງໝົດ <i class="bi bi-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
            
        </div>
    </div>

</x-admin-layout>