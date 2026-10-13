@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => null,
    'image' => 'hero.jpg',
])

<section class="relative isolate overflow-hidden">
    <img src="{{ asset('images/' . $image) }}" alt="" aria-hidden="true"
         class="absolute inset-0 -z-20 h-full w-full object-cover object-center" loading="lazy">
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-pga-green-night/94 via-pga-green-deep/88 to-pga-green-night/96" aria-hidden="true"></div>
    <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <div class="blob left-[-3rem] top-[-2rem] h-56 w-56 bg-pga-gold/25"></div>
        <div class="blob bottom-[-4rem] right-[-2rem] h-64 w-64 bg-pga-red/25" style="animation-delay:-6s"></div>
    </div>

    <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="max-w-3xl">
            @if ($eyebrow)
                <span class="reveal eyebrow eyebrow--light">{{ $eyebrow }}</span>
            @endif
            <h1 class="reveal reveal-delay-1 mt-4 font-display text-3xl font-semibold leading-tight text-white sm:text-4xl lg:text-5xl">
                {{ $title }}
            </h1>
            @if ($subtitle)
                <p class="reveal reveal-delay-2 mt-4 max-w-2xl text-base text-white/75 sm:text-lg">{{ $subtitle }}</p>
            @endif
        </div>
    </div>
    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-pga-gold/60 to-transparent"></div>
</section>
