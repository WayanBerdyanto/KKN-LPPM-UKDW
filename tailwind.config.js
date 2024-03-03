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
                primary: "#366ED8",
                dark: "#222831",
                secondary: "#FAFAFA",
            },
            backgroundImage: {
                "hero-pattern": "url('/public/img/hero.jpg')",
            },
        },
    },
    plugins: [],
};
