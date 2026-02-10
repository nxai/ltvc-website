<x-app-layout>
    <div class="py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-primary mb-1">ຈັດການພາກວິຊາ</h4>
                    <p class="text-muted small mb-0">ລາຍຊື່ພາກວິຊາທັງໝົດໃນລະບົບ</p>
                </div>

            </div>

            @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 border-0 text-muted small uppercase">ຮູບພາບ</th>
                                <th class="py-3 border-0 text-muted small uppercase">ຊື່ພາກວິຊາ</th>
                                <th class="py-3 border-0 text-muted small uppercase text-center">Icon</th>
                                <th class="pe-4 py-3 border-0 text-muted small uppercase text-end">ຈັດການ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $dept)
                            <tr>
                                <td class="ps-4 py-3">
                                    @if($dept->image)
                                    <img src="{{ asset('storage/'.$dept->image) }}" class="rounded-3 shadow-sm" style="width: 60px; height: 40px; object-fit: cover;">
                                    @else
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted" style="width: 60px; height: 40px;">
                                        <i class="bi bi-image small"></i>
                                    </div>
                                    @endif
                                </td>
                                <td class="fw-bold text-dark">{{ $dept->name_la }}</td>
                                <td class="text-center">
                                    <div class="bg-warning-subtle text-warning rounded-3 d-inline-block px-3 py-1">
                                        <i class="bi {{ $dept->icon }} fs-5"></i>
                                    </div>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="btn-group shadow-sm rounded-pill overflow-hidden border">
                                        <a href="{{ route('admin.departments.edit', $dept->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> ແກ້ໄຂ
                                        </a>
                                        <form action="{{ route('admin.departments.destroy', $dept->id) }}" method="POST" class="d-inline" onsubmit="return confirm('ທ່ານແນ່ໃຈບໍ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> ລຶບ
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>