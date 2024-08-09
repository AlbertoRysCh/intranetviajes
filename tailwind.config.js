const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'bdark-rv': '#1C2434',
                'white-rv': '#f8fafc',
                'red-rv': '#d52e27',
                'wsp-rv': '#25d366',
                'marfil-rv': '#F5F5F5'
            },
            fontWeight: {
                extraLight: 100,
                light: 200,
                normal: 400,
                medium: 500,
                semiBold: 600,
                bold: 700,
                extraBold: 800,
                black: 900,
            },
            maxWidth: {
                'custom-rv': '76rem', // Agrega un nuevo valor de max-width
            },
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
