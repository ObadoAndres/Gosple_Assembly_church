@extends('layouts.public')

@section('title', 'Services | Philadelphia Gospel Assembly')
@section('meta_description', 'Weekly worship, prayer, choir, youth, and teaching timetable for Philadelphia Gospel Assembly Tanzania.')

@section('content')
<x-public.page-header
    eyebrow="Join Us"
    title="Service Times & Weekly Timetable"
    subtitle="Come as you are. We would love to welcome you and your family for worship, prayer, fellowship, and the teaching of God’s Word."
    image="Worship & Music Ministry.jpg" />

<div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
    {{-- Quick times --}}
    <div class="-mt-10 grid gap-4 sm:grid-cols-3">
        @php
            $quick = [
                ['label' => 'Sunday School', 'time' => '9:00 – 10:00 AM'],
                ['label' => 'Main Service', 'time' => '10:00 AM – 12:00 PM'],
                ['label' => 'Praise & Worship', 'time' => '4:30 – 6:00 PM'],
            ];
        @endphp
        @foreach ($quick as $item)
            <div class="reveal clay relative z-10 p-5 text-center">
                <p class="text-[0.66rem] font-bold uppercase tracking-[0.2em] text-pga-red-deep">{{ $item['label'] }}</p>
                <p class="mt-2 font-display text-xl font-semibold text-pga-green">{{ $item['time'] }}</p>
            </div>
        @endforeach
    </div>

    {{-- Timetable --}}
    <section id="weekly-timetable" class="reveal py-16">
        <div class="clay p-6 sm:p-9">
            <div class="mb-7 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="eyebrow">Every Week</p>
                    <h2 class="mt-3 font-display text-2xl font-semibold text-pga-green-deep">Weekly Church Timetable</h2>
                    <p class="mt-2 text-sm text-pga-muted">Times are shown first in the Swahili clock system, followed by the equivalent local clock time (EAT).</p>
                </div>
                <span class="pill pill-gold self-start sm:self-auto">East Africa Time</span>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-pga-sand">
                <table class="w-full min-w-[38rem] border-collapse text-left">
                    <thead>
                        <tr class="bg-gradient-to-r from-pga-green to-pga-green-deep text-white">
                            <th scope="col" class="px-4 py-4 text-sm font-semibold">Day</th>
                            <th scope="col" class="px-4 py-4 text-sm font-semibold">Service</th>
                            <th scope="col" class="px-4 py-4 text-sm font-semibold">Swahili time</th>
                            <th scope="col" class="px-4 py-4 text-sm font-semibold">Local time (EAT)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pga-sand bg-white/40">
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" rowspan="3" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Jumapili (Sunday)</th>
                            <td class="px-4 py-4 text-sm">Sunday School</td>
                            <td class="px-4 py-4 text-sm">3:00-4:00 asubuhi</td>
                            <td class="px-4 py-4 text-sm">9:00-10:00 AM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <td class="px-4 py-4 text-sm">Ibada Kuu (Main Service)</td>
                            <td class="px-4 py-4 text-sm">4:00-6:00 mchana</td>
                            <td class="px-4 py-4 text-sm">10:00 AM-12:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <td class="px-4 py-4 text-sm">Ibada ya Kusifu na Kuabudu (Praise and Worship)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Jumatatu (Monday)</th>
                            <td class="px-4 py-4 text-sm">Maombi (Prayer)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Jumanne (Tuesday)</th>
                            <td class="px-4 py-4 text-sm">Kwaya (Choir)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Jumatano (Wednesday)</th>
                            <td class="px-4 py-4 text-sm">Vijana (Youth)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Alhamisi (Thursday)</th>
                            <td class="px-4 py-4 text-sm">Mafundisho (Teaching)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" rowspan="2" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Ijumaa (Friday)</th>
                            <td class="px-4 py-4 text-sm">Wanawake (Women's Fellowship)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-red/5">
                            <td class="px-4 py-4 text-sm font-medium text-pga-red-deep">Mkesha (Overnight Prayer Vigil)</td>
                            <td class="px-4 py-4 text-sm">3:30 usiku-9:00 alfajiri</td>
                            <td class="px-4 py-4 text-sm">9:30 PM-3:00 AM (Saturday)</td>
                        </tr>
                        <tr class="transition-colors hover:bg-pga-green/5">
                            <th scope="row" class="px-4 py-4 align-top font-display font-semibold text-pga-green">Jumamosi (Saturday)</th>
                            <td class="px-4 py-4 text-sm">Kwaya (Choir)</td>
                            <td class="px-4 py-4 text-sm">10:30-12:00 jioni</td>
                            <td class="px-4 py-4 text-sm">4:30-6:00 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- Location --}}
    <section class="reveal pb-20">
        <div class="clay grid overflow-hidden p-0 lg:grid-cols-2">
            <div class="p-8 sm:p-10">
                <span class="pill pill-green">Find Us</span>
                <h2 class="mt-4 font-display text-2xl font-semibold text-pga-green-deep">Location</h2>
                <p class="mt-4 text-pga-muted">Philadelphia Gospel Assembly</p>
                <p class="text-pga-muted">RQV2+7QX, Dodoma, Tanzania.</p>
                <a href="https://www.google.com/maps/search/?api=1&amp;query=RQV2%2B7QX%2C%20Dodoma%2C%20Tanzania"
                   target="_blank" rel="noopener noreferrer" class="btn btn-primary mt-6">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 6.75 6 3 6-3v10.5l-6 3-6-3-6 3V9.75l6-3Zm0 0v10.5m6-7.5v10.5" />
                    </svg>
                    Get Directions
                </a>
            </div>
            <div class="min-h-[18rem] w-full">
                <iframe
                    title="Map showing Philadelphia Gospel Assembly, Dodoma"
                    src="https://www.google.com/maps?q=RQV2%2B7QX%20Dodoma%20Tanzania&amp;z=15&amp;output=embed"
                    class="h-full min-h-[18rem] w-full" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0;"></iframe>
            </div>
        </div>
    </section>
</div>
@endsection
