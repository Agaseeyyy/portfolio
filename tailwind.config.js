/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.php",
    "./public/**/*.html",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        admin: {
          "primary": "#ec4899",
          "primary-focus": "#db2777",
          "primary-content": "#ffffff",
          "secondary": "#f472b6",
          "secondary-focus": "#f9a8d4",
          "secondary-content": "#ffffff",
          "accent": "#f9a8d4",
          "accent-focus": "#fbcfe8",
          "accent-content": "#1f2937",
          "neutral": "#1f2937",
          "neutral-focus": "#374151",
          "neutral-content": "#d1d5db",
          "base-100": "#111827",
          "base-200": "#1f2937",
          "base-300": "#374151",
          "base-content": "#f3f4f6",
          "info": "#3b82f6",
          "info-content": "#ffffff",
          "success": "#22c55e",
          "success-content": "#ffffff",
          "warning": "#f59e0b",
          "warning-content": "#ffffff",
          "error": "#ef4444",
          "error-content": "#ffffff",
        },
      },
      "dark",
    ],
    darkTheme: "admin",
  },
}




