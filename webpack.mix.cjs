const mix = require('laravel-mix');

// Compile SCSS and CSS files
mix.sass('resources/scss/app.scss', 'public/css')
    .sass('resources/scss/private-meetings.scss', 'public/css')
    .sass('resources/scss/campaigns.scss', 'public/css')
    .sass('resources/scss/always_on.scss', 'public/css')
    .sass('resources/scss/greece_gv.scss', 'public/css')
    .sass('resources/scss/residency.scss', 'public/css');

// Compile JS files
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/private-meetings.js', 'public/js')
    .js('resources/js/campaigns.js', 'public/js')
    .js('resources/js/residency.js', 'public/js')
    .js('resources/js/script.js', 'public/js')
    .js('resources/js/multistep_form.js', 'public/assets/js')
    .js('resources/js/notify.js', 'public/js');

// Enable source maps for easier debugging (optional)
mix.sourceMaps();

// Enable versioning (cache-busting) in production
if (mix.inProduction()) {
    mix.version();
}
mix.webpackConfig({
    performance: {
        hints: false,
        maxEntrypointSize: 512000, // Limit size of entry points
        maxAssetSize: 512000,      // Limit size of assets
    },
    optimization: {
        splitChunks: {
            chunks: 'all',
        },
    },
});
