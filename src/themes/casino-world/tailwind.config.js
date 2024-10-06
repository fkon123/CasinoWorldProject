module.exports = {
  content: [
    './*.php',          
    './**/*.php',      
  ],
  theme: {
    extend: {
      colors: {
        'primary-purple': 'var(--primary-purple)',
        'primary-white': 'var(--primary-white)',
        'cards-small-line': 'var(--cards-small-line)',
        'lines-purple': 'var(--lines-purple)',
        'cards-purple': 'var(--cards-purple)',
        'cards-text-pink': 'var(--cards-text-pink)',
        'cards-big-line': 'var(--cards-big-line)',
        'active-card-bg': 'var(--active-card-bg)',
        'active-card-bold-title': 'var(--active-card-bold-title)',
        'active-card-descr-text': 'var(--active-card-descr-text)',
        'inactive-btn-bg': 'var(--inactive-btn-bg)',
        'btn-text': 'var(--btn-text)',
        'active-btn-bg': 'var(--active-btn-bg)',
        'active-btn-bg-hover': 'var(--active-btn-bg-hover)',
      },
      fontFamily: {
        montserrat: ['var(--font-family-montserrat)', 'sans-serif'],
      },
      fontSize: {
        '14': 'var(--font-size-14)',
        '22': 'var(--font-size-22)',
        '24': 'var(--font-size-24)',
        '28': 'var(--font-size-28)',
      },
      letterSpacing: {
        '0': 'var(--character-spacing-0)',
        '-0-84': 'var(--character-spacing--0-84)',
        '-1-1': 'var(--character-spacing--1-1)',
        '-1-2': 'var(--character-spacing--1-2)',
      },
      lineHeight: {
        '18': 'var(--line-spacing-18)',
        '60': 'var(--line-spacing-60)',
      },
    },
  },
  plugins: [],
}
