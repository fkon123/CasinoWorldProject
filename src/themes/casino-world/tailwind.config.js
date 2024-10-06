module.exports = {
  content: [
    './*.php',          
    './**/*.php',      
  ],
  theme: {
    extend: {
      colors: {
        primary: 'var(--unnamed-color-3bdec8)',
        secondary: 'var(--unnamed-color-7d33ff)',
        highlight: 'var(--unnamed-color-ffba00)',
        danger: 'var(--unnamed-color-ff4757)',
        success: 'var(--unnamed-color-45c93a)',
      },
      fontFamily: {
        montserrat: ['var(--unnamed-font-family-montserrat)', 'sans-serif'],
      },
      fontSize: {
        '14': 'var(--unnamed-font-size-14)',
        '22': 'var(--unnamed-font-size-22)',
        '24': 'var(--unnamed-font-size-24)',
        '28': 'var(--unnamed-font-size-28)',
      },
    },
  },
  plugins: [],
}
