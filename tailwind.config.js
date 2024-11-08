import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
            white: "#ffffff",
            purple: "#3f3cbb",
            midnight: "#121063",
            metal: "#565584",
            tahiti: "#3ab7bf",
            silver: "#ecebff",
            bubblegum: "#ff77e9",
            bermuda: "#78dcca",
            black: "#31363F",
            primary1: "#008DDA",
            grey: "#F5F5F7",
            lightblue: "#50A6D6",
            text: "#FFF7FC",
            green: "#74E291",
            danger: "#E72929",
            danger2: "#800000",
            yellow: "#FFB22C",
            yellow2: "#FF8F00",
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("daisyui")],
};
