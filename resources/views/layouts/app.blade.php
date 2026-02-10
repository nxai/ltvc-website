<!DOCTYPE html>
<html lang="lo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LTVC | ວິທະຍາໄລ ເຕັກນິກ-ວິຊາຊີບ ຫຼວງພະບາງ</title>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { 
            --sidebar-width: 270px; 
            --primary-blue: #004a99; 
            --light-bg: #f8f9fa; 
        }

        body { 
            font-family: 'Noto Sans Lao', sans-serif; 
            background-color: var(--light-bg); 
            margin: 0;
            overflow-x: hidden;
        }

        /* --- Sidebar Style --- */
        .admin-sidebar { 
            width: var(--sidebar-width); 
            height: 100vh; 
            position: fixed; 
            top: 0; 
            left: 0; 
            background: #fff; 
            border-right: 1px solid #eef2f6; 
            z-index: 1050; 
            display: flex; 
            flex-direction: column; 
            transition: transform 0.3s ease;
        }

        /* --- Main Content Logic --- */
        .main-wrapper { 
            min-height: 100vh; 
            display: flex; 
            flex-direction: column; 
            transition: margin-left 0.3s ease; 
        }

        /* ຍັບເນື້ອຫາອອກມາສະເພາະຕອນເປັນ Admin */
        .has-sidebar { 
            margin-left: var(--sidebar-width); 
        }

        /* --- Admin Navigation Links --- */
        .nav-link-admin { 
            padding: 12px 20px; 
            display: flex; 
            align-items: center; 
            color: #5a6a85; 
            text-decoration: none; 
            border-radius: 10px; 
            margin: 4px 15px; 
            font-weight: 500; 
            transition: 0.2s;
        }

        .nav-link-admin:hover { 
            background: #f0f4f9; 
            color: var(--primary-blue); 
        }

        .nav-link-admin.active { 
            background: var(--primary-blue); 
            color: #fff; 
            box-shadow: 0 4px 10px rgba(0,74,153,0.2); 
            font-weight: bold;
        }

        .nav-link-admin i { 
            font-size: 1.25rem; 
            margin-right: 12px; 
        }

        /* Responsive Mobile */
        @media (max-width: 991px) {
            .admin-sidebar { transform: translateX(-100%); }
            .has-sidebar { margin-left: 0 !important; }
        }
    </style>
</head>
<body class="antialiased">
    @php 
        // ກວດສອບວ່າແມ່ນໜ້າ Admin ຫຼື ບໍ່
        $isAdmin = request()->is('admin*') || request()->is('dashboard*') || request()->is('profile*'); 
    @endphp

    @if($isAdmin)
    <aside class="admin-sidebar shadow-sm">
        <div class="p-4 border-bottom text-center bg-white">
            @if(isset($siteLogo) && $siteLogo)
                <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo" class="img-fluid" style="max-height: 60px; object-fit: contain;">
            @else
                <h4 class="fw-bold text-primary mb-0">LTVC ADMIN</h4>
            @endif
        </div>

        <div class="mt-3 flex-grow-1 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="nav-link-admin {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="{{ route('admin.news.index') }}" class="nav-link-admin {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i> ຈັດການຂ່າວ
            </a>
           <a href="{{ route('admin.departments.index') }}" 
   class="nav-link-admin {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
    <i class="bi bi-building"></i> ຈັດການພາກວິຊາ
</a>
            <a href="{{ route('courses.index') }}" class="nav-link-admin {{ request()->routeIs('courses.*') ? 'active' : '' }}">
        <i class="bi bi-book-half"></i> ຈັດການຫຼັກສູດ
    </a>
            <a href="{{ route('sliders.index') }}" class="nav-link-admin {{ request()->routeIs('sliders.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> ຮູບສະໄລ້
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
    @endif

    <div class="main-wrapper {{ $isAdmin ? 'has-sidebar' : '' }}">
        
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-grow-1 {{ $isAdmin ? 'p-4' : '' }}">
            {{ $slot }}
        </main>

<footer class="ltvc-footer mt-5">
    <div class="footer-top-border"></div>

    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-info">
                    @if(isset($siteLogo) && $siteLogo)
                        <img src="{{ asset('storage/' . $siteLogo) }}" alt="LTVC Logo" class="footer-logo mb-3">
                    @else
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-mortarboard-fill text-warning fs-1 me-2"></i>
                            <h2 class="fw-bold text-white mb-0">LTVC</h2>
                        </div>
                    @endif
                    <p class="text-white-50 small pe-lg-4">
                        ວິທະຍາໄລ ເຕັກນິກ-ວິຊາຊີບ ຫຼວງພະບາງ ສ້າງຕັ້ງຂຶ້ນເພື່ອພັດທະນາຊັບພະຍາກອນມະນຸດ 
                        ໃຫ້ມີວິຊາຊີບທີ່ທັນສະໄໝ ແລະ ຕອບສະໜອງຄວາມຕ້ອງການຂອງສັງຄົມ.
                    </p>
                    <div class="social-icons d-flex gap-2 mt-4">
                        <a href="#" class="btn-social shadow-sm"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn-social shadow-sm"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="btn-social shadow-sm"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <h5 class="footer-heading fw-bold text-white mb-4">ລິ້ງດ່ວນ</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ url('/') }}">ໜ້າຫຼັກ</a></li>
                    <li><a href="{{ url('/departments') }}">ພາກວິຊາ</a></li>
                    <li><a href="{{ url('/news') }}">ຂ່າວສານ</a></li>
                    <li><a href="#">ກ່ຽວກັບພວກເຮົາ</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6 text-white">
                <h5 class="footer-heading fw-bold text-white mb-4">ຕິດຕໍ່ພວກເຮົາ</h5>
                <div class="contact-item mb-3 d-flex">
                    <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                    <p class="small mb-0 text-white-50">ບ້ານ ປ່າຂາມ, ນະຄອນ ຫຼວງພະບາງ, ແຂວງ ຫຼວງພະບາງ</p>
                </div>
                <div class="contact-item mb-3 d-flex">
                    <i class="bi bi-telephone-fill text-warning me-2"></i>
                    <p class="small mb-0 text-white-50">+856 71 212 123</p>
                </div>
                <div class="contact-item d-flex">
                    <i class="bi bi-envelope-at-fill text-warning me-2"></i>
                    <p class="small mb-0 text-white-50">info@ltvc.edu.la</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading fw-bold text-white mb-4">ທີ່ຕັ້ງວິທະຍາໄລ</h5>
                <div class="rounded-4 overflow-hidden border border-secondary shadow-sm" style="height: 150px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.328362627052!2d102.133203!3d19.882142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDUyJzU1LjciTiAxMDLCsDA4JzAwLjAiRQ!5e0!3m2!1slo!2sla!4v1620000000000!5m2!1slo!2sla" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3">
        <div class="container text-center">
            <p class="mb-0 small text-white-50">
                &copy; {{ date('Y') }} <span class="text-warning fw-bold">Luangprabang Technical-Vocational College</span>. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

<style>
    /* CSS ສີປະຈຳວິທະຍາໄລ LTVC */
    :root {
        --ltvc-blue: #004a99;
        --ltvc-dark: #002d5d;
        --ltvc-yellow: #ffcc00;
    }

    .ltvc-footer {
        background-color: var(--ltvc-dark);
        font-family: 'Noto Sans Lao', sans-serif;
        position: relative;
    }

    .footer-top-border {
        height: 5px;
        background-color: var(--ltvc-yellow);
        width: 100%;
    }

    .footer-logo {
        max-height: 70px;
        object-fit: contain;
    }

    .footer-heading::after {
        content: '';
        display: block;
        width: 40px;
        height: 3px;
        background-color: var(--ltvc-yellow);
        margin-top: 8px;
    }

    .footer-links li { margin-bottom: 10px; }
    .footer-links a {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        transition: 0.3s;
        font-size: 0.9rem;
    }
    .footer-links a:hover {
        color: var(--ltvc-yellow);
        padding-left: 8px;
    }

    .btn-social {
        width: 38px;
        height: 38px;
        background: rgba(255,255,255,0.1);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: 0.3s;
    }
    .btn-social:hover {
        background-color: var(--ltvc-yellow);
        color: var(--ltvc-dark);
        transform: translateY(-3px);
    }

    .footer-bottom {
        background-color: rgba(0,0,0,0.3);
        border-top: 1px solid rgba(255,255,255,0.05);
    }
</style>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>