/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors : {
        'custom-green': '#95B298',
        'custom-gold': '#E2C89D',
        'custom-grey': '#F2F2F2',
      }
    },
  },
  plugins: [
    
  ],
}
