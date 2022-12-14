// webpack.config.js

'use strict';

const path = require( 'path' );
const { styles } = require( '@ckeditor/ckeditor5-dev-utils' );
// const webpack = require('webpack'); //to access built-in plugins

module.exports = {

    mode: 'production',

    // https://webpack.js.org/configuration/entry-context/
    entry: './resources/js/myeditor.js',
    // entry: './resources/js/contoh.js',

    // https://webpack.js.org/configuration/output/
    output: {
        path: path.resolve( __dirname + '/public/js', 'editor' ),
        filename: 'editor.bundle.js',
        library: 'MyEditor'

        // path: path.resolve( __dirname + '/public/js'),
        // filename: 'contohScript123.js',
        // library: 'ContohScript'
    },

    module: {
        rules: [
            {
                test: /ckeditor5-[^/\\]+[/\\]theme[/\\]icons[/\\][^/\\]+\.svg$/,

                use: [ 'raw-loader' ]
            },
            {
                test: /ckeditor5-[^/\\]+[/\\]theme[/\\].+\.css$/,

                use: [
                    {
                        loader: 'style-loader',
                        options: {
                            injectType: 'singletonStyleTag',
                            attributes: {
                                'data-cke': true
                            }
                        }
                    },
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: styles.getPostCssConfig( {
                                themeImporter: {
                                    themePath: require.resolve( '@ckeditor/ckeditor5-theme-lark' )
                                },
                                minify: true
                            } )
                        }
                    }
                ]
            }
        ]
    },

    // Useful for debugging.
    devtool: 'source-map',

    // By default webpack logs warnings if the bundle is bigger than 200kb.
    performance: { hints: false }
};
