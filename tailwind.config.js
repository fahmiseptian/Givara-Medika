import forms from "@tailwindcss/forms";
import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // atau "media"

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "blue-accent": "#000C54",
                "red-accent": "#BE0A0B",
            },
            keyframes: {
                fadeInLeft: {
                    "0%": { opacity: "0", transform: "translateX(-50px)" },
                    "100%": { opacity: "1", transform: "translateX(0)" },
                },
                fadeInRight: {
                    "0%": { opacity: "0", transform: "translateX(50px)" },
                    "100%": { opacity: "1", transform: "translateX(0)" },
                },
                fadeInUp: {
                    "0%": { opacity: "0", transform: "translateY(50px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                fadeInDown: {
                    "0%": { opacity: "0", transform: "translateY(-50px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
            },
            animation: {
                fadeInLeft: "fadeInLeft 1s ease-out",
                fadeInRight: "fadeInRight 1s ease-out",
                fadeInUp: "fadeInUp 1s ease-out",
                fadeInDown: "fadeInDown 1s ease-out",
            },
        },
    },

    plugins: [forms, require("daisyui")],
};
