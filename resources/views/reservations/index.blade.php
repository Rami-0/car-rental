<x-app-layout>
    <h1>Reservations</h1>

    <table>
        <thead>
        <tr>
            <th>User</th>
            <th>Car</th>
            <th>Pickup Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->car->brand }} {{ $reservation->car->model }}</td>
                <td>{{ $reservation->pickup_date }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <a href="{{ route('reservations.show', $reservation) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
