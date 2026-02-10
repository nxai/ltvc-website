<x-app-layout>
    <div class="container py-5">
        <div class="card border-0 shadow-lg rounded-4 p-4 mx-auto" style="max-width: 600px;">
            <h4 class="fw-bold mb-4 text-primary">ເພີ່ມຫຼັກສູດໃໝ່</h4>
            
            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">ເລືອກພາກວິຊາ</label>
                    <select name="department_id" class="form-select" required>
                        <option value="">-- ເລືອກພາກວິຊາ --</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}">{{ $dept->name_la }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">ຊື່ຫຼັກສູດ</label>
                    <input type="text" name="course_name" class="form-control" placeholder="ເຊັ່ນ: ພັດທະນາເວັບໄຊ" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">ລະດັບການສຶກສາ</label>
                        <select name="level" class="form-select" required>
                            <option value="ຊັ້ນສູງ">ຊັ້ນສູງ</option>
                            <option value="ຊັ້ນກາງ">ຊັ້ນກາງ</option>
                            <option value="ຊັ້ນຕົ້ນ">ຊັ້ນຕົ້ນ</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ໄລຍະເວລາ (ປີ)</label>
                        <input type="text" name="duration" class="form-control" placeholder="ເຊັ່ນ: 3 ປີ">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">ຄຳອະທິບາຍຫຍໍ້</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
<div class="mb-3">
    <label class="form-label">ຮູບພາບປະກອບ</label>
    <input type="file" name="image" class="form-control">
</div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">ບັນທຶກ</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-light px-4">ຍົກເລີກ</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>