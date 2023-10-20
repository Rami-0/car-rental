<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>
    <x-container-layout>
        <div class="mb-4">
            <x-h1-title>Available Cars</x-h1-title>
        </div>
        @if (session('success'))
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @endif
        <div class="grid grid-cols-3 grid-flow-row gap-4">
            @foreach ($cars as $car)
                <div class="w-full min-h-500px">
                    <a href="{{ route('cars.show', ['car' => $car->id]) }}">
                        <x-car-card
                            :car="$car"
                            deleteRoute="{{ route('cars.destroy', $car) }}"
                            brand="{{ $car->brand }}"
                            model="{{ $car->model }}"
                            year="{{ $car->year }}"
                            color="{{ $car->color }}"
                            license_plate="{{ $car->license_plate }}"
                            price_per_day="{{ $car->price }}"
                            photo="{{ $car->photo }}"
                        />
                    </a>

                </div>

                <form id="delete-form-{{ $car->id }}" action="{{ route('cars.destroy', $car) }}"
                      method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </div>
        <a class="ml-auto" href="{{ route('cars.create') }}">
            <x-primary-button class="mt-4">
                Add a Car
            </x-primary-button>
        </a>
    </x-container-layout>
</x-app-layout>
