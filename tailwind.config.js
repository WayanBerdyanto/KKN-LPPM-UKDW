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
                primary: "#14b8a6",
                dark: "#0f172a",
                secondary: "#64748b",
            },
            backgroundImage: {
                "hero-pattern": "url('/public/img/hero.jpg')",
            },
        },
    },
    plugins: [],
};
