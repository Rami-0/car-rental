<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{--                    @include('profile.partials.update-profile-information-form')--}}

                    <h1>Add a Car</h1>
                    <form action="{{ route('cars.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="brand">Brand:</label>
                            <input type="text" name="brand" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" name="model" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Year:</label>
                            <input type="number" name="year" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" name="price" step="0.01" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" name="color" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="license_plate">License Plate:</label>
                            <input type="text" name="license_plate" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Car</button>
                    </form>


                </div>
            </div>

            {{--            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">--}}
            {{--                <div class="max-w-xl">--}}
            {{--                    @include('profile.partials.update-password-form')--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">--}}
            {{--                <div class="max-w-xl">--}}
            {{--                    @include('profile.partials.delete-user-form')--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</x-app-layout>
