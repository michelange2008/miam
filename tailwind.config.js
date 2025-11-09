import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                vertclair: "#60d59eff",
                vert: "#258b5b",
                vertfonce: "#195d3eff",
                jauneclair:"#dbda7bff",
                jaune: "#cccb45ff",
                jaunefonce:"#66661cff",
                orangeclair:"#f2d0a7ff",
                orange: "#e5a251ff",
                orangefonce:"#a86719ff",
            }
        },
    },

    plugins: [forms],
};
