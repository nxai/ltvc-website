<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}" class="text-decoration-none">ພາກວິຊາ</a></li>
        <li class="breadcrumb-item active">ແກ້ໄຂ</li>
    </x-slot>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="mb-4 text-muted small">
                    <a href="{{ route('admin.departments.index') }}" class="text-decoration-none text-muted">ຍົກເລີກການແກ້ໄຂ</a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-warning p-4 text-dark text-center">
                        <h4 class="fw-bold mb-0">ແກ້ໄຂພາກວິຊາ</h4>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.departments.update', $department->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">ຊື່ພາກວິຊາ</label>
                                <input type="text" name="name_la" value="{{ $department->name_la }}" class="form-control form-control-lg rounded-3" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຮູບພາບພາກວິຊາ</label>
                                @if($department->image)
                                    <div class="mb-2"><img src="{{ asset('storage/'.$department->image) }}" class="rounded shadow-sm" width="120"></div>
                                @endif
                                <div class="upload-area p-3 border border-dashed rounded-4 text-center bg-light">
                                    <input type="file" name="image" id="imgInput" class="form-control mb-2">
                                    <small class="text-muted">ເລືອກຮູບໃໝ່ເພື່ອປ່ຽນແທນ</small>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Icon Class</label>
                                <input type="text" name="icon" value="{{ $department->icon }}" class="form-control rounded-3">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning rounded-pill py-2 fw-bold shadow">ບັນທຶກການແກ້ໄຂ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>