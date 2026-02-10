@foreach($courses as $course)
<tr>
    <td class="ps-4">
        @if($course->image)
            <img src="{{ asset('storage/' . $course->image) }}" class="rounded-3 shadow-sm border" style="width: 60px; height: 45px; object-fit: cover;">
        @else
            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center border" style="width: 60px; height: 45px;">
                <i class="bi bi-image text-muted opacity-50"></i>
            </div>
        @endif
    </td>
    <td><span class="badge bg-blue-100 text-blue-800">{{ $course->department->name_la }}</span></td>
    <td><div class="fw-bold">{{ $course->course_name }}</div></td>
    <td>{{ $course->level }}</td>
    <td><i class="bi bi-clock me-1"></i> {{ $course->duration ?? '-' }}</td>
    <td class="text-center">
        <div class="btn-group shadow-sm rounded-pill overflow-hidden">
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning border-0 px-3"><i class="bi bi-pencil-square"></i></a>
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger border-0 px-3" onclick="return confirm('ຢືນຢັນການລຶບ?')"><i class="bi bi-trash"></i></button>
            </form>
        </div>
    </td>
</tr>
@endforeach

<tr>
    <td colspan="6" class="p-0">
        <div class="d-flex justify-content-between align-items-center mt-3 px-4">
            <div class="text-muted small">
                ສະແດງ {{ $courses->firstItem() }} ຫາ {{ $courses->lastItem() }} ຈາກ {{ $courses->total() }}
            </div>
            <div>
                {{ $courses->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </td>
</tr>