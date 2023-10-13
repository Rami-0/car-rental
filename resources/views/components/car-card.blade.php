@props(["car" ,'deleteRoute', 'brand', 'model', 'year', 'color', 'license_plate', 'price_per_day', 'photo'])

<div class="bg-white shadow-md rounded-md p-4 w-full flex flex-col h-full justify-start">
    @if ($photo)
        <img src="{{ asset($photo) }}" alt="{{ $brand }} {{ $model }}" class="w-full rounded-md mb-4">
    @endif

    <h2 class="text-xl font-semibold">{{ $brand }} {{ $model }}</h2>
    <p class="text-gray-600">{{ $year }} - {{ $color }}</p>

    <p class="text-gray-700 mt-2">License Plate: {{ $license_plate }}</p>
    <p class="text-gray-700">Price per Day: ${{ $price_per_day }}</p>

    <!-- Additional information or elements can be added here as needed -->

    <!-- Delete button on the right side -->
    <div class="flex mt-auto">
        <x-danger-button href="{{ $deleteRoute }}" class=" ml-auto"
                         onclick="event.preventDefault(); document.getElementById('delete-form-{{ $car->id }}').submit();">
            Delete
        </x-danger-button>
    </div>
</div>
