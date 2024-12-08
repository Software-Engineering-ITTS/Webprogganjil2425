/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        fontFamily: {
          display: ['Pally', 'Comic Sans MS', 'sans-serif'],
          body: ['Pally', 'Comic Sans MS', 'sans-serif'],
        },
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }