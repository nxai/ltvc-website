<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">ຂໍ້ຄວາມຕິດຕໍ່</li>
    </x-slot>

    <div class="container py-4" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-primary mb-1"><i class="bi bi-chat-left-dots me-2"></i>ຂໍ້ຄວາມຕິດຕໍ່ທັງໝົດ</h4>
                <p class="text-muted small mb-0">ຈັດການຂໍ້ຄວາມທີ່ສົ່ງມາຈາກໜ້າເວັບໄຊ</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 mb-3">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 border-0">#</th>
                            <th class="py-3 border-0">ຜູ້ຕິດຕໍ່</th>
                            <th class="py-3 border-0">ຫົວຂໍ້</th>
                            <th class="py-3 border-0">ວັນທີ</th>
                            <th class="py-3 border-0 text-center">ສະຖານະ</th>
                            <th class="pe-4 py-3 border-0 text-end">ຈັດການ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                                <td class="ps-4">{{ $contact->id }}</td>
                                <td>
                                    <div class="fw-bold">{{ $contact->name }}</div>
                                    <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $contact->phone }}</small>
                                </td>
                                <td>{{ $contact->subject }}</td>
                                <td class="text-muted small">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-center">
                                    @if($contact->is_read)
                                        <span class="badge bg-success-subtle text-success rounded-pill px-3">ອ່ານແລ້ວ</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill px-3">ໃໝ່</span>
                                    @endif
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                        <i class="bi bi-eye me-1"></i> ເບິ່ງ
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('ຢືນຢັນການລຶບຂໍ້ຄວາມນີ້?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-chat-left-dots display-1 text-muted opacity-25"></i>
                                    <p class="mt-3 text-muted">ຍັງບໍ່ມີຂໍ້ຄວາມຕິດຕໍ່ໃນລະບົບ</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $contacts->links() }}
        </div>
    </div>
</x-admin-layout>
