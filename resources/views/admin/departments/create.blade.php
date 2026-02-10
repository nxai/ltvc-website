<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}" class="text-decoration-none">ພາກວິຊາ</a></li>
        <li class="breadcrumb-item active">ເພີ່ມໃໝ່</li>
    </x-slot>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="mb-4">
                    <a href="{{ route('admin.departments.index') }}" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> ກັບຄືນ
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-white text-center">
                        <h4 class="fw-bold mb-0">ເພີ່ມພາກວິຊາໃໝ່</h4>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.departments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label fw-bold">ຊື່ພາກວິຊາ (ພາສາລາວ) <span class="text-danger">*</span></label>
                                <input type="text" name="name_la" class="form-control form-control-lg rounded-3" placeholder="ປ້ອນຊື່ພາກວິຊາ..." required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຮູບພາບປະກອບ</label>
                                <div class="upload-area p-4 border border-dashed rounded-4 text-center bg-light position-relative">
                                    <input type="file" name="image" id="imgInput" class="form-control position-absolute opacity-0 w-100 h-100 top-0 start-0" style="cursor: pointer;">
                                    <div id="placeholder">
                                        <i class="bi bi-cloud-arrow-up display-6 text-primary"></i>
                                        <p class="mb-0 mt-2 small">ຄລິກເພື່ອເລືອກຮູບພາບ</p>
                                    </div>
                                    <img id="preview" src="#" class="img-fluid rounded-3 d-none mx-auto" style="max-height: 200px;">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Icon (Bootstrap Class)</label>
                                <input type="text" name="icon" class="form-control rounded-3" value="bi-gear">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold shadow">ບັນທຶກຂໍ້ມູນ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        imgInput.onchange = evt => {
            const [file] = imgInput.files
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
                placeholder.classList.add('d-none');
            }
        }
    </script>
</x-admin-layout>