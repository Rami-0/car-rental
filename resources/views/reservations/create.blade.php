<x-app-layout>
    <h1>Create Reservation</h1>

    <form method="post" action="{{ route('reservations.store') }}">
        @csrf
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id">
            <!-- Populate the user options dynamically -->
        </select>

        <label for="car_id">Car:</label>
        <select name="car_id" id="car_id">
            <!-- Populate the car options dynamically -->
        </select>

        <label for="pickup_date">Pickup Date:</label>
        <input type="datetime-local" name="pickup_date" id="pickup_date">

        <!-- Additional reservation details can be added here -->

        <button type="submit">Create Reservation</button>
    </form>

</x-app-layout>
