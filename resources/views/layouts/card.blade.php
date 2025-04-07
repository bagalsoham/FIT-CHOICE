<div class=" rounded-lg shadow-lg overflow-hidden w-full max-w-xs mx-auto">
    <!-- Card Image -->
    <div class="relative h-48 overflow-hidden">
        <img src="{{ $imageSrc }}" alt="{{ $imageAlt ?? 'Workout' }}" class="w-full h-full object-cover">
        <div class="absolute bottom-0 left-0  text-white px-3 py-1 rounded-tr-lg">
            {{ $cardSubtitle }}
        </div>
    </div>
    
    <!-- Card Content -->
    <div class="p-5">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $cardTitle }}</h3>
        
        <div class="my-4">
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $headingText }}</p>
            <ul class="mt-2 space-y-2">
                @foreach($bulletPoints as $point)
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm text-gray-700 dark:text-gray-300">{{ $point }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <!-- Card Buttons -->
        <div class="mt-6 flex flex-col space-y-2">
            @if(isset($primaryButtonUrl))
                <a href="{{ $primaryButtonUrl }}" id="{{ str_replace('#', '', $primaryButtonUrl) }}" class="bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-md font-semibold transition duration-300">
                    {{ $primaryButtonText }}
                </a>
            @else
                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md font-semibold transition duration-300" disabled>
                    {{ $primaryButtonText }}
                </button>
            @endif
            
            @if(isset($secondaryButtonUrl))
                <a href="{{ $secondaryButtonUrl }}" id="{{ str_replace('#', '', $secondaryButtonUrl) }}" class="border border-blue-600 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900 text-center py-2 px-4 rounded-md font-semibold transition duration-300">
                    {{ $secondaryButtonText }}
                </a>
            @else
                <button class="border border-blue-600 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900 py-2 px-4 rounded-md font-semibold transition duration-300">
                    {{ $secondaryButtonText }}
                </button>
            @endif
        </div>
    </div>
</div>