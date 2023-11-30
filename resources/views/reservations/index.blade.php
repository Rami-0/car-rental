<x-app-layout>
    <x-container-layout>

        @if (session('success'))
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @endif

        <br/>

        <h1 class="text-3xl pb-10"><strong>Reservations</strong></h1>

        <table>
            <thead>
            <tr>
                <th class="text-left">User</th>
                <th class="text-left">Car</th>
                <th class="text-left">Pickup Date</th>
                <th class="text-left">Status</th>
                <th class="text-left">Action</th>
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
            <a href="{{ route('reservations.create') }}">
                <x-secondary-button class="mt-4">
                    Reserve
                </x-secondary-button>
            </a>

    </x-container-layout>
</x-app-layout>
