
const path = require("path");
const mix = require("laravel-mix");


// Build files
mix.js("resources/js/app.js", "public/js")
    .vue({ version: 3 })
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve(__dirname, "resources/js"),
            },
        },
    })
    .extract()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .version();