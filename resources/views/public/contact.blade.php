@extends('layouts.public')

@section('title', 'Contact | Philadelphia Gospel Assembly')
@section('meta_description', 'Contact Philadelphia Gospel Assembly Tanzania in Dodoma.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="text-3xl sm:text-4xl font-bold text-[#06182D] mb-4">Contact</h1>
        <p class="text-lg text-[#706f6c]">Get in touch with us</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 sm:p-8">
        <p class="text-base text-[#1b1b18] leading-relaxed mb-6">
            We would love to hear from you. Whether you are visiting Dodoma, looking for a church
            family, or have a question about the ministry, you are welcome to reach out.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-[#FDFDFC] rounded-lg border border-gray-100 p-5">
                <h2 class="text-lg font-semibold text-[#06182D] mb-2">Location</h2>
                <p class="text-[#1b1b18] mb-1">Philadelphia Gospel Assembly</p>
                <p class="text-[#706f6c]">Dodoma, Tanzania</p>
                <p class="text-[#706f6c]">Location: RQV2+7QX, Dodoma</p>
            </div>
            <div class="bg-[#FDFDFC] rounded-lg border border-gray-100 p-5">
                <h2 class="text-lg font-semibold text-[#06182D] mb-2">Get in Touch</h2>
                <p class="text-[#706f6c] mb-1">Phone: <span class="text-[#1b1b18]">TBD</span></p>
                <p class="text-[#706f6c] mb-3">Email: <span class="text-[#1b1b18]">TBD</span></p>
                <p class="text-sm text-yellow-700">Phone, email and service times are awaiting confirmation from official church records.</p>
            </div>
        </div>
    </div>
</div>
@endsection
