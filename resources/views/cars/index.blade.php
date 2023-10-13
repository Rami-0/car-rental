<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex flex-col">
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
                        </div>
                        {{--                                <a href="{{ route('cars.edit', $car) }}">--}}
                        {{--                                    <x-secondary-button class="mt-4">--}}
                        {{--                                        Edit--}}
                        {{--                                    </x-secondary-button>--}}
                        {{--                                </a>--}}

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
            </div>
        </div>
    </div>
</x-app-layout>
