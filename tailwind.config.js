import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary": "#2563eb",
                "background": "#020617",
                "surface": "#0f172a",
                "surface-container": "#0b1120",
                "surface-variant": "#1e293b",
                "outline": "#334155",
                "on-surface": "#f8fafc",
                "on-surface-variant": "#94a3b8",
            },
            borderRadius: {
                "DEFAULT": "8px",
                "lg": "8px",
                "xl": "12px",
                "full": "9999px"
            },
            spacing: {
                "stack-lg": "32px",
                "stack-sm": "8px",
                "gutter": "24px",
                "margin-page": "48px",
                "base-unit": "4px",
                "stack-md": "16px"
            },
        },
    },

    plugins: [typography, forms, require('daisyui')],

    daisyui: {
        themes: ["light", "dark"],
    },
};
