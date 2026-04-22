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
                "primary": "#00aeef",
                "on-primary": "#00344b",
                "background": "#131313",
                "surface": "#131313",
                "surface-container": "#1f1f1f",
                "surface-variant": "#353535",
                "outline": "#87929b",
                "on-surface": "#e2e2e2",
                "on-surface-variant": "#bdc8d1",
                "primary-container": "#00aeef",
                "outline-variant": "#3e4850",
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
