<x-app-layout>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-white text-center">
                        <h4 class="fw-bold mb-0">ເພີ່ມຮູບສະໄລ້ໃໝ່</h4>
                        <small class="opacity-75">ແນະນຳຂະໜາດຮູບ 1920x800px ເພື່ອຄວາມສວຍງາມ</small>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">ເລືອກຮູບພາບ <span class="text-danger">*</span></label>
                                <div class="upload-area p-4 border border-dashed rounded-4 text-center bg-light position-relative">
                                    <input type="file" name="image" id="sliderInput" class="form-control position-absolute opacity-0 w-100 h-100 top-0 start-0" style="cursor: pointer;" required>
                                    <div id="placeholder">
                                        <i class="bi bi-image-fill display-4 text-primary"></i>
                                        <p class="mt-2 mb-0">ຄລິກບ່ອນນີ້ເພື່ອເລືອກຮູບພາບ</p>
                                    </div>
                                    <img id="preview" src="#" alt="Preview" class="img-fluid rounded-3 shadow-sm d-none mx-auto" style="max-height: 250px;">
                                </div>
                                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">ຫົວຂໍ້ສະໄລ້ (Optional)</label>
                                <input type="text" name="title" class="form-control rounded-3" placeholder="ຕົວຢ່າງ: ຍິນດີຕ້ອນຮັບສູ່ LTVC">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຄຳອະທິບາຍ (Optional)</label>
                                <textarea name="description" class="form-control rounded-3" rows="3" placeholder="ໃສ່ລາຍລະອຽດສັ້ນໆ..."></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold shadow-sm">
                                    <i class="bi bi-cloud-arrow-up me-2"></i> ບັນທຶກ ແລະ ອັບໂຫຼດ
                                </button>
                                <a href="{{ route('sliders.index') }}" class="btn btn-light rounded-pill py-2">ຍົກເລີກ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ລະບົບ Preview ຮູບທັນທີເມື່ອເລືອກໄຟລ໌
        document.getElementById('sliderInput').onchange = function (evt) {
            const [file] = this.files;
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file);
                document.getElementById('preview').classList.remove('d-none');
                document.getElementById('placeholder').classList.add('d-none');
            }
        }
    </script>

    <style>
        .border-dashed { border: 2px dashed #004a99 !important; }
        .upload-area { transition: 0.3s; }
        .upload-area:hover { background-color: #eef4ff !important; border-color: #002d5d !important; }
    </style>
</x-app-layout>