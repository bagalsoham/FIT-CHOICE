<div class="py-8">
    <div class="flex flex-col-reverse md:flex-row items-center gap-8">
        <!-- Description Section -->
        <div class="w-full md:w-1/2 p-6">
            <h1 class="text-2xl md:text-3xl font-bold mb-4">{{ $productName }}</h1>
            <p class="text-base md:text-lg">{{ $productDescription }}</p>
        </div>
        <!-- Image Section -->
        <div class="w-full md:w-1/2 flex justify-center items-center">
            <img src="{{ $imageUrl }}" class="rounded-lg shadow-lg max-w-full h-auto" alt="Product">
        </div>
    </div>
</div>