import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/views/**/*.",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            // ...
            'color': {
                100: '#FE8400',
                200: '#141414',
                300: '#FFE4C6',
                400: '#FFF',
            },
            // ...
        },
    },
    darkMode: false,
    plugins: [forms],
};
