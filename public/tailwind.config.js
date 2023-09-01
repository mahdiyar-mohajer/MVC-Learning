/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}",
    "./index.php",
    "../views/layout/main.php",
    "../views/404.php",
    "../views/doctorList.php",
    "./dist/output.css",
    "./*.php"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

