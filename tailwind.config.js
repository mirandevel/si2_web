const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Constantia', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'paleta-1': '#ade0cd',
                'paleta-2': '#fe6d5c',
                'paleta-3': '#fdce5a',
                'paleta-4': '#243762',
                'paleta-5': '#fbf3e0',
                'paleta-6': '#6c63ff',
                'paleta-7': '#fb3f29',
                'paleta-8': '#707070',

            },
        },

    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
