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
                outfit: ["Outfit", "ui-sans-serif", "system-ui"],
                oswald: ["Oswald"],
                archivo: ["Archivo Black"],
                amaranth: ["Amaranth"],
                montserrat: ["Montserrat Alternates"],
                nunito: ["Nunito Sans"],
            },
            keyframes: {
                ToptoBottom: {
                    from: { top: "-20%" },
                },
                BottomtoTop: {
                    "100%": { top: "-100%" },
                },
                showDropdownMenu: {
                    from: { opacity: "0" },
                    to: { opacity: "100" },
                },
                hideDropdownMenu: {
                    from: { opacity: "100" },
                    to: { opacity: "0" },
                },
                showSidebar: {
                    from: { transform: "translateX(-150%)" },
                    to: { transform: "translateX(0%)" },
                },
                hideSidebar: {
                    to: { transform: "translateX(-150%)" },
                },
                showMenu: {
                    from: { transform: "translateY(-150%)" },
                    to: { transform: "translateY(0%)" },
                },
                hideMenu: {
                    to: { transform: "translateY(-150%)" },
                },
            },
            animation: {
                showModal: "ToptoBottom 0.5s ease-in-out",
                hideModal: "BottomtoTop 1s ease-in-out",
                showDropdownMenu: "showDropdownMenu 0.5s ease-in-out",
                hideDropdownMenu: "hideDropdownMenu 0.5s ease-in-out",
                showSidebar: "showSidebar 0.5s ease-in-out",
                hideSidebar: "hideSidebar 0.5s  ease-in-out",
                showMenu: "showMenu 1s ease-in-out",
                hideMenu: "hideMenu 1s ease-in-out",
            },
            screens: {
                mobile: { max: "480px" },
                lgMobile: { min: "481px", max: "640px" },
                Tablet: { min: "640px", max: "768px" },
                lgTablet: { min: "768px", max: "1044px" },
                laptop: "1045px",
                desktop: "1280px",
            },
        },
    },
    plugins: [],
};
