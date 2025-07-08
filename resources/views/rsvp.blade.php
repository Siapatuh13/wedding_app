<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <title>RSVP - Merie & Steven Wedding</title>
</head>

<body style="background-color: #F5EFEB; color: #567C8D" class="min-h-screen font-playfair">
    
    <!-- Validation Errors with Field Highlighting -->
    @if($errors->any())
        <div x-data="{ show: true }" x-show="show" x-transition 
             class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg max-w-md">
            <div class="flex items-center justify-between">
                <div>
                    <strong>Please fix these errors:</strong>
                    <ul class="mt-2 text-sm">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button @click="show = false" class="ml-4 text-white hover:text-gray-200 text-xl">&times;</button>
            </div>
        </div>
    @endif

    <!-- Success Message -->
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition 
        class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg max-w-md">
        <div class="flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-white hover:text-gray-200 text-xl">&times;</button>
        </div>
    </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
    <div x-data="{ show: true }" x-show="show" x-transition 
        class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg max-w-md">
        <div class="flex items-center justify-between">
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="ml-4 text-white hover:text-gray-200 text-xl">&times;</button>
        </div>
    </div>
    @endif

    <!-- Header Section -->
    <section class="relative w-full py-12 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="home" class="inline-flex items-center px-6 py-3 text-white bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105" style="color: #567C8D; background-color: rgba(255,255,255,0.7)">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Invitation
                </a>
            </div>
            
            <!-- Header Content -->
            <div class="mb-12">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6">
                    RSVP
                </h1>
                <div class="space-y-4">
                    <h2 class="text-3xl md:text-4xl font-bold">Merie & Steven</h2>
                    <p class="text-xl md:text-2xl font-medium">Friday, 3rd October 2025</p>
                    <p class="text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                        Your presence would make our day even more special. Please let us know if you'll be celebrating with us!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- RSVP Form Section -->
    <section class="w-full px-4 py-16">
        <div class="max-w-4xl mx-auto">
            <form action="{{ route('rsvp.submit') }}" method="POST" class="space-y-16" x-data="rsvpForm()" @submit="if (!submitForm()) { $event.preventDefault(); }">
                @csrf
                
                <!-- Personal Information -->
                <div class="space-y-8">
                    <h3 class="text-4xl font-bold text-center mb-12 relative">
                        Your Information
                        <div class="absolute bottom-[-16px] left-1/2 transform -translate-x-1/2 w-20 h-1 rounded-full" style="background: linear-gradient(to right, #567C8D, #2F4156)"></div>
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- First Name -->
                        <div>
                            <input type="text" 
                                   id="first_name" 
                                   name="first_name" 
                                   required 
                                   class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg" 
                                   :class="errors.firstName ? 'border-red-500 ring-2 ring-red-200' : 'border-gray-300'"
                                   style="color: #2F4156; --tw-ring-color: #567C8D"
                                   placeholder="First Name *" 
                                   x-model="firstName"
                                   @blur="validateField('firstName', firstName)"
                                   @input="validateField('firstName', firstName)"
                                   value="{{ old('first_name') }}">
                            <p x-show="errors.firstName" x-text="errors.firstName" class="text-red-500 text-sm mt-2"></p>
                        </div>
                        
                        <!-- Last Name -->
                        <div>
                            <input type="text" 
                                   id="last_name" 
                                   name="last_name" 
                                   required 
                                   class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg" 
                                   :class="errors.lastName ? 'border-red-500 ring-2 ring-red-200' : 'border-gray-300'"
                                   style="color: #2F4156; --tw-ring-color: #567C8D"
                                   placeholder="Last Name *"
                                   x-model="lastName"
                                   @blur="validateField('lastName', lastName)"
                                   @input="validateField('lastName', lastName)"
                                   value="{{ old('last_name') }}">
                            <p x-show="errors.lastName" x-text="errors.lastName" class="text-red-500 text-sm mt-2"></p>
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Email -->
                        <div>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required 
                                   class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg" 
                                   :class="errors.email ? 'border-red-500 ring-2 ring-red-200' : 'border-gray-300'"
                                   style="color: #2F4156; --tw-ring-color: #567C8D"
                                   placeholder="Email Address *"
                                   x-model="email"
                                   @blur="validateField('email', email)"
                                   @input="validateField('email', email)"
                                   value="{{ old('email') }}">
                            <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-sm mt-2"></p>
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg" 
                                   style="color: #2F4156; border-color: #DADADA; --tw-ring-color: #567C8D"
                                   placeholder="Phone Number"
                                   x-model="phone"
                                   value="{{ old('phone') }}">
                        </div>
                    </div>
                </div>

                <!-- Attendance Confirmation -->
                <div class="space-y-8">
                    <h3 class="text-4xl font-bold text-center mb-12 relative">
                        Will you be attending?
                        <div class="absolute bottom-[-16px] left-1/2 transform -translate-x-1/2 w-20 h-1 rounded-full" style="background: linear-gradient(to right, #567C8D, #2F4156)"></div>
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="relative p-8 border-2 rounded-2xl cursor-pointer transition-all duration-300 bg-white hover:shadow-lg"
                             :class="attendance === 'yes' ? 'shadow-lg' : 'hover:shadow-md'" 
                             :style="attendance === 'yes' ? 'border-color: #567C8D; background-color: rgba(86, 124, 141, 0.05)' : (errors.attendance ? 'border-color: #ef4444' : 'border-color: #DADADA')"
                             @click="attendance = 'yes'; validateField('attendance', 'yes')">
                            <input type="radio" id="attending_yes" name="attendance" value="yes" x-model="attendance" class="sr-only" {{ old('attendance') == 'yes' ? 'checked' : '' }}>
                            <div class="text-center">
                                <div class="text-5xl mb-4">🎉</div>
                                <h4 class="text-2xl font-bold mb-2" style="color: #2F4156">Yes, I'll be there!</h4>
                                <p class="font-medium" style="color: #567C8D">Can't wait to celebrate with you</p>
                            </div>
                            <div x-show="attendance === 'yes'" class="absolute -top-2 -right-2 w-6 h-6 rounded-full flex items-center justify-center" style="background-color: #567C8D">
                                <span class="text-white text-sm font-bold">✓</span>
                            </div>
                        </div>
                        
                        <div class="relative p-8 border-2 rounded-2xl cursor-pointer transition-all duration-300 bg-white hover:shadow-lg"
                             :class="attendance === 'no' ? 'shadow-lg' : 'hover:shadow-md'" 
                             :style="attendance === 'no' ? 'border-color: #567C8D; background-color: rgba(86, 124, 141, 0.05)' : (errors.attendance ? 'border-color: #ef4444' : 'border-color: #DADADA')"
                             @click="attendance = 'no'; validateField('attendance', 'no')">
                            <input type="radio" id="attending_no" name="attendance" value="no" x-model="attendance" class="sr-only" {{ old('attendance') == 'no' ? 'checked' : '' }}>
                            <div class="text-center">
                                <div class="text-5xl mb-4">💔</div>
                                <h4 class="text-2xl font-bold mb-2" style="color: #2F4156">Sorry, I can't make it</h4>
                                <p class="font-medium" style="color: #567C8D">Will be celebrating from afar</p>
                            </div>
                            <div x-show="attendance === 'no'" class="absolute -top-2 -right-2 w-6 h-6 rounded-full flex items-center justify-center" style="background-color: #567C8D">
                                <span class="text-white text-sm font-bold">✓</span>
                            </div>
                        </div>
                    </div>
                    <p x-show="errors.attendance" x-text="errors.attendance" class="text-red-500 text-sm text-center mt-2"></p>
                </div>

                <!-- Attendance Details -->
                <div x-show="attendance === 'yes'" 
                     x-transition:enter="transition ease-out duration-500" 
                     x-transition:enter-start="opacity-0 transform translate-y-8" 
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="space-y-8">
                    <h3 class="text-4xl font-bold text-center mb-12 relative">
                        Attendance Details
                        <div class="absolute bottom-[-16px] left-1/2 transform -translate-x-1/2 w-20 h-1 rounded-full" style="background: linear-gradient(to right, #567C8D, #2F4156)"></div>
                    </h3>
                    
                <!-- Number of Guests -->
                <div class="relative" x-data="{ dropdownOpen: false }">
                    <button type="button" 
                            @click="dropdownOpen = !dropdownOpen"
                            class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg cursor-pointer text-left flex items-center justify-between"
                            :class="errors.guestCount ? 'border-red-500 ring-2 ring-red-200' : 'border-gray-300'"
                            style="color: #2F4156; --tw-ring-color: #567C8D"
                            :style="dropdownOpen ? 'border-color: #567C8D; box-shadow: 0 0 0 2px rgba(86, 124, 141, 0.2)' : ''">
                        <span x-text="guestCount === '' ? 'Number of Guests (including yourself) *' : 
                                    guestCount === '1' ? '1 Guest (Just me)' :
                                    guestCount === '2' ? '2 Guests (Me + 1)' :
                                    guestCount === '3' ? '3 Guests (Me + 2)' :
                                    guestCount === '4' ? '4 Guests (Me + 3)' :
                                    guestCount === '5' ? '5+ Guests' : 'Select number of guests'"
                            :class="guestCount === '' ? 'opacity-60' : 'opacity-100'"></span>
                        <svg class="w-5 h-5 transition-transform duration-200" 
                            :class="dropdownOpen ? 'rotate-180' : ''" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="dropdownOpen" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                        x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                        @click.away="dropdownOpen = false"
                        class="absolute z-10 w-full mt-2 bg-white border rounded-xl shadow-xl overflow-hidden"
                        style="border-color: #DADADA">
                        
                        <div @click="guestCount = '1'; dropdownOpen = false; validateField('guestCount', '1')" 
                            class="px-6 py-4 hover:bg-gray-50 cursor-pointer transition-colors duration-150 border-b"
                            style="border-color: #f0f0f0"
                            :class="guestCount === '1' ? 'bg-blue-50' : ''">
                            <div class="flex items-center">
                                <div>
                                    <div class="font-semibold" style="color: #2F4156">1 Guest</div>
                                    <div class="text-sm opacity-70">Just me</div>
                                </div>
                            </div>
                        </div>
                        
                        <div @click="guestCount = '2'; dropdownOpen = false; validateField('guestCount', '2')" 
                            class="px-6 py-4 hover:bg-gray-50 cursor-pointer transition-colors duration-150 border-b"
                            style="border-color: #f0f0f0"
                            :class="guestCount === '2' ? 'bg-blue-50' : ''">
                            <div class="flex items-center">
                                <div>
                                    <div class="font-semibold" style="color: #2F4156">2 Guests</div>
                                    <div class="text-sm opacity-70">Me + 1</div>
                                </div>
                            </div>
                        </div>
                        
                        <div @click="guestCount = '3'; dropdownOpen = false; validateField('guestCount', '3')" 
                            class="px-6 py-4 hover:bg-gray-50 cursor-pointer transition-colors duration-150 border-b"
                            style="border-color: #f0f0f0"
                            :class="guestCount === '3' ? 'bg-blue-50' : ''">
                            <div class="flex items-center">
                                <div>
                                    <div class="font-semibold" style="color: #2F4156">3 Guests</div>
                                    <div class="text-sm opacity-70">Me + 2</div>
                                </div>
                            </div>
                        </div>
                        
                        <div @click="guestCount = '4'; dropdownOpen = false; validateField('guestCount', '4')" 
                            class="px-6 py-4 hover:bg-gray-50 cursor-pointer transition-colors duration-150 border-b"
                            style="border-color: #f0f0f0"
                            :class="guestCount === '4' ? 'bg-blue-50' : ''">
                            <div class="flex items-center">
                                <div>
                                    <div class="font-semibold" style="color: #2F4156">4 Guests</div>
                                    <div class="text-sm opacity-70">Me + 3</div>
                                </div>
                            </div>
                        </div>
                        
                        <div @click="guestCount = '5'; dropdownOpen = false; validateField('guestCount', '5')" 
                            class="px-6 py-4 hover:bg-gray-50 cursor-pointer transition-colors duration-150"
                            :class="guestCount === '5' ? 'bg-blue-50' : ''">
                            <div class="flex items-center">
                                <div>
                                    <div class="font-semibold" style="color: #2F4156">5+ Guests</div>
                                    <div class="text-sm opacity-70">Large party</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hidden input for form submission -->
                    <input type="hidden" name="guest_count" x-model="guestCount">
                    <p x-show="errors.guestCount" x-text="errors.guestCount" class="text-red-500 text-sm mt-2"></p>
                </div>

                    <!-- Guest Names -->
                    <div x-show="parseInt(guestCount) > 1" x-transition>
                        <textarea id="guest_names" 
                                  name="guest_names" 
                                  rows="4" 
                                  class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg resize-none" 
                                  style="color: #2F4156; border-color: #DADADA; --tw-ring-color: #567C8D"
                                  placeholder="Names of Additional Guests (one per line)">{{ old('guest_names') }}</textarea>
                    </div>

                    <!-- Event Attendance -->
                    <div class="space-y-4">
                        <h4 class="text-2xl font-bold mb-6">Will you attend our reception?</h4>
                        
                        <label class="flex items-start space-x-4 p-4 bg-white rounded-xl border transition-all duration-200 cursor-pointer hover:shadow-md" style="border-color: #DADADA">
                            <input type="checkbox" 
                                name="events[]" 
                                value="reception" 
                                class="w-5 h-5 border-2 rounded transition-all duration-200 mt-1 flex-shrink-0"
                                style="border-color: #567C8D; color: #567C8D; --tw-ring-color: rgba(86, 124, 141, 0.2)"
                                {{ (is_array(old('events')) && in_array('reception', old('events'))) ? 'checked' : '' }}>
                            <div>
                                <div class="font-semibold text-lg" style="color: #2F4156">Wedding Reception</div>
                                <div class="mt-1" style="color: #567C8D">October 3rd, 07:00 PM • Regale Int'l Convention Centre, Medan</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Special Message -->
                <div class="space-y-8">
                    <h3 class="text-4xl font-bold text-center mb-12 relative">
                        Share Your Love
                        <div class="absolute bottom-[-16px] left-1/2 transform -translate-x-1/2 w-20 h-1 rounded-full" style="background: linear-gradient(to right, #567C8D, #2F4156)"></div>
                    </h3>
                    <div>
                        <textarea id="message" 
                                  name="message" 
                                  rows="5" 
                                  class="w-full px-6 py-4 bg-white border rounded-xl focus:outline-none focus:ring-2 transition-all duration-300 text-lg font-medium shadow-sm hover:shadow-md focus:shadow-lg resize-none" 
                                  style="color: #2F4156; border-color: #DADADA; --tw-ring-color: #567C8D"
                                  placeholder="Wishes, advice, or messages for the couple? We'd love to read them! (optional)">{{ old('message') }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-8">
                    <button type="submit" 
                            :disabled="isSubmitting"
                            class="px-6 py-3 text-white text-lg font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed" 
                            style="background-color: #2F4156">
                        <span x-show="!isSubmitting">
                            <span x-show="attendance === 'yes'">✨ Confirm My Attendance ✨</span>
                            <span x-show="attendance === 'no'">💝 Send My Regrets 💝</span>
                            <span x-show="!attendance">Submit Response</span>
                        </span>
                        <span x-show="isSubmitting">Submitting...</span>
                    </button>
                    
                    <div class="mt-12 text-center">
                        <p class="text-lg font-medium mb-2">
                            📅 Please respond by September 15th, 2025
                        </p>
                        <p>
                            Questions? Contact us at 
                            <a href="mailto:wedding@merieandsteven.com" class="hover:underline font-medium">wedding@merieandsteven.com</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <section class="w-full px-4 py-16 text-center">
        <div class="max-w-2xl mx-auto bg-white bg-opacity-50 backdrop-blur-sm p-8 rounded-3xl shadow-2xl">
            <h4 class="text-3xl font-bold mb-4">We can't wait to celebrate with you!</h4>
            <div class="text-6xl mb-4">💕</div>
            <p class="text-2xl font-semibold">Merie & Steven</p>
        </div>
    </section>

    <!-- Enhanced Alpine.js Script for Form Validation -->
    <script>
        function rsvpForm() {
            return {
                attendance: '{{ old("attendance") }}' || '',
                guestCount: '{{ old("guest_count") }}' || '1',
                firstName: '{{ old("first_name") }}' || '',
                lastName: '{{ old("last_name") }}' || '',
                email: '{{ old("email") }}' || '',
                phone: '{{ old("phone") }}' || '',
                isSubmitting: false,
                errors: {},
                
                // Email validation
                validateEmail(email) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return emailRegex.test(email);
                },
                
                // Real-time validation
                validateField(fieldName, value) {
                    switch(fieldName) {
                        case 'email':
                            if (value && !this.validateEmail(value)) {
                                this.errors.email = 'Please enter a valid email address (e.g., name@example.com)';
                            } else {
                                delete this.errors.email;
                            }
                            break;
                        case 'firstName':
                            if (!value.trim()) {
                                this.errors.firstName = 'First name is required';
                            } else {
                                delete this.errors.firstName;
                            }
                            break;
                        case 'lastName':
                            if (!value.trim()) {
                                this.errors.lastName = 'Last name is required';
                            } else {
                                delete this.errors.lastName;
                            }
                            break;
                        case 'attendance':
                            if (!value) {
                                this.errors.attendance = 'Please select whether you will be attending';
                            } else {
                                delete this.errors.attendance;
                            }
                            break;
                        case 'guestCount':
                            if (this.attendance === 'yes' && !value) {
                                this.errors.guestCount = 'Please select number of guests';
                            } else {
                                delete this.errors.guestCount;
                            }
                            break;
                    }
                },
                
                // Form submission validation
                validateForm() {
                    this.errors = {};
                    let isValid = true;
                    
                    // Required field validation
                    if (!this.firstName.trim()) {
                        this.errors.firstName = 'First name is required';
                        isValid = false;
                    }
                    
                    if (!this.lastName.trim()) {
                        this.errors.lastName = 'Last name is required';
                        isValid = false;
                    }
                    
                    if (!this.email.trim()) {
                        this.errors.email = 'Email address is required';
                        isValid = false;
                    } else if (!this.validateEmail(this.email)) {
                        this.errors.email = 'Please enter a valid email address (e.g., name@example.com)';
                        isValid = false;
                    }
                    
                    if (!this.attendance) {
                        this.errors.attendance = 'Please select whether you will be attending';
                        isValid = false;
                    }
                    
                    if (this.attendance === 'yes' && !this.guestCount) {
                        this.errors.guestCount = 'Please select number of guests';
                        isValid = false;
                    }
                    
                    return isValid;
                },
                
                // Scroll to first error
                scrollToFirstError() {
                    const firstErrorField = Object.keys(this.errors)[0];
                    if (firstErrorField) {
                        let element;
                        switch(firstErrorField) {
                            case 'firstName':
                                element = document.getElementById('first_name');
                                break;
                            case 'lastName':
                                element = document.getElementById('last_name');
                                break;
                            case 'email':
                                element = document.getElementById('email');
                                break;
                            case 'attendance':
                                element = document.querySelector('input[name="attendance"]');
                                break;
                            case 'guestCount':
                                element = document.querySelector('[x-data*="dropdownOpen"]');
                                break;
                        }
                        
                        if (element) {
                            element.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            setTimeout(() => {
                                element.focus();
                                // Flash the field to draw attention
                                element.style.boxShadow = '0 0 0 3px rgba(239, 68, 68, 0.3)';
                                setTimeout(() => {
                                    element.style.boxShadow = '';
                                }, 1000);
                            }, 500);
                        }
                    }
                },
                
                // Submit handler
                submitForm() {
                    if (this.validateForm()) {
                        this.isSubmitting = true;
                        return true;
                    } else {
                        this.scrollToFirstError();
                        return false;
                    }
                }
            }
        }
    </script>
</body>
</html>