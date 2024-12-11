/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./src/**/*.{html,js}",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("flowbite/plugin")({
            datatables: true,
        }),
    ],
    darkMode: "media",
};
