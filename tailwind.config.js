// import defaultTheme from 'tailwindcss/defaultTheme';
// import forms from '@tailwindcss/forms';

const defaultTheme = require('tailwindcss/defaultTheme');


/** @type {import('tailwindcss').Config} */
// export default {

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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    // plugins: [
    //     forms,
    //     require('flowbite/plugin')
    //
    // ],

    plugins: [require('@tailwindcss/forms')],
};
