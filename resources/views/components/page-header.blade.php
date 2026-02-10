@props(['title', 'subtitle' => ''])

<div class="py-5 text-white hero-gradient">
    <div class="container text-center py-4">
        <h1 class="display-4 fw-bold">{{ $title }}</h1>
        @if($subtitle)
            <p class="lead opacity-75">{{ $subtitle }}</p>
        @endif
        <div class="mx-auto bg-warning rounded-pill" style="height: 5px; width: 80px;"></div>
    </div>
</div>
