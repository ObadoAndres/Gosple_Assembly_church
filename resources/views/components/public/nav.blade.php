<nav class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-[#06182D] font-bold text-lg">Philadelphia Gospel Assembly</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Home</a>
                    <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">About</a>
                    <a href="{{ route('sermons.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('sermons.*') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Sermons</a>
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('events.*') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Events</a>
                    <a href="{{ route('ministries.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('ministries.*') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Ministries</a>
                    <a href="{{ route('giving') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('giving') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Giving</a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-[#D8B04B] text-[#06182D]' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} text-sm font-medium">Contact</a>
                </div>
            </div>
        </div>
    </div>
</nav>
