@extends('layouts.public')

@section('title', 'Giving | Philadelphia Gospel Assembly')
@section('meta_description', 'Giving and stewardship at Philadelphia Gospel Assembly Tanzania.')

@section('content')
<x-public.page-header
    eyebrow="Stewardship"
    title="Giving"
    subtitle="Give with joy. Give with purpose. Give with faith."
    image="Community Service.jpg" />

<div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="reveal clay-green relative -mt-10 overflow-hidden p-8 text-center sm:p-10">
        <div class="blob left-[-3rem] top-[-3rem] h-48 w-48 bg-pga-gold/25"></div>
        <div class="blob bottom-[-3rem] right-[-2rem] h-52 w-52 bg-pga-red/25" style="animation-delay:-5s"></div>
        <p class="relative font-display text-xl italic text-white sm:text-2xl">
            &ldquo;Each of you should give what you have decided in your heart to give...&rdquo;
        </p>
        <p class="relative mt-3 text-sm uppercase tracking-[0.2em] text-pga-gold-soft">&mdash; 2 Corinthians 9:7</p>
    </div>

    <section class="reveal py-16">
        <div class="clay p-7 sm:p-10">
            <p class="prose-pga text-center text-base">
                Giving is an expression of gratitude and worship to God. Your generosity helps Philadelphia
                Gospel Assembly support ministry, serve the community, care for people in need, and create
                opportunities for people to hear and grow in God&rsquo;s Word. Every gift makes a difference.
            </p>

            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                @php
                    $impact = [
                        ['icon' => 'M12 21s-6.716-4.297-9.428-9.058C.964 9.293 2.32 5.5 5.84 4.6c2.06-.527 4.06.42 5.16 2.06 1.1-1.64 3.1-2.587 5.16-2.06 3.52.9 4.876 4.693 3.268 7.342C18.716 16.703 12 21 12 21Z', 'title' => 'Ministry', 'text' => 'Sustaining worship and teaching.'],
                        ['icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72M18 18.72a3 3 0 0 0 .513-5.962M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6 18.72a9.094 9.094 0 0 1-3.741-.479 3 3 0 0 1 4.682-2.72M6 18.72a9.094 9.094 0 0 0 3.741-.479', 'title' => 'Community', 'text' => 'Serving our neighbours.'],
                        ['icon' => 'M12 7.5v13m0-13a4.5 4.5 0 0 0-8.25-3.16A4.5 4.5 0 0 0 3.75 21h16.5a4.5 4.5 0 0 0 0-9 4.5 4.5 0 0 1-8.25-4.5Z', 'title' => 'God’s Word', 'text' => 'Sharing the Gospel.'],
                    ];
                @endphp
                @foreach ($impact as $item)
                    <div class="clay-panel p-5 text-center">
                        <span class="mx-auto grid h-11 w-11 place-items-center rounded-xl bg-gradient-to-br from-pga-green to-pga-green-deep text-white">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                            </svg>
                        </span>
                        <h3 class="mt-3 font-display text-base font-semibold text-pga-green-deep">{{ $item['title'] }}</h3>
                        <p class="mt-1 text-xs text-pga-muted">{{ $item['text'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 rounded-2xl border border-pga-sand bg-white/60 p-6 text-center">
                <h2 class="font-display text-xl font-semibold text-pga-green-deep">Giving Instructions</h2>
                <p class="mx-auto mt-3 max-w-xl text-sm text-pga-muted">
                    Online payment details and giving instructions will be published once confirmed by the church.
                    We do not want to direct you to unverified payment information.
                </p>
                <p class="mt-4 text-sm text-pga-muted">
                    For giving enquiries, please
                    <a href="{{ route('contact') }}" class="font-semibold text-pga-red-deep underline underline-offset-4 hover:text-pga-green">contact the church</a>.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
