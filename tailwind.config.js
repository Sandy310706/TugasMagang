/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                outfit: ["Outfit"],
                oswald: ["Oswald"],
                archivo: ["Archivo Black"],
                amaranth: ["Amaranth"],
            },
        },
    },
    plugins: [],
};
