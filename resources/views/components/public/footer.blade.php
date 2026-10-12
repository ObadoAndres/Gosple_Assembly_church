<footer class="bg-[#06182D] text-white mt-20">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo" class="h-12 w-12 object-contain bg-white rounded-full p-1" width="360" height="360">
                    <h3 class="text-lg font-semibold">Philadelphia Gospel Assembly</h3>
                </div>
                <p class="text-sm text-gray-300 mb-4">Knowing God. Growing in Faith. Living His Purpose.</p>
                <p class="text-sm text-gray-300">Motto: <em>Philadelphia tunasonga mbele, Bwana yu pamoja nasi.</em></p>
            </div>
            <div>
                <h4 class="text-base font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">About</a></li>
                    <li><a href="{{ route('services') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Services</a></li>
                    <li><a href="{{ route('sermons.index') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Sermons</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Events</a></li>
                    <li><a href="{{ route('ministries.index') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Ministries</a></li>
                    <li><a href="{{ route('giving') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Giving</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-gray-300 hover:text-[#D8B04B] transition-colors">Contact</a></li>
                </ul>
            </div>
            <div id="contact">
                <h4 class="text-base font-semibold mb-4">Contact &amp; Location</h4>
                <p class="text-sm text-gray-300 mb-2">Dodoma, Tanzania</p>
                <p class="text-sm text-gray-300 mb-2">Location: RQV2+7QX, Dodoma</p>
                <p class="text-sm text-gray-300 mb-4">Phone: TBD <span class="text-xs text-yellow-300">(to be confirmed)</span></p>
                <p class="text-sm text-gray-300 mb-4">Email: TBD <span class="text-xs text-yellow-300">(to be confirmed)</span></p>
                <p class="text-sm text-gray-300 mb-2"><strong>Sunday Worship</strong></p>
                <p class="text-xs text-yellow-300 mb-2">Note: Conflicting times in docs - 9:00&nbsp;AM&ndash;12:00&nbsp;PM vs 8:00&nbsp;AM&ndash;5:00&nbsp;PM (needs confirmation)</p>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-[#1A1A1F]">
            <p class="text-center text-sm text-gray-300">&copy; {{ date('Y') }} Philadelphia Gospel Assembly Tanzania. All rights reserved.</p>
        </div>
    </div>
</footer>
