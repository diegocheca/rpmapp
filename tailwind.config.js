const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    mode: "jit",
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
        // screens: {
        //     // tablet: "640px",
        //     // => @media (min-width: 640px) { ... }

        //     // laptop: "1024px",
        //     // => @media (min-width: 1024px) { ... }

        //     // desktop: "1280px",
        //     // => @media (min-width: 1280px) { ... }
        //     tablet: { min: "640px", max: "767px" },
        //     laptop: { min: "768px", max: "1023px" },
        //     desktop: { min: "1024px", max: "1279px" },
        //     // xl: { min: "1280px", max: "1535px" },
        //     // "2xl": { min: "1536px" },
        // },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
