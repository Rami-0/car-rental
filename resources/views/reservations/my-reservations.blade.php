    <x-container-layout>

        @if (session('success'))
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @endif

        <br/>

        <h1 class="text-3xl pb-10"><strong>My Reservations</strong></h1>

        <table>
            <thead>
            <tr>
                <th class="text-left">Car</th>
                <th class="text-left">Pickup Date</th>
                <th class="text-left">Return Date</th>
                <th class="text-left">status</th>
                <th class="text-left">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->car->brand }} {{ $reservation->car->model }}</td>
                    <td>{{ $reservation->pickup_date }}</td>
                    <td>{{ $reservation->return_date }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation) }}">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </x-container-layout>
