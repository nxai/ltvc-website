<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}" class="text-decoration-none">ຫຼັກສູດ</a></li>
        <li class="breadcrumb-item active">ແກ້ໄຂ</li>
    </x-slot>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="mb-4">
                    <a href="{{ route('admin.courses.index') }}" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> ກັບຄືນລາຍຊື່ຫຼັກສູດ
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-white text-center">
                        <h4 class="fw-bold mb-0">ແກ້ໄຂຂໍ້ມູນຫຼັກສູດ</h4>
                        <small class="opacity-75">ແກ້ໄຂລາຍລະອຽດວິຊາຮຽນໃຫ້ຖືກຕ້ອງ</small>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold">ພາກວິຊາສັງກັດ <span class="text-danger">*</span></label>
                                <select name="department_id" class="form-select @error('department_id') is-invalid @enderror" required>
                                    @foreach($departments as $dept)
                                        <option value="{{ $dept->id }}" {{ $course->department_id == $dept->id ? 'selected' : '' }}>
                                            {{ $dept->name_la }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">ຊື່ຫຼັກສູດ <span class="text-danger">*</span></label>
                                <input type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}" 
                                       class="form-control @error('course_name') is-invalid @enderror" required>
                                @error('course_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ລະດັບການສຶກສາ</label>
                                    <select name="level" class="form-select">
                                        <option value="ຊັ້ນສູງ" {{ $course->level == 'ຊັ້ນສູງ' ? 'selected' : '' }}>ຊັ້ນສູງ</option>
                                        <option value="ຊັ້ນກາງ" {{ $course->level == 'ຊັ້ນກາງ' ? 'selected' : '' }}>ຊັ້ນກາງ</option>
                                        <option value="ຊັ້ນຕົ້ນ" {{ $course->level == 'ຊັ້ນຕົ້ນ' ? 'selected' : '' }}>ຊັ້ນຕົ້ນ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ໄລຍະເວລາ (ປີ)</label>
                                    <input type="text" name="duration" value="{{ old('duration', $course->duration) }}" 
                                           class="form-control" placeholder="ເຊັ່ນ: 3 ປີ">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຄຳອະທິບາຍຫຍໍ້</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
                            </div>
<div class="mb-3">
    <label class="form-label">ຮູບພາບປະກອບ</label>
    <input type="file" name="image" class="form-control">
</div>
                            <hr class="my-4">

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.courses.index') }}" class="btn btn-light px-4 rounded-pill">ຍົກເລີກ</a>
                                <button type="submit" class="btn btn-warning px-4 rounded-pill fw-bold">
                                    <i class="bi bi-save me-1"></i> ບັນທຶກການປ່ຽນແປງ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>