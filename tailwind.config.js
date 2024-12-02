const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./javascript/**/*.js"],
  theme: {
    extend: {
    },
    plugins: [
      plugin(function({ addUtilities }) {
        addUtilities({
          '.no-spin': {
            '&::-webkit-inner-spin-button': { '-webkit-appearance': 'none', margin: '0' },
            '&::-webkit-outer-spin-button': { '-webkit-appearance': 'none', margin: '0' },
            '&': { '-moz-appearance': 'textfield' }, // Untuk Firefox
          },
        });
      }),
    ],
  },
  plugins: [],
}

