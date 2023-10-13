<x-guest-layout>
    <form method="POST" class="grid grid-flow-row-dense grid-cols-2 gap-5" action="{{ route('register') }}">
        @csrf

        <section class="">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="last_name">Last Name</x-input-label>
                <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')" required autofocus
                              autocomplete="last_name" class="block mt-1 w-full"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
        </section>

        <section>

            <!-- Password -->
            <div class="">
                <x-input-label for="password" :value="__('Password')"/>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <!-- Info about license -->

            <div class="mt-4">
                <x-input-label for="license_id_number">License ID Number</x-input-label>
                <x-text-input id="license_id_number" type="text" name="license_id_number"
                              :value="old('license_id_number')"
                              required autofocus autocomplete="license_id_number"
                              class="block mt-1 w-full"/>
            </div>
        </section>

        <section class="col-span-2">


{{--            <div class="mt-4">--}}
{{--                <x-input-label for="personal_photo" class="block font-medium text-sm text-gray-700">Personal Photo--}}
{{--                </x-input-label>--}}
{{--                <x-file-input id="personal_photo" type="file" name="personal_photo" accept="image/*" required--}}
{{--                              class="form-input rounded-md shadow-sm mt-1 block w-full"/>--}}
{{--            </div>--}}


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </section>
    </form>
</x-guest-layout>
