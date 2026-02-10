<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">ຕັ້ງຄ່າ</li>
    </x-slot>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-white text-center">
                        <h4 class="fw-bold mb-0"><i class="bi bi-gear-fill me-2"></i>ຕັ້ງຄ່າເວັບໄຊ</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.settings.updateLogo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center mb-4">
                                <label class="fw-bold d-block mb-3">Logo ວິທະຍາໄລປັດຈຸບັນ</label>
                                <div class="p-3 border rounded-4 bg-light d-inline-block">
                                    @if($siteLogo)
                                        <img src="{{ asset('storage/' . $siteLogo) }}" id="logoPreview" style="height: 100px; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('images/default-logo.png') }}" id="logoPreview" style="height: 100px; opacity: 0.5;">
                                        <p class="small text-muted mt-2">ຍັງບໍ່ມີ Logo</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ເລືອກ Logo ໃໝ່ (.png, .jpg, .svg)</label>
                                <input type="file" name="logo" class="form-control" onchange="previewImage(event)">
                                <small class="text-muted">ຂະໜາດທີ່ແນະນຳ: 500x500px (ພື້ນຫຼັງໂປ່ງໃສ)</small>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow">
                                <i class="bi bi-cloud-arrow-up me-2"></i> ອັບເດດ Logo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('logoPreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-admin-layout>