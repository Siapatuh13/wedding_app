<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <title>Wedding Invitation</title>
</head>

<body style="background-color: #F5EFEB; color: #567C8D" class="flex flex-col items-center justify-center min-h-screen max-w-full font-playfair overflow-x-hidden">
    @include('components.wedding.navbar')

    <!-- Hero Image Section (No lazy loading for hero) -->
    <section id="home" class="flex items-center justify-center w-full pb-16">
        <div class="relative w-full">
            <img src="images/photos/MerieSteven_136.jpg" class="w-full object-cover mask-gradient" loading="eager">
        </div>    
    </section>

    <!-- Main Wedding Info Section -->
    <section class="flex flex-col items-center justify-center w-full text-center px-4 py-16">
        <h4 class="text-lg tracking-wide mb-4 fade-in">The Wedding of</h4>
        <h1 class="text-5xl font-extrabold mb-6 fade-in">Merie & Steven</h1>
        <h4 class="text-lg mb-4 fade-in">Friday, 3rd October 2025</h4>
        <h4 class="text-lg mb-8 fade-in">Dear Sir/Madam</h4>
        <div class="mt-10">
            <h4 class="text-5xl mb-6 text-reveal">The Beginning Always Starts Here.</h4>
        </div>
    </section>

    <!-- Calendar Section -->
    <section id="calendar" class="font-kufi w-full text-center px-4 py-16 overflow-x-auto scale-in-center">
        <div class="p-6 text-center">
            <h2 class="text-2xl font-semibold text-700 mb-6 fade-in">OCTOBER 2025</h2>
            <div class="grid grid-cols-7 gap-2 md:gap-4 text-700 min-w-[300px]">
                <div class="font-bold calendar-day">SUN</div>
                <div class="font-bold calendar-day">MON</div>
                <div class="font-bold calendar-day">TUE</div>
                <div class="font-bold calendar-day">WED</div>
                <div class="font-bold calendar-day">THU</div>
                <div class="font-bold calendar-day">FRI</div>
                <div class="font-bold calendar-day">SAT</div>
               
                <div class="calendar-day"></div><div class="calendar-day"></div><div class="calendar-day"></div><div class="p-4 calendar-day">1</div><div class="p-4 calendar-day">2</div>
                <div class="p-4 relative overflow-hidden calendar-day">
                    <span class="relative z-10 text-white font-bold drop-shadow-lg">3</span>
                    <span class="absolute inset-0 flex items-center justify-center text-red-500 text-7xl opacity-40 pulse-gentle">
                        ♥
                    </span>
                </div><div class="p-4 calendar-day">4</div><div class="p-4 calendar-day">5</div><div class="p-4 calendar-day">6</div><div class="p-4 calendar-day">7</div><div class="p-4 calendar-day">8</div>
                <div class="p-4 calendar-day">9</div><div class="p-4 calendar-day">10</div><div class="p-4 calendar-day">11</div><div class="p-4 calendar-day">12</div><div class="p-4 calendar-day">13</div>
                <div class="p-4 calendar-day">14</div><div class="p-4 calendar-day">15</div><div class="p-4 calendar-day">16</div><div class="p-4 calendar-day">17</div><div class="p-4 calendar-day">18</div><div class="p-4 calendar-day">19</div><div class="p-4 calendar-day">20</div><div class="p-4 calendar-day">21</div><div class="p-4 calendar-day">22</div>
                <div class="p-4 calendar-day">23</div><div class="p-4 calendar-day">24</div><div class="p-4 calendar-day">25</div><div class="p-4 calendar-day">26</div><div class="p-4 calendar-day">27</div><div class="p-4 calendar-day">28</div><div class="p-4 calendar-day">29</div><div class="p-4 calendar-day">30</div><div class="p-4 calendar-day">31</div>
            </div>
        </div>
    </section>

    <!-- Gallery Carousel Section - Only Featured Images -->
    <section id="gallery" class="relative w-full flex justify-center px-4 py-16 fade-in-up">
        <div class="carousel relative w-full max-w-5xl overflow-hidden rounded-xl shadow-lg" id="carousel">
            <div class="flex transition-transform duration-500 ease-in-out" id="carousel-items">
                <?php 
                // Only show selected featured images for carousel
                $featuredImages = [
                    'MerieSteven_017.jpg',
                    'MerieSteven_021.jpg', 
                    'MerieSteven_026.jpg',
                    'MerieSteven_031.jpg',
                    'MerieSteven_039.jpg',
                    'MerieSteven_044.jpg',
                    'MerieSteven_047.jpg'
                ];
                ?>
                @foreach ($featuredImages as $image)
                    <div class="carousel-item min-w-full relative">
                        <div class="image-loader">
                            <img src="{{ asset('images/photos/' . $image) }}" 
                                class="w-full h-[400px] md:h-[650px] lg:h-[750px] xl:h-[800px] object-cover">
                            <div class="image-placeholder"></div>
                            <div class="image-spinner"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Navigation buttons -->
            <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white p-2 rounded-full transition-all duration-200" id="prevBtn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white p-2 rounded-full transition-all duration-200" id="nextBtn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3" id="carousel-dots">
                @foreach ($featuredImages as $index => $image)
                    <button class="dot w-3 h-3 rounded-full transition-all duration-200 @if($index === 0) bg-white/80 @else bg-white/40 @endif" data-index="{{ $index }}"></button>
                @endforeach
            </div>
        </div>
    </section> 
    
    <!-- Location Section -->
    <section id="location" class="relative w-full flex flex-col justify-center items-center text-center px-4 py-16" style="background-image: url('images/logo/line3.png');">
        <!-- Header -->
        <div class="mb-12 max-w-4xl">
            <h2 class="text-3xl md:text-5xl mb-6">
                To the happiest memories, now and forever.
            </h2>
            <div class="mt-8">
                <h3 class="text-3xl md:text-5xl">
                    Save the date!
                </h3>
            </div>
        </div>

        <!-- Reception Section -->
        <div class="w-full max-w-6xl">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Reception Info -->
                <div class="text-left space-y-4">
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="images/logo/reception.png" class="w-24 h-24 md:w-28 md:h-28" alt="Reception Icon">
                        <div>
                            <h4 class="font-bold text-2xl">Reception</h4>
                            <p class="text-lg">October 3rd</p>
                            <p class="text-lg">07:00 PM</p>
                        </div>
                    </div>
                    <div class="bg-white/90 backdrop-blur-sm p-6 rounded-xl shadow-lg">
                        <h5 class="font-semibold text-xl mb-3">Regale Int'l Convention Centre</h5>
                        <p class="text-base mb-2">2nd Floor</p>
                        <p class="text-base mb-3">Jl. Adam Malik No.66-68<br>Medan, Sumatera Utara</p>
                        <a href="https://maps.google.com/?q=Regale+International+Convention+Centre+Medan+Sumatera+Utara" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            View on Google Maps
                        </a>
                    </div>
                </div>
                
                <!-- Reception Map -->
                <div class="map-container relative rounded-xl overflow-hidden shadow-lg" style="z-index: 1;">
                    <div id="receptionMap" class="w-full h-80 md:h-96"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="flex flex-col items-center justify-center w-full text-center px-4 py-16 fade-in">
        <div class="my-10">
            <h4 class="text-3xl mb-6 text-reveal">To have and to hold from this day forward.</h4>
        </div>
    </section>
    
    <!-- Happy Image Section -->
    <section id="happy" class="flex items-center justify-center w-full py-16 fade-in-up">
        <div class="relative w-full">
            <div class="image-loader">
                <img src="images/photos/MerieSteven_140.jpg" class="w-full object-cover">
                <div class="image-placeholder"></div>
                <div class="image-spinner"></div>
            </div>
        </div>  
    </section>
    
    <!-- Celebration Message & RSVP Section -->
    <section id="rsvp" class="flex flex-col items-center justify-center w-full text-center px-4 py-16 fade-in-up">
        <div class="mb-10">
            <h4 class="text-2xl mb-6 fade-in">We are so excited to celebrate this beautiful moment with you.</h4>
        </div>
        <div class="my-10">
            <h4 class="text-2xl mb-6 fade-in">Your presence will make our day even more special!</h4>
        </div>
        <a href="{{ route('rsvp') }}" class="inline-block px-12 py-4 min-w-[200px] text-white text-xl font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 scale-in" style="background-color: #2F4156">
            RSVP
        </a>
    </section>
    
    <!-- Gallery Grid Section - Enhanced with Lazy Loading -->
    <section id="galleries" class="flex items-center justify-center w-full px-4 py-16 stagger-children">
        <div class="grid grid-cols-2 md:grid-cols-2 gap-2 md:gap-4 w-full max-w-6xl">
            <div class="aspect-square">
                <div class="image-loader">
                    <img src="images/photos/MerieSteven_088.jpg" 
                        class="w-full h-full object-cover rounded-lg">
                    <div class="image-skeleton rounded-lg"></div>
                    <div class="image-spinner"></div>
                </div>
            </div>
            <div class="aspect-square">
                <div class="image-loader">
                    <img src="images/photos/MerieSteven_095.jpg" 
                        class="w-full h-full object-cover rounded-lg">
                    <div class="image-skeleton rounded-lg"></div>
                    <div class="image-spinner"></div>
                </div>
            </div>
            <div class="aspect-[3/2] md:aspect-[2/1] col-span-2">
                <div class="image-loader">
                    <img src="images/photos/MerieSteven_102.jpg" 
                        class="w-full h-full object-cover rounded-lg">
                    <div class="image-skeleton rounded-lg"></div>
                    <div class="image-spinner"></div>
                </div>
            </div>
            <div class="aspect-[3/2] md:aspect-[2/1] col-span-2">
                <div class="image-loader">
                    <img src="images/photos/MerieSteven_092.jpg" 
                        class="w-full h-full object-cover rounded-lg">
                    <div class="image-skeleton rounded-lg"></div>
                    <div class="image-spinner"></div>
                </div>
            </div>
        </div>  
    </section>  
    
    <!-- Memories Table Section - Enhanced with Lazy Loading -->
    <section id="memories" class="flex items-center justify-center w-full px-4 py-16 overflow-x-hidden stagger-children">
        <div class="w-full max-w-6xl">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4">
                <!-- Large Featured Image -->
                <div class="aspect-square md:aspect-[4/3] col-span-2 md:col-span-2 md:row-span-2">
                    <div class="image-loader">
                        <img src="images/photos/MerieSteven_113.jpg" 
                            class="w-full h-full object-cover rounded-lg">
                        <div class="image-skeleton rounded-lg"></div>
                        <div class="image-spinner"></div>
                    </div>
                </div>
                
                <!-- Side Images -->
                <div class="aspect-square">
                    <div class="image-loader">
                        <img src="images/photos/MerieSteven_144.jpg" 
                            class="w-full h-full object-cover rounded-lg">
                        <div class="image-skeleton rounded-lg"></div>
                        <div class="image-spinner"></div>
                    </div>
                </div>
                <div class="aspect-square">
                    <div class="image-loader">
                        <img src="images/photos/MerieSteven_140.jpg" 
                            class="w-full h-full object-cover rounded-lg">
                        <div class="image-skeleton rounded-lg"></div>
                        <div class="image-spinner"></div>
                    </div>
                </div>
                <div class="aspect-square">
                    <div class="image-loader">
                        <img src="images/photos/MerieSteven_081.jpg" 
                            class="w-full h-full object-cover rounded-lg">
                        <div class="image-skeleton rounded-lg"></div>
                        <div class="image-spinner"></div>
                    </div>
                </div>
                <div class="aspect-square">
                    <div class="image-loader">
                        <img src="images/photos/MerieSteven_047.jpg" 
                            class="w-full h-full object-cover rounded-lg">
                        <div class="image-skeleton rounded-lg"></div>
                        <div class="image-spinner"></div>
                    </div>
                </div>
                
                <!-- Bottom Wide Image -->
                <div class="aspect-[3/2] md:aspect-[2/1] col-span-2 md:col-span-4">
                    <div class="image-loader">
                        <img src="images/photos/MerieSteven_092.jpg" 
                            class="w-full h-full object-cover rounded-lg">
                        <div class="image-skeleton rounded-lg"></div>
                        <div class="image-spinner"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Wishes Display Section -->
    <section id="wishes" class="flex flex-col items-center justify-center w-full text-center px-4 py-16 relative overflow-hidden fade-in-up">
        <div class="my-10 mb-16 fade-in">
            <h4 class="text-3xl mb-6">Words of Love & Joy</h4>
            <p class="text-lg text-gray-600">Beautiful messages from our loved ones</p>
        </div>
        
        <div class="wishes-container w-full max-w-6xl relative" style="height: 400px;">
            <div class="wishes-grid grid grid-cols-2 gap-6 h-full" id="wishesGrid">
                <!-- Wishes will be populated by JavaScript -->
            </div>
        </div>
    </section>

</body>
</html>