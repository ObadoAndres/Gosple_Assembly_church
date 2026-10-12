@extends('layouts.public')

@section('title', 'Giving | Philadelphia Gospel Assembly')
@section('meta_description', 'Giving and stewardship at Philadelphia Gospel Assembly Tanzania.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Giving</h1>
        <p class="text-lg text-[#706f6c]">"Each one must give as he has decided in his heart..." (2 Corinthians 9:7)</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8">
        <p class="text-base text-[#1b1b18] leading-relaxed mb-6 text-center">
            Giving is an act of worship and gratitude to God. Your tithes and offerings help support the
            ministry of the church, the training of leaders, and service to communities.
        </p>
        <div class="bg-[#FDFDFC] rounded-lg border border-gray-100 p-6 text-center">
            <p class="text-base text-[#706f6c] mb-2">Giving details will be provided once confirmed from official church records.</p>
            <p class="text-sm text-yellow-700 mb-4">Tithes and offerings information to be added.</p>
            <p class="text-sm text-[#706f6c]">
                For giving enquiries, please
                <a href="{{ route('contact') }}" class="text-[#8a6d1f] hover:text-[#06182D] font-medium underline underline-offset-4 rounded focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2">contact the church</a>.
            </p>
        </div>
    </div>
</div>
@endsection
