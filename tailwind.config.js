/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./assets/**/*.js', './templates/**/*.html.twig'],
    theme: {
        extend: {
            colors: {
                'custom-green': '#95B298',
                'custom-gold': '#E2C89D',
                'custom-grey': '#f4ebf3',
            },
        },
    },
    plugins: [require('@tailwindcss/typography')],
};
