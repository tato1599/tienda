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
                'space-grotesk': ['Space Grotesk', 'sans-serif'],
            },
            colors: {
                "primary": "rgb(var(--primary) / <alpha-value>)",
                "on-primary": "rgb(var(--on-primary) / <alpha-value>)",
                "background": "rgb(var(--background) / <alpha-value>)",
                "surface": "rgb(var(--surface) / <alpha-value>)",
                "surface-container": "rgb(var(--surface-container) / <alpha-value>)",
                "surface-variant": "rgb(var(--surface-variant) / <alpha-value>)",
                "outline": "rgb(var(--outline) / <alpha-value>)",
                "on-surface": "rgb(var(--on-surface) / <alpha-value>)",
                "on-surface-variant": "rgb(var(--on-surface-variant) / <alpha-value>)",
                "primary-container": "rgb(var(--primary-container) / <alpha-value>)",
                "outline-variant": "rgb(var(--outline-variant) / <alpha-value>)",
            },
            borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            spacing: {
                "gutter": "24px",
                "base": "8px",
                "stack-md": "12px",
                "container-padding": "32px",
                "stack-sm": "4px",
                "stack-lg": "24px"
            },
        },
    },

    plugins: [typography, forms, require('daisyui')],

    daisyui: {
        themes: ["light", "dark"],
    },
};
