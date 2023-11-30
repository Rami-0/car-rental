<x-app-layout>
    <x-container-layout>

        <h1 class="text-3xl pb-10"><strong>Reserve {{ $car->brand }} {{ $car->model }}</strong></h1>

        {{--car information--}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->brand }} {{ $car->model }}"
                     class="w-full h-48 object-cover mb-4">
            </div>
            <div>
                <p class="text-lg font-bold">{{ $car->brand }} {{ $car->model }}</p>
                <p class="text-gray-500">{{ $car->year }} | {{ $car->license_plate }}</p>
                <p class="text-gray-700">Color: {{ $car->color }}</p>
                <p class="text-gray-700">Price: ${{ $car->price }}/day</p>
            </div>
        </div>

        {{--reservation form--}}
        <div>
            <form action="{{ route('reservations.store') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="pickup_date" class="block text-sm font-medium text-gray-700">Pickup Date</label>
                    <input type="datetime-local" id="pickup_date" name="pickup_date" required class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="return_date" class="block text-sm font-medium text-gray-700">Return Date</label>
                    <input type="datetime-local" id="return_date" name="return_date" required class="w-full border rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="car_id" value="{{ $car->id }}">

                <x-secondary-button type="submit">
                    Reserve
                </x-secondary-button>
            </form>
        </div>


    </x-container-layout>

</x-app-layout>
