<!DOCTYPE html>
<html lang="lo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LTVC Admin | {{ $title ?? 'Dashboard' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/ltvc-theme.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="antialiased">
    @include('partials.sidebar')

    <div class="main-wrapper has-sidebar">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-grow-1 p-4">
            @isset($breadcrumb)
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb small">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                                <i class="bi bi-house-door me-1"></i>Dashboard
                            </a>
                        </li>
                        {{ $breadcrumb }}
                    </ol>
                </nav>
            @endisset

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>
</html>
