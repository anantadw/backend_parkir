module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'hijau' : '#3E7C17',
        'hijau-tua' : '#125C13',
        'kuning' : '#F4A442',
        'cream' : '#E8E1D9'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
