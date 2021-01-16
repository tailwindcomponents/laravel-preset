module.exports = {
  purge: [
    "app/**/*.php",
    "resources/**/*.html",
    "resources/**/*.js",
    "resources/**/*.jsx",
    "resources/**/*.ts",
    "resources/**/*.tsx",
    "resources/**/*.php",
    "resources/**/*.vue",
    "resources/**/*.twig"
  ],
  theme: {
    extend: {
      fontFamily: {
        "nunito": ["Nunito"],
      },
    }
  },
  variants: {},
  plugins: [
    require("@tailwindcss/forms")
  ]
}
