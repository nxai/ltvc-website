<x-app-layout>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="mb-3">
                    <a href="{{ route('sliders.index') }}" class="text-decoration-none text-muted small">
                        <i class="bi bi-arrow-left"></i> ກັບຄືນ
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-warning p-4 text-dark text-center">
                        <h4 class="fw-bold mb-0">ແກ້ໄຂຮູບສະໄລ້</h4>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- ສິ່ງສຳຄັນສຳລັບການ Update --}}
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold">ຮູບພາບປັດຈຸບັນ</label>
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid rounded-3 shadow-sm border" style="max-height: 150px;">
                                </div>
                                
                                <label class="form-label fw-bold">ປ່ຽນຮູບໃໝ່ (ຖ້າຕ້ອງການ)</label>
                                <div class="upload-area p-4 border border-dashed rounded-4 text-center bg-light position-relative">
                                    <input type="file" name="image" id="sliderInput" class="form-control position-absolute opacity-0 w-100 h-100 top-0 start-0" style="cursor: pointer;">
                                    <div id="placeholder">
                                        <i class="bi bi-camera display-6 text-warning"></i>
                                        <p class="mt-2 mb-0 small">ຄລິກບ່ອນນີ້ເພື່ອເລືອກຮູບໃໝ່</p>
                                    </div>
                                    <img id="preview" src="#" alt="Preview" class="img-fluid rounded-3 shadow-sm d-none mx-auto" style="max-height: 200px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">ຫົວຂໍ້ສະໄລ້</label>
                                <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="form-control rounded-3">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຄຳອະທິບາຍ</label>
                                <textarea name="description" class="form-control rounded-3" rows="3">{{ old('description', $slider->description) }}</textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning rounded-pill py-2 fw-bold shadow-sm">
                                    <i class="bi bi-save me-2"></i> ບັນທຶກການແກ້ໄຂ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
        .border-dashed { border: 2px dashed #ffc107 !important; }
        .bg-warning { background-color: #ffc107 !important; }
    </style>
</x-app-layout>