<x-app-layout>
    <x-container-layout>
        <h1>Car Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $car->brand }} {{ $car->model }}</h5>
                <p class="card-text">Year: {{ $car->year }}</p>
                <p class="card-text">Price: ${{ $car->price }}</p>
                <p class="card-text">Color: {{ $car->color }}</p>
                <p class="card-text">License Plate: {{ $car->license_plate }}</p>
                <!-- Add additional fields for car details as needed -->
            </div>
            <a href="{{ route('cars.edit', $car) }}">
                <x-secondary-button class="mt-4">
                    Edit
                </x-secondary-button>
            </a>

        </div>
    </x-container-layout>
</x-app-layout>
