/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      backgroundImage: {
        "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
        "gradient-conic":
          "conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))",
      },
      input: {
        base: 'rounded border bg-gray-100 border-gray-300 px-4 py-2 mb-4',
      },
      button: {
        base: 'rounded bg-blue-500 text-white px-4 py-2',
        second: 'rounded bg-yellow-500 text-white px-4 py-2',
      },
    },
  },
  plugins: [],
};
