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
            // BAGIAN INI DIGANTI TOTAL DENGAN KONFIGURASI BARU
            colors: {
                'brand-teal': {
                    light: '#E0F2F1',
                    DEFAULT: '#009688', // Warna utama
                    dark: '#00796B',
                },
                'brand-orange': {
                    light: '#FFF3E0',
                    DEFAULT: '#FF9800', // Untuk tombol/aksi
                    dark: '#F57C00',
                },
                'brand-gray': '#424242', // Untuk teks
            },
            fontFamily: {
                // Ganti font default dengan Poppins dan Inter
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};