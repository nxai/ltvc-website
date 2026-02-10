<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">ຈັດການຮູບສະໄລ້</li>
    </x-slot>
    <div class="container py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-primary mb-0"><i class="bi bi-images me-2"></i>ຈັດການຮູບສະໄລ້ໜ້າທຳອິດ</h4>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> ເພີ່ມຮູບສະໄລ້ໃໝ່
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="small text-muted text-uppercase">
                            <th class="ps-4 py-3 border-0">ຮູບພາບ</th>
                            <th class="py-3 border-0">ຫົວຂໍ້</th>
                            <th class="py-3 border-0 text-center">ສະຖານະ</th>
                            <th class="pe-4 py-3 border-0 text-end">ຈັດການ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sliders as $slide)
                        <tr>
                            <td class="ps-4 py-3">
                                <img src="{{ asset('storage/' . $slide->image) }}" class="rounded-3 shadow-sm border" style="width: 120px; height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $slide->title ?? 'ບໍ່ມີຫົວຂໍ້' }}</div>
                                <small class="text-muted">{{ Str::limit($slide->description, 50) }}</small>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.sliders.toggle', $slide->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm rounded-pill px-3 border-0 {{ $slide->is_active ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}">
                                        @if($slide->is_active)
                                        <i class="bi bi-eye-fill me-1"></i> ກຳລັງສະແດງ
                                        @else
                                        <i class="bi bi-eye-slash-fill me-1"></i> ປິດໄວ້
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td class="pe-4 text-end">
                                <a href="{{ route('admin.sliders.edit', $slide->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3 me-1">
    <i class="bi bi-pencil-square"></i> ແກ້ໄຂ
</a>
                                <form action="{{ route('admin.sliders.destroy', $slide->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('ຢືນຢັນການລຶບຮູບສະໄລ້ນີ້?')">
                                        <i class="bi bi-trash me-1"></i> ລຶບ
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">ຍັງບໍ່ມີຮູບສະໄລ້ໃນລະບົບ</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>