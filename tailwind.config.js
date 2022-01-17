module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      'sans': ['Poppins', 'ui-sans-serif', 'system-ui'],
    },
    extend: {
      colors: {
        'hijau' : '#3E7C17',
        'hijau-tua' : '#125C13',
        'kuning' : '#F4A442',
        'cream' : '#E8E1D9',
        'cream-dark' : '#a88e70',
      },
      minWidth:{
        '64' : '16rem',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
