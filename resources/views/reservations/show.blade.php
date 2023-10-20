<x-app-layout>
    <h1>Reservation Details</h1>

    <p><strong>User:</strong> {{ $reservation->user->name }}</p>
    <p><strong>Car:</strong> {{ $reservation->car->brand }} {{ $reservation->car->model }}</p>
    <p><strong>Pickup Date:</strong> {{ $reservation->pickup_date }}</p>
    <p><strong>Status:</strong> {{ $reservation->status }}</p>
    <!-- Add more reservation details here -->

</x-app-layout>
