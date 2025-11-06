module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.ts",
        "./resources/**/*.vue",
        "./resources/**/*.jsx",
        "./resources/**/*.tsx",
        "./storage/framework/views/**/*.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                dark: {
                    DEFAULT: "#1a1b1e",
                    100: "#2C2D31",
                    200: "#1F2023",
                    300: "#18191c",
                },
            },
            fontFamily: {
                sans: [
                    '"Instrument Sans"',
                    "ui-sans-serif",
                    "system-ui",
                    "sans-serif",
                ],
            },
            backgroundImage: {
                "gradient-dark":
                    "linear-gradient(to bottom right, #111827, #312e81)",
                "gradient-purple":
                    "linear-gradient(to bottom right, #4a1d96, #312e81)",
            },
        },
    },
    plugins: [],
};
