<!-- Navigation Bar Component -->
<!-- Desktop Navigation (Top) -->
<nav class="hidden lg:flex fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-lg border-b border-white/20" style="background-color: rgba(245, 239, 235, 0.95)">
    <div class="max-w-7xl mx-auto px-6 py-4 w-full">
        <div class="flex items-center w-full">
            <!-- Logo/Brand - Left Side -->
            <div class="flex items-center space-x-3">
                <span class="text-2xl">💕</span>
                <span class="text-xl font-bold" style="color: #2F4156">Merie & Steven</span>
            </div>
            
            <!-- Desktop Menu - Centered -->
            <div class="flex-1 flex items-center justify-center">
                <div class="flex items-center space-x-12">
                    <a href="#home" class="nav-link flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 hover:bg-white/50 hover:shadow-md" style="color: #567C8D">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="font-medium">Home</span>
                    </a>
                    <a href="#calendar" class="nav-link flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 hover:bg-white/50 hover:shadow-md" style="color: #567C8D">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Calendar</span>
                    </a>
                    <a href="#gallery" class="nav-link flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 hover:bg-white/50 hover:shadow-md" style="color: #567C8D">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">Gallery</span>
                    </a>
                    <a href="#location" class="nav-link flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 hover:bg-white/50 hover:shadow-md" style="color: #567C8D">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="font-medium">Maps</span>
                    </a>
                    <a href="{{ route('rsvp') }}" class="nav-link flex items-center space-x-2 px-4 py-2 rounded-full transition-all duration-300 hover:bg-white/50 hover:shadow-md" style="color: #567C8D">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium">RSVP</span>
                    </a>
                </div>
            </div>
            
            <!-- Empty space for balance (optional) -->
            <div class="w-32"></div>
        </div>
    </div>
</nav>

<!-- Mobile Navigation (Bottom) -->
<nav class="lg:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md shadow-2xl border-t border-white/20" style="background-color: rgba(245, 239, 235, 0.98)">
    <div class="grid grid-cols-5 h-16">
        <a href="#home" class="nav-link-mobile flex flex-col items-center justify-center space-y-1 transition-all duration-300 hover:bg-white/50" style="color: #567C8D">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="text-xs font-medium">Home</span>
        </a>
        <a href="#calendar" class="nav-link-mobile flex flex-col items-center justify-center space-y-1 transition-all duration-300 hover:bg-white/50" style="color: #567C8D">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-xs font-medium">Calendar</span>
        </a>
        <a href="#gallery" class="nav-link-mobile flex flex-col items-center justify-center space-y-1 transition-all duration-300 hover:bg-white/50" style="color: #567C8D">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-xs font-medium">Gallery</span>
        </a>
        <a href="#location" class="nav-link-mobile flex flex-col items-center justify-center space-y-1 transition-all duration-300 hover:bg-white/50" style="color: #567C8D">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="text-xs font-medium">Maps</span>
        </a>
        <a href="{{ route('rsvp') }}" class="nav-link-mobile flex flex-col items-center justify-center space-y-1 transition-all duration-300 hover:bg-white/50" style="color: #567C8D">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-xs font-medium">RSVP</span>
        </a>
    </div>
</nav>