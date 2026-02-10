<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}" class="text-decoration-none">ຂ່າວສານ</a></li>
        <li class="breadcrumb-item active">ຂຽນຂ່າວໃໝ່</li>
    </x-slot>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="{{ route('admin.news.index') }}" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> ກັບຄືນລາຍຊື່ຂ່າວສານ
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-white text-center">
                        <h4 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2"></i>ຂຽນຂ່າວສານໃໝ່</h4>
                        <small class="opacity-75">ຕື່ມຂໍ້ມູນຂ່າວສານ ແລະ ກິດຈະກຳໃຫ້ຄົບຖ້ວນ</small>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        {{-- ສິ່ງສຳຄັນ: ຕ້ອງມີ enctype="multipart/form-data" ເພື່ອໃຫ້ອັບໂຫຼດຮູບໄດ້ --}}
                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark">ຫົວຂໍ້ຂ່າວສານ <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}" 
                                       class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                       placeholder="ໃສ່ຫົວຂໍ້ຂ່າວທີ່ໂດດເດັ່ນ..." required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark">ເນື້ອໃນຂ່າວສານ <span class="text-danger">*</span></label>
                                <textarea name="content" id="editor" class="form-control @error('content') is-invalid @enderror" 
                                          rows="10" placeholder="ຂຽນລາຍລະອຽດຂ່າວສານທີ່ນີ້..." required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark">ຮູບພາບປະກອບຂ່າວ</label>
                                <div class="p-4 border border-dashed rounded-4 text-center bg-light position-relative">
                                    <input type="file" name="image" id="imageInput" 
                                           class="form-control position-absolute opacity-0 w-100 h-100 top-0 start-0" 
                                           style="cursor: pointer;" accept="image/*">
                                    
                                    <div id="uploadPlaceholder">
                                        <i class="bi bi-cloud-arrow-up display-4 text-primary"></i>
                                        <p class="mb-0 mt-2">ຄລິກ ຫຼື ລາກຮູບມາໃສ່ບ່ອນນີ້</p>
                                        <small class="text-muted">(JPG, PNG, JPEG ຂະໜາດບໍ່ເກີນ 2MB)</small>
                                    </div>

                                    <img id="imagePreview" src="#" alt="Preview" 
                                         class="img-fluid rounded-3 shadow-sm d-none mx-auto" 
                                         style="max-height: 250px;">
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <hr class="my-4 opacity-25">

                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.news.index') }}" class="btn btn-light px-4 rounded-pill fw-bold">ຍົກເລີກ</a>
                                <button type="submit" class="btn btn-primary px-5 rounded-pill fw-bold shadow">
                                    <i class="bi bi-send me-2"></i> ໂພສຂ່າວສານ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.css" />
    @endpush

    <script>
        document.getElementById('imageInput').onchange = function (evt) {
            const [file] = this.files;
            if (file) {
                document.getElementById('imagePreview').src = URL.createObjectURL(file);
                document.getElementById('imagePreview').classList.remove('d-none');
                document.getElementById('uploadPlaceholder').classList.add('d-none');
            }
        }
    </script>

    @push('scripts')
        <script type="importmap">
            { "imports": { "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.js", "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/44.3.0/" } }
        </script>
        <script type="module">
            import { ClassicEditor, Essentials, Bold, Italic, Heading, Link, List, Paragraph, BlockQuote, Image, ImageUpload, Base64UploadAdapter } from 'ckeditor5';

            ClassicEditor.create(document.querySelector('#editor'), {
                plugins: [Essentials, Bold, Italic, Heading, Link, List, Paragraph, BlockQuote, Image, ImageUpload, Base64UploadAdapter],
                toolbar: ['heading', '|', 'bold', 'italic', 'link', '|', 'bulletedList', 'numberedList', 'blockQuote', '|', 'uploadImage', '|', 'undo', 'redo'],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }
            }).catch(error => console.error(error));
        </script>
    @endpush
</x-admin-layout>