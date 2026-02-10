<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}" class="text-decoration-none">ຂໍ້ຄວາມຕິດຕໍ່</a></li>
        <li class="breadcrumb-item active">ລາຍລະອຽດ</li>
    </x-slot>

    <div class="container py-4" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <a href="{{ route('admin.contacts.index') }}" class="text-decoration-none text-muted">
                        <i class="bi bi-arrow-left me-1"></i> ກັບຄືນລາຍຊື່ຂໍ້ຄວາມ
                    </a>
                </div>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="bg-primary p-4 text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold mb-1"><i class="bi bi-person-fill me-2"></i>{{ $contact->name }}</h5>
                                <small class="opacity-75"><i class="bi bi-telephone me-1"></i>{{ $contact->phone }}</small>
                            </div>
                            <span class="badge {{ $contact->is_read ? 'bg-success' : 'bg-warning text-dark' }} rounded-pill px-3 py-2">
                                {{ $contact->is_read ? 'ອ່ານແລ້ວ' : 'ໃໝ່' }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">ຫົວຂໍ້</label>
                            <p class="fs-5 fw-bold">{{ $contact->subject }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">ເນື້ອໃນຂໍ້ຄວາມ</label>
                            <div class="bg-light rounded-3 p-4">
                                <p class="mb-0" style="white-space: pre-line;">{{ $contact->message }}</p>
                            </div>
                        </div>

                        <div class="text-muted small">
                            <i class="bi bi-clock me-1"></i> ສົ່ງເມື່ອ: {{ $contact->created_at->format('d/m/Y H:i:s') }}
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-light rounded-pill px-4">
                                <i class="bi bi-arrow-left me-1"></i> ກັບຄືນ
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-pill px-4" onclick="return confirm('ຢືນຢັນການລຶບຂໍ້ຄວາມນີ້?')">
                                    <i class="bi bi-trash me-1"></i> ລຶບຂໍ້ຄວາມ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
