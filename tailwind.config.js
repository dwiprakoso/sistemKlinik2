/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins'],
      },
      colors: {
        'abu-abu': '#8a8a8a',
        'e73002' : '#e73002',
        'fd7d09' : '#fd7d09',
        'fd1d02' : '#fd1d02',
        'negative': '#EF4423',
        'negative-hover': '#D53A12',
        'positive': '#50C878',
        'positive-hover': '#409c5d',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')({
      charts: true,
    }),
  ],
}

