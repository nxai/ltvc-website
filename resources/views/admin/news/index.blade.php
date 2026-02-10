<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">ຈັດການຂ່າວສານ</li>
    </x-slot>

    <div class="py-5" style="font-family: 'Noto Sans Lao', sans-serif;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-primary mb-1">ລາຍຊື່ຂ່າວສານທັງໝົດ</h4>
                    <p class="text-muted small mb-0">ຈັດການຂໍ້ມູນຂ່າວສານທີ່ສະແດງຢູ່ໜ້າເວັບໄຊຫຼັກ</p>
                </div>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> ຂຽນຂ່າວໃໝ່
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div class="fw-bold">{{ session('success') }}</div>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 text-muted small text-uppercase" style="width: 120px;">ຮູບພາບ</th>
                                <th class="py-3 text-muted small text-uppercase">ຫົວຂໍ້ຂ່າວ</th>
                                <th class="py-3 text-muted small text-uppercase text-center">ຍອດວິວ</th>
                                <th class="py-3 text-muted small text-uppercase">ວັນທີໂພສ</th>
                                <th class="pe-4 py-3 text-muted small text-uppercase text-end">ຈັດການ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $item)
                            <tr class="border-bottom border-light">
                                <td class="ps-4 py-3">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" 
                                             class="rounded-3 shadow-sm border" 
                                             style="width: 80px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border text-muted" 
                                             style="width: 80px; height: 50px;">
                                            <i class="bi bi-image small"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark text-truncate" style="max-width: 300px;">
                                        {{ $item->title }}
                                    </div>
                                    <small class="text-muted">ID: #{{ $item->id }}</small>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-info-subtle text-info px-3">
                                        <i class="bi bi-eye me-1"></i> {{ number_format($item->views) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="small text-muted">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->format('d/m/Y') }}
                                    </div>
                                    <div class="text-muted" style="font-size: 11px;">
                                        {{ $item->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="btn-group shadow-sm rounded-pill overflow-hidden border">
                                        <a href="{{ route('admin.news.edit', $item->id) }}" 
                                           class="btn btn-sm btn-white text-warning px-3 border-end" 
                                           title="ແກ້ໄຂ">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-white text-danger px-3" 
                                                    onclick="return confirm('ທ່ານແນ່ໃຈບໍ່ວ່າຕ້ອງການລຶບຂ່າວນີ້?')"
                                                    title="ລຶບ">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-newspaper display-1 opacity-25"></i>
                                        <p class="mt-3 fs-5">ຍັງບໍ່ມີຂໍ້ມູນຂ່າວສານໃນລະບົບ</p>
                                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary rounded-pill px-4">ເລີ່ມຂຽນຂ່າວທຳອິດ</a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($news->hasPages())
                <div class="card-footer bg-white py-3 border-0">
                    {{ $news->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>