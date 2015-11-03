var path = require('path');
var webpack = require('webpack');

module.exports = {
    cache: true,
    entry: {
        main: path.join(__dirname, 'assets/js/src/main.js'),
        vendor: ['jquery']
    },
    output: {
        path: path.join(__dirname, 'assets/js/built'),
        filename: '[name].bundle.js',
        chunkFilename: '[chunkhash].js'
    },
    module: {
        noParse: [
            path.join(__dirname, 'node_modules/jquery/dist/jquery.min.js')
        ]
    },
    resolve: {
        alias: {
            // Bind version of jquery
            jquery: path.join(__dirname, 'node_modules/jquery/dist/jquery.min.js')
        }
    },
    plugins: [
        new webpack.optimize.CommonsChunkPlugin('vendor', 'vendor.bundle.js')
    ]
};