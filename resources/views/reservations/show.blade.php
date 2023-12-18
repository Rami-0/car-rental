<x-app-layout>
    <x-container-layout>

        <h1 class="text-3xl pb-10"><strong>Reservation Details</strong></h1>

        <p><strong>User:</strong> {{ $reservation->user->name }} {{ $reservation->user->last_name }}</p>
        <p><strong>User Email:</strong> {{ $reservation->user->email }}</p>
        <p><strong>User License ID:</strong> {{ $reservation->user->license_id_number }}</p>
        <br>
        <br>

        <p><strong>Car:</strong> {{ $reservation->car->brand }} {{ $reservation->car->model }}</p>
        <p><strong>Car Year:</strong> {{ $reservation->car->year }}</p>
        <p><strong>Car License Plate:</strong> {{ $reservation->car->license_plate }}</p>
        <p><strong>Car Price:</strong> {{ $reservation->car->price }}</p>
        <p><strong>Car Color:</strong> {{ $reservation->car->color }}</p>
        <!-- You can add more car details here -->
        <br>
        <br>
        <p><strong>Pickup Date:</strong> {{ $reservation->pickup_date }}</p>
        <p><strong>Return Date:</strong> {{ $reservation->return_date }}</p>
        <p><strong>Status:</strong> {{ $reservation->status }}</p>


        <form action="{{ route('reservations.destroy', $reservation) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-secondary-button class="mt-4" type="submit">
                Delete
            </x-secondary-button>
        </form>

        @if(Auth::user()->hasRole(env('APP_ADMIN_ROLE')))
            <form action="{{ route('reservations.approve', $reservation) }}" method="POST">
                @csrf
                @method('PUT')
                <x-secondary-button class="mt-4" type="submit">
                    Approve
                </x-secondary-button>
            </form>
        @endif

        @if(Auth::user()->hasRole(env('APP_USER_ROLE')))
                <x-secondary-button class="mt-4 w-40" >
                    <a class="z-10 w-full" href="{{ route('reservations.checkout', $reservation->id) }}">Checkout Now</a>
                </x-secondary-button>
        @endif


    </x-container-layout>

</x-app-layout>
