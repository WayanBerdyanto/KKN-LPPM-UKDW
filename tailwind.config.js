/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#3758F9",
                dark: "#222831",
                secondary: "#F2FFFF",
            },
            backgroundImage: {
                "hero-pattern": "url('/public/img/hero.jpg')",
            },
        },
    },
    plugins: [],
};
