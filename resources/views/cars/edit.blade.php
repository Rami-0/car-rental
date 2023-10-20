<x-app-layout>
    <x-container-layout>
        <h1>Edit Car</h1>
        <form action="{{ route('cars.update', $car) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" name="brand" id="brand" value="{{ $car->brand }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" name="model" id="model" value="{{ $car->model }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" value="{{ $car->year }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ $car->price }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" name="color" id="color" value="{{ $car->color }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="license_plate">Price:</label>
                <input type="text" name="license_plate" id="license_plate" value="{{ $car->license_plate }}" class="form-control">
            </div>
            <!-- Add fields for other car details (e.g., price, color, license_plate) -->
            <x-primary-button type="submit" class="btn btn-primary">Save</x-primary-button>
        </form>
    </x-container-layout>

</x-app-layout>
