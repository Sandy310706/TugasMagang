/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                outfit: ["Outfit"],
                oswald: ["Oswald"],
                archivo: ["Archivo Black"],
                amaranth: ["Amaranth"],
            },
            keyframes: {
                ToptoBottom: {
                    from: { left: "35%", top: "-10%" },
                    to: { left: "35%", top: "10" },
                },
                BottomtoTop: {
                    "0%": { left: "35%", top: "10" },
                    "100%": { left: "35%", top: "-100%" },
                },
                showDropdownMenu: {
                    from: { opacity: "0" },
                    to: { opacity: "100" },
                },
                hideDropdownMenu: {
                    from: { opacity: "100" },
                    to: { opacity: "0" },
                },
            },
            animation: {
                showModal: "ToptoBottom 0.7s ease-in-out",
                hideModal: "BottomtoTop 1s ease-in-out",
                showDropdownMenu: "showDropdownMenu 0.5s ease-in-out",
                hideDropdownMenu: "hideDropdownMenu 0.5s ease-in-out",
            },
            screens: {
                HandPhone: { max: "600px" },
            },
        },
    },
    plugins: [],
};
