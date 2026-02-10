<x-admin-layout>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">ຈັດການຫຼັກສູດ</li>
    </x-slot>
    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-4">
                <h2 class="fw-bold text-primary mb-0">ຈັດການຫຼັກສູດ</h2>
            </div>
            <div class="col-md-5">
                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                    <span class="input-group-text bg-white border-0 ps-4">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" id="search-input" class="form-control border-0 py-2 px-3" placeholder="ພິມຊື່ຫຼັກສູດ ຫຼື ພາກວິຊາເພື່ອຄົ້ນຫາ...">
                </div>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary rounded-pill px-4">+ ເພີ່ມໃໝ່</a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">ຮູບ</th><th>ພາກວິຊາ</th><th>ຊື່ຫຼັກສູດ</th><th>ລະດັບ</th><th>ໄລຍະເວລາ</th><th class="text-center">ຈັດການ</th>
                        </tr>
                    </thead>
                    <tbody id="course-table-body">
                        @include('admin.courses._table')
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('search-input');
        const tableBody = document.getElementById('course-table-body');

        searchInput.addEventListener('input', function() {
            const query = this.value;

            // ໃຊ້ Fetch API ເພື່ອດຶງຂໍ້ມູນແບບ AJAX
            fetch(`{{ route('admin.courses.index') }}?search=${query}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                tableBody.innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
        });

        // ຈັດການ Pagination ໃຫ້ເປັນ AJAX ນຳ
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                let url = e.target.closest('.pagination a').href;
                
                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.text())
                .then(html => {
                    tableBody.innerHTML = html;
                    window.scrollTo(0, 0); // ເລື່ອນຂຶ້ນເທິງ
                });
            }
        });
    </script>
</x-admin-layout>