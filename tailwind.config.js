/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      inter: ['Inter'],
      sans: ['Inter'],

    }
    ,
    container: {
      padding: {
        sm: '20px',
        md: '20px'
      },
      screens: {
        xl: '1170px',
      },
      center: true,
    },
    extend: {
      colors: {
        primary: '#217BF4',
        title: '#0A093D',
        secondary: '#656464',
        blueli: '#171648',
      }
    }
  },
  plugins: [],
}
