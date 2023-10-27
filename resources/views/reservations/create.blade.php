<x-app-layout>
    <x-container-layout>
        <h1>Create Reservation</h1>
        <form method="post" action="{{ route('reservations.store') }}">
            @csrf

            <label for="user_id">User:</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <label for="car_id">Car:</label>
            <select name="car_id" id="car_id">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                @endforeach
            </select>

            <label for="pickup_date">Pickup Date:</label>
            <input type="datetime-local" name="pickup_date" id="pickup_date">

            <!-- Additional reservation details can be added here -->

            <button type="submit">Create Reservation</button>
        </form>
    </x-container-layout>
</x-app-layout>
