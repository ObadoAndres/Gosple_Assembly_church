<nav class="bg-white shadow-sm border-b border-gray-100" aria-label="Main navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Philadelphia Gospel Assembly logo" class="h-10 w-10 object-contain" width="360" height="360">
                    <span class="text-[#06182D] font-bold text-sm sm:text-base lg:text-lg leading-tight">Philadelphia Gospel Assembly</span>
                </a>
            </div>

            <div class="hidden lg:flex lg:items-center lg:space-x-6 xl:space-x-8">
                <a href="{{ route('home') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('home') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Home</a>
                <a href="{{ route('about') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('about') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">About</a>
                <a href="{{ route('services') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('services') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Services</a>
                <a href="{{ route('sermons.index') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('sermons.*') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Sermons</a>
                <a href="{{ route('events.index') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('events.*') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Events</a>
                <a href="{{ route('ministries.index') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('ministries.*') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Ministries</a>
                <a href="{{ route('giving') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('giving') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Giving</a>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-1 py-2 border-b-2 {{ request()->routeIs('contact') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Contact</a>
            </div>

            <div class="flex items-center lg:hidden">
                <button type="button" id="mobile-menu-btn" data-open="false" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle navigation menu" class="inline-flex items-center justify-center p-2 rounded-md text-[#06182D] hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#06182D] focus:ring-offset-2">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-100 bg-white max-h-[calc(100vh-4rem)] overflow-y-auto">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'bg-[#FDFDFC] text-[#06182D]' : 'text-gray-600 hover:bg-gray-50 hover:text-[#06182D]' }}">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'bg-[#FDFDFC] text-[#06182D]' : 'text-gray-600 hover:bg-gray-50 hover:text-[#06182D]' }}">About</a>
            <a href="{{ route('services') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('services') ? 'bg-[#FDFDFC] text-[#06182D]' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:text-[#06182D]' }}">Services</a>
            <a href="{{ route('sermons.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('sermons.*') ? 'bg-[#FDFDFC] text-[#06182D]' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:text-[#06182D]' }}">Sermons</a>
            <a href="{{ route('events.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('events.*') ? 'bg-[#FDFDFC] text-[#06182D]' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:text-[#06182D]' }}">Events</a>
            <a href="{{ route('ministries.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('ministries.*') ? 'bg-[#FDFDFC] text-[#06182D]' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:text-[#06182D]' }}">Ministries</a>
            <a href="{{ route('giving') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('giving') ? 'bg-[#FDFDFC] text-[#06182D]' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:text-[#06182D]' }}">Giving</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'bg-[#FDFDFC] text-[#06182D]' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:text-[#06182D]' }}">Contact</a>
        </div>
    </div>
</nav>
