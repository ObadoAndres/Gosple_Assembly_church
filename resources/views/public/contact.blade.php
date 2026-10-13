@extends('layouts.public')

@section('title', 'Contact | Philadelphia Gospel Assembly')
@section('meta_description', 'Contact Philadelphia Gospel Assembly Tanzania in Dodoma.')

@php
    $phones = ['+255 757 452 410', '+255 784 993 496', '+255 784 925 922'];
    $email = 'philadeliphiagospelassembly@gmail.com';
@endphp

@section('content')
<x-public.page-header
    eyebrow="Contact"
    title="Get in touch with us"
    subtitle="Whether you are visiting Dodoma, looking for a church family, or have a question about the ministry, we would love to hear from you."
    image="pjiladelphia full gospel assembly.jpg" />

<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    <div class="-mt-10 grid gap-6 lg:grid-cols-3">
        {{-- Location card --}}
        <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
           target="_blank" rel="noopener noreferrer" class="reveal card-premium lift group relative z-10 flex flex-col p-7">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-pga-green to-pga-green-deep text-white shadow-soft">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
            </span>
            <h2 class="mt-5 font-display text-lg font-semibold text-pga-green-deep">Location</h2>
            <p class="mt-2 flex-1 text-sm text-pga-muted">Philadelphia Gospel Assembly<br>Dodoma Branch, Tanzania<br>RQV2+7QX, Dodoma</p>
            <span class="footer-link mt-4 !text-pga-green">Get directions &rarr;</span>
        </a>

        {{-- Phone card --}}
        <div class="reveal reveal-delay-1 card-premium lift relative z-10 flex flex-col p-7">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-pga-red to-pga-red-deep text-white shadow-soft">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.517-.349-.967-.849-1.092l-5.068-1.267a1.125 1.125 0 0 0-1.217.457l-.663.995a12.042 12.042 0 0 1-5.122-5.122l.995-.663c.4-.267.583-.756.457-1.217L8.523 5.1A1.125 1.125 0 0 0 7.43 4.25H6.06A2.25 2.25 0 0 0 3.81 6.5" />
                </svg>
            </span>
            <h2 class="mt-5 font-display text-lg font-semibold text-pga-green-deep">Call Us</h2>
            <ul class="mt-3 flex-1 space-y-2">
                @foreach ($phones as $phone)
                    @php $tel = preg_replace('/\s+/', '', $phone); @endphp
                    <li>
                        <a href="tel:{{ $tel }}" class="footer-link !text-pga-ink/80 hover:!text-pga-green">{{ $phone }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Email card --}}
        <a href="mailto:{{ $email }}" class="reveal reveal-delay-2 card-premium lift relative z-10 flex flex-col p-7">
            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-gradient-to-br from-pga-gold-soft to-pga-gold-deep text-pga-green-night shadow-soft">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
            </span>
            <h2 class="mt-5 font-display text-lg font-semibold text-pga-green-deep">Email Us</h2>
            <p class="mt-2 flex-1 break-all text-sm text-pga-muted">{{ $email }}</p>
            <span class="footer-link mt-4 !text-pga-green">Send a message &rarr;</span>
        </a>
    </div>

    {{-- Map --}}
    <section class="reveal py-16">
        <div class="clay overflow-hidden p-0">
            <div class="flex flex-col gap-4 p-7 sm:flex-row sm:items-center sm:justify-between sm:p-8">
                <div>
                    <p class="eyebrow">Find Us</p>
                    <h2 class="mt-3 font-display text-2xl font-semibold text-pga-green-deep">Visit us in Dodoma</h2>
                    <p class="mt-1 text-sm text-pga-muted">RQV2+7QX, Dodoma, Tanzania</p>
                </div>
                <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
                   target="_blank" rel="noopener noreferrer" class="btn btn-primary whitespace-nowrap">Open in Maps</a>
            </div>
            <iframe
                title="Map showing Philadelphia Gospel Assembly, Dodoma"
                src="https://www.google.com/maps?q=RQV2%2B7QX%20Dodoma%20Tanzania&amp;z=15&amp;output=embed"
                class="h-80 w-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0;"></iframe>
        </div>
    </section>
</div>
@endsection
