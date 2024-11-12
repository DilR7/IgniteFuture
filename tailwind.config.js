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
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#09090b",
                "dodger-blue": {
                    DEFAULT: "#3B82F6",
                    50: "#F5FAFF",
                    100: "#EBF4FF",
                    200: "#CFE2FF",
                    300: "#B0C9FF",
                    400: "#728BFC",
                    500: "#383ffc",
                    600: "#2D33E3",
                    700: "#1E23BD",
                    800: "#141896",
                    900: "#0B0D73",
                    950: "#04064A",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
