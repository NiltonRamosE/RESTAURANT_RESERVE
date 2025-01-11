import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                sevensoup: {
                    green: "#addaad",
                    dark: "#0d181c",
                    light: "#f6f6f6",
                    red: "#ea4f5b",
                },
            },
        },
    },
    darkMode: "class",
    plugins: [],
};
