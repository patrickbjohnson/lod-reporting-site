var path = require('path'),
    webpack = require('webpack'),
    webPackConfig = require('./webpack.config');

module.exports = function(grunt) {

    /*-------------------------------------------- */
    /** Grunt Config */
    /*-------------------------------------------- */

    grunt.initConfig({

        /*-------------------------------------------- */
        /** Sass */
        /*-------------------------------------------- */

        sass: {
            dev: {
                files: [
                    {src: 'assets/sass/main.scss', dest: 'assets/css/main.css'}
                ],
                options: {
                    sourceMap: true
                }
            },

            prod: {
                files: [
                    {src: 'assets/sass/main.scss', dest: 'assets/css/main.min.css'}
                ],
                options: {
                    outputStyle: 'compressed'
                }
            }
        },

        /*-------------------------------------------- */
        /** Webpack */
        /*-------------------------------------------- */

        webpack: {
            options: webPackConfig,

            dev: {
                watch: true,
                debug: true,
                devtool: '#source-map'
            },

            prod: {
                output: {
                    path: path.join(__dirname, 'assets/js/dist'),
                    filename: '[name].bundle.js',
                    chunkFilename: '[chunkhash].js'
                },

                plugins: webPackConfig.plugins.concat(
                    new webpack.optimize.UglifyJsPlugin({
                        compress: {
                            drop_console: true
                        }    
                    })
                )
            }
        },

        /*-------------------------------------------- */
        /** Browser Sync */
        /*-------------------------------------------- */

        browserSync: {
            dev: {
               bsFiles: {
                    /**
                     * Add any additional files to watch below in order to
                     * trigger a reload
                     */
                    src: [
                        'assets/css/*.css',
                        'assets/img/**/*',
                        'assets/js/built/*.js',
                    ]
                },
                options: {
                    watchTask: true,
                    server: true,
                    port: 8080,
                    /**
                     * Uncomment the below if you need to proxy to a local 
                     * server and delete server: true above.
                     */
                    // proxy: 'myserver.loc'
                }
            }
        },
        
        /*-------------------------------------------- */
        /** Watch */
        /*-------------------------------------------- */        

        watch: {
            sass: {
                files: 'assets/sass/**/*.scss',
                tasks: ['sass']
            }
        }
    });

    // load ETR asset generator task
    grunt.loadTasks('grunt/generate/tasks');

    // load NPM tasks
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-webpack');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // register custom tasks
    grunt.registerTask('default', ['browserSync:dev', 'webpack:dev', 'sass:dev', 'watch']);
    grunt.registerTask('production', ['webpack:prod', 'sass:prod']);
};