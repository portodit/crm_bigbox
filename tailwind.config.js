/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
      "./resources/**/*.js",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
  }
