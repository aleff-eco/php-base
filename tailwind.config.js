/** @type {import('tailwindcss').Config} */
module.exports = {
  //darkMode: 'media',
  darkMode: 'class', 
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      height: {
        '75vh': '75vh',  
        '70vh': '70vh', 
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}