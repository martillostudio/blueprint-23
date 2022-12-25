// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ["./index.php", "./app/**/*.php", "./resources/**/*.{php,vue,js}"],
  theme: {
    extend: {
      colors: {}, // Extend Tailwind's default colors
      fontFamily: {
        sans: ["Montserrat", "sans-serif"],
        serif: ["'EB Garamond'", "serif"],
      },
    },
    container: {
      center: true,
      padding: {
        sm: "1.25rem",
        md: "2rem",
        lg: "3rem",
      },
    },
  },
  plugins: [require("@tailwindcss/typography"), require("@tailwindcss/forms")],
};
