<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-partials._head/>
<body class="antialiased">
<div
    class="">
    <header class="flex justify-between items-center p-6 px-[18%] text-right z-10 w-full h-10vh">
        @if (Route::has('login'))
            <span class="text-3xl font-bold text-color-100">CARENT</span>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class=" font-semibold text-white px-10 py-3 rounded-[5px] bg-color-100 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class=" font-semibold text-white px-10 py-3 rounded-[5px] bg-color-100 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class=" font-semibold text-white px-10 py-3 rounded-[5px] bg-color-100 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
                @endif
            </div>
    </header>
    <main class="" id="">
        <div class="flex justify-center items-center w-full h-90vh">

            <div class="inline-flex flex-col items-start gap-12 pl-0 pr-8 py-8 bg-[rgba(0, 0, 0, 0.15)]">
                <span class="z-[-10] top-0 left-0 sm:w-[45%] w-[100%] h-[742px] shrink-0 bg-color-200 absolute"></span>
                <h1 class=" w-[496px] text-white text-5xl not-italic font-extrabold leading-[normal]">Enjoy your life
                    with
                    our comfortable
                    cars.</h1>
                <h3 class="w-[453px] text-color-300 text-2xl not-italic font-medium leading-10">Carent, is ready to
                    serve the best
                    experience in car rental.</h3>
                <a href="{{ route('cars.index') }}"
                   class=" font-semibold text-white px-10 py-3 rounded-[5px] bg-color-100 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Rent
                    a car</a>
            </div>


            <div class="flex flex-col justify-center items-center w-1/2 h-1/2">
                @php
                    // Assuming $imageName is the name of your image file stored in the storage directory
                    $imageName = 'Main Picture.jpg';

                    // Use the asset function to generate the correct URL to the image
                    $imageUrl = asset('storage/' . $imageName);
                @endphp

                <img src="{{ $imageUrl }}" alt="Image Alt Text">
            </div>
        </div>
    </main>
</div>
</body>

</html>
