<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Alpine.js - Moved to head for better loading -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-black text-white min-h-screen">
    @extends('layouts.app')

    @section('content')
    <!-- Carousel -->
    <div x-data="{ 
        activeSlide: 1, 
        totalSlides: 4,
        autoRotate: null, 
        startRotation() { 
            this.autoRotate = setInterval(() => { this.nextSlide() }, 3000); 
        }, 
        stopRotation() { 
            clearInterval(this.autoRotate); 
        }, 
        nextSlide() { 
            this.activeSlide = this.activeSlide === this.totalSlides ? 1 : this.activeSlide + 1; 
        }, 
        prevSlide() { 
            this.activeSlide = this.activeSlide === 1 ? this.totalSlides : this.activeSlide - 1; 
        } 
    }" 
        x-init="startRotation()" 
        @keydown.right.window="nextSlide()"
        @keydown.left.window="prevSlide()"
        class="relative w-full h-72 md:h-[43rem] overflow-hidden mb-16">
        <!-- Slides -->
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 1" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel1.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 1">
        </div>
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 2" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel2.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 2">
        </div>
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 3" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel3.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 3">
        </div>
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out"
            x-show="activeSlide === 4" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">
            <img src="{{ asset('images/carousel4.jpg') }}" class="w-full h-full object-contain" alt="Carousel Image 4">
        </div>

        <!-- Navigation Buttons -->
        <button @click="prevSlide(); stopRotation(); setTimeout(() => startRotation(), 10000);"
            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 p-3 rounded-full text-white shadow-md transition duration-300 focus:outline-none">
            &#10094;
        </button>
        <button @click="nextSlide(); stopRotation(); setTimeout(() => startRotation(), 10000);"
            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 p-3 rounded-full text-white shadow-md transition duration-300 focus:outline-none">
            &#10095;
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <template x-for="slide in totalSlides" :key="slide">
                <button @click="activeSlide = slide; stopRotation(); setTimeout(() => startRotation(), 10000);" 
                    :class="{'bg-white w-4 h-4': activeSlide === slide, 'bg-gray-400 w-3 h-3': activeSlide !== slide}" 
                    class="rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>

    <!-- Main Content with Sections -->
    <div class="container mx-auto px-4 py-8 space-y-24">
        <!-- Sections with proper spacing -->
        <div class="space-y-24">
            @include('layouts.leftSection', [
                'imageUrl' => asset('images/testimonial1.jpg'),
                'productName' => 'Cross Fit',
                'productDescription' => 'CrossFit training focuses on high-intensity functional movements to build strength, endurance, and agility. It combines elements of weightlifting, cardio, and bodyweight exercises to enhance overall fitness and performance.'
            ])

            @include('layouts.rightSection', [
                'imageUrl' => asset('images/testimonial2.jpg'),
                'productName' => 'Weight Training',
                'productDescription' => 'Weight training helps in muscle growth, strength development, and overall fitness enhancement. It improves bone density, metabolism, and endurance by utilizing resistance exercises targeting specific muscle groups.'
            ])

            @include('layouts.leftSection', [
                'imageUrl' => asset('images/testimonial3.jpg'),
                'productName' => 'Cardio Training',
                'productDescription' => 'Cardio exercises improve heart health, stamina, and aid in weight loss by increasing endurance. Activities like running, cycling, and jumping rope boost cardiovascular efficiency and promote overall well-being.'
            ])

            @include('layouts.rightSection', [
                'imageUrl' => asset('images/testimonial4.jpg'),
                'productName' => 'Yoga',
                'productDescription' => 'Yoga enhances flexibility, reduces stress, and promotes mental and physical well-being. Through a combination of postures, breathing techniques, and meditation, it helps in relaxation, mindfulness, and overall body balance.'
            ])
        </div>
        
        <!-- Cards section with proper spacing -->
        <div class="flex flex-wrap justify-center gap-8 py-12">       
            @include('layouts.card', [
                'imageSrc' => asset('images/card1.png'),
                'imageAlt' => 'ELITE workout',
                'cardSubtitle' => 'fitpass',
                'cardTitle' => 'ELITE',
                'headingText' => 'Unlimited access to',
                'bulletPoints' => [
                    'At-center group classes',
                    'All ELITE & PRO gyms',
                    'At-home live workouts'
                ],
                'primaryButtonText' => 'TRY FOR FREE',
                'secondaryButtonText' => 'LEARN MORE'
            ])

            @include('layouts.card', [
                'imageSrc' => asset('images/card2.png'),
                'imageAlt' => 'PRO workout',
                'cardSubtitle' => 'fitpass',
                'cardTitle' => 'PRO',
                'headingText' => 'Unlimited access to',
                'bulletPoints' => [
                    'All PRO gyms',
                    '2 Sessions/month at ELITE gyms & group classes',
                    'At-home live workouts'
                ],
                'primaryButtonText' => 'TRY FOR FREE',
                'secondaryButtonText' => 'LEARN MORE'
            ])

            @include('layouts.card', [
                'imageSrc' => asset('images/card3.png'),
                'imageAlt' => 'SELECT workout',
                'cardSubtitle' => 'fitpass',
                'cardTitle' => 'SELECT',
                'headingText' => 'Unlimited access to',
                'bulletPoints' => [
                    'One center that you choose',
                    'Limited sessions* in other centers & gyms in your city',
                    'At-home live workouts'
                ],
                'primaryButtonText' => 'LEARN MORE',
                'secondaryButtonText' => 'TRY FOR FREE'
            ])
        </div>
    </div>

    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
    @endsection
</body>
</html>