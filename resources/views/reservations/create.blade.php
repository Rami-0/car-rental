<x-app-layout>
    <x-container-layout>
        <h1 class="text-3xl pb-10"><strong>Create Reservation</strong></h1>
        @if (session('success'))
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        @elseif (session('error'))
            <x-alert-danger>
                {{ session('error') }}
            </x-alert-danger>
        @endif
        <div class="flex">

            <form method="post" class="flex flex-col items-start w-[50%]" action="{{ route('reservations.store') }}">
                @csrf

                <label for="user_id">User:</label>
                <select class="min-w-[50%]" name="user_id" id="user_id" required>
                    <option value="-" data-lastname="-" data-email="-" data-license-id="-"
                            data-personal-photo="-"></option>
                    @foreach ($users as $user)
                        @if ($user->role !== env('APP_ADMIN_ROLE'))
                            <option value="{{ $user->id }}"
                                    data-lastname="{{ $user->last_name }}"
                                    data-email="{{ $user->email }}"
                                    data-license-id="{{ $user->license_id_number }}"
                                    data-personal-photo="{{ $user->personal_photo }}">
                                {{ $user->name }}
                            </option>
                        @endif
                    @endforeach
                </select>

                <label for="car_id">Car:</label>
                <select class="min-w-[50%]" name="car_id" id="car_id" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                    @endforeach
                </select>

                <label for="pickup_date">Pickup Date:</label>
                <input required class="min-w-[50%] cursor-pointer" type="datetime-local" name="pickup_date"
                       id="pickup_date">

                <label for="return_date">Return Date:</label>
                <input required class="min-w-[50%] cursor-pointer" type="datetime-local" name="return_date"
                       id="return_date">

                <!-- Additional reservation details can be added here -->

                <x-secondary-button type="submit" class="mt-4">
                    Create Reservation
                </x-secondary-button>

            </form>
            <span>
                <h1>Last Name: <strong id="selected-lastname"></strong> </h1>
                <h1>email: <strong id="selected-email"></strong> </h1>
                <h1>license-id: <strong id="selected-license-id"></strong> </h1>
                <h1>personal-photo:</h1>
                <img id="selected-personal-photo" src="" alt="This user doesn't have a photo">
            </span>
        </div>
    </x-container-layout>
</x-app-layout>

<script>
    document.getElementById('user_id').addEventListener('change', function () {
        var selectedOption = this.options[this.selectedIndex];

        // Update the selected last name
        document.getElementById('selected-lastname').innerText = selectedOption.getAttribute('data-lastname');

        // Update the selected email
        document.getElementById('selected-email').innerText = selectedOption.getAttribute('data-email');

        // Update the selected license ID
        document.getElementById('selected-license-id').innerText = selectedOption.getAttribute('data-license-id');

        // Update the selected personal photo (assuming you want to display the image)
        var personalPhotoUrl = selectedOption.getAttribute('data-personal-photo');
        document.getElementById('selected-personal-photo').setAttribute('src', personalPhotoUrl);
    });
</script>

