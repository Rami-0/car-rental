<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-partials._head/>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @if(Auth::user()->hasRole(env('APP_ADMIN_ROLE')))
        @include('layouts.navigation-admin')
    @elseif(Auth::user()->hasRole(env('APP_USER_ROLE')))
        @include('layouts.navigation')
    @endif
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    {{--    <!-- Page Content -->--}}
    <main>
        {{ $slot }}
    </main>
    @stack('scripts')
</div>
</body>
</html>
