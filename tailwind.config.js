import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/testing/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#09090b",
                "cornflower-blue": {
                    50: "#F5FDFF",
                    100: "#E8F9FF",
                    200: "#C7EDFC",
                    300: "#A5DFFA",
                    400: "#63BEF7",
                    500: "#2196F3",
                    600: "#1D7FDB",
                    700: "#1261B5",
                    800: "#0C4691",
                    900: "#07306E",
                    950: "#031B47",
                },
            },
        },
    },

    plugins: [forms],
};
