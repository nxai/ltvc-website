<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}" class="text-decoration-none">ຂ່າວສານ</a></li>
        <li class="breadcrumb-item active">ແກ້ໄຂ</li>
    </x-slot>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="{{ route('admin.news.index') }}" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> ກັບຄືນ
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-warning p-4 text-dark text-center">
                        <h4 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2"></i>ແກ້ໄຂຂ່າວສານ</h4>
                        <small class="opacity-75">ປ່ຽນແປງຂໍ້ມູນຂ່າວສານຕາມທີ່ຕ້ອງການ</small>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- ສິ່ງສຳຄັນ: ຕ້ອງໃສ່ PUT ສຳລັບການ Update --}}

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຫົວຂໍ້ຂ່າວສານ</label>
                                <input type="text" name="title" value="{{ old('title', $news->title) }}" 
                                       class="form-control @error('title') is-invalid @enderror" required>
                                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ເນື້ອໃນຂ່າວສານ</label>
                                <textarea name="content" id="editor" class="form-control @error('content') is-invalid @enderror" 
                                          rows="10" required>{{ old('content', $news->content) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">ຮູບພາບປະກອບ</label>
                                
                                @if($news->image)
                                    <div class="mb-3">
                                        <p class="small text-muted mb-2">ຮູບປະຈຸບັນ:</p>
                                        <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid rounded-3 border shadow-sm" style="max-height: 150px;">
                                    </div>
                                @endif

                                <div class="p-4 border border-dashed rounded-4 text-center bg-light position-relative">
                                    <input type="file" name="image" id="imageInput" class="form-control position-absolute opacity-0 w-100 h-100 top-0 start-0" style="cursor: pointer;">
                                    <div id="uploadPlaceholder">
                                        <i class="bi bi-image-fill display-6 text-warning"></i>
                                        <p class="mb-0 mt-2">ຄລິກເພື່ອປ່ຽນຮູບໃໝ່</p>
                                    </div>
                                    <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded-3 shadow-sm d-none mx-auto" style="max-height: 200px;">
                                </div>
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.news.index') }}" class="btn btn-light px-4 rounded-pill">ຍົກເລີກ</a>
                                <button type="submit" class="btn btn-warning px-5 rounded-pill fw-bold shadow">
                                    <i class="bi bi-save me-2"></i> ບັນທຶກການແກ້ໄຂ
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