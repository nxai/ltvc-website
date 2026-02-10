<aside class="admin-sidebar shadow-sm">
    <div class="p-4 border-bottom text-center bg-white">
        @if(isset($siteLogo) && $siteLogo)
            <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="img-fluid" style="max-height: 60px; object-fit: contain;">
        @else
            <h4 class="fw-bold text-primary mb-0">LTVC ADMIN</h4>
        @endif
    </div>

    <div class="mt-3 flex-grow-1 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>
        <a href="{{ route('admin.news.index') }}" class="nav-link-admin {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <i class="bi bi-newspaper"></i> ຈັດການຂ່າວ
        </a>
        <a href="{{ route('admin.departments.index') }}" class="nav-link-admin {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
            <i class="bi bi-building"></i> ຈັດການພາກວິຊາ
        </a>
        <a href="{{ route('admin.courses.index') }}" class="nav-link-admin {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
            <i class="bi bi-book-half"></i> ຈັດການຫຼັກສູດ
        </a>
        <a href="{{ route('admin.sliders.index') }}" class="nav-link-admin {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i> ຮູບສະໄລ້
        </a>
        <a href="{{ route('admin.contacts.index') }}" class="nav-link-admin {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
            <i class="bi bi-chat-left-dots"></i> ຂໍ້ຄວາມຕິດຕໍ່
        </a>
        <a href="{{ route('admin.settings.index') }}" class="nav-link-admin {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="bi bi-gear-fill"></i> ຕັ້ງຄ່າ Logo
        </a>
    </div>

    <div class="p-3 border-top bg-light">
        <a href="{{ url('/') }}" class="btn btn-outline-primary w-100 rounded-pill mb-2 fw-bold shadow-sm py-2">
            <i class="bi bi-globe me-2"></i> ເບິ່ງເວັບໄຊ
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100 rounded-pill fw-bold py-2">
                <i class="bi bi-box-arrow-right me-2"></i> ອອກລະບົບ
            </button>
        </form>
    </div>
</aside>
