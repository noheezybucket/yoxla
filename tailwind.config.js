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
                first: "#3A80F4",
                second: "#ECECEC",
                third: "#080D1B",
                fourth: "#FFFFFF",
                accent1: "#F4723A",
                accent2: "#11B990",
            },
        },
    },
    plugins: [],
};
