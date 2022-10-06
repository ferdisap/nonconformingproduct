'use strict'

const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

const isProductionMode = process.env.NODE_ENV === 'production'

module.exports = {
    mode: 'production',

    // watch: true,

    devtool: 'source-map',

    // https://webpack.js.org/configuration/entry-context/
    // entry: ['./resources/js/bootstrap.js' ,'./resources/sass/main.scss'],
    entry: './resources/sass/icon.scss',

    // // https://webpack.js.org/configuration/output/
    output: {
        path: path.resolve(__dirname + '/public/css', 'icons'),
        // path: path.resolve( __dirname + '/public/js', 'ckeditor' ),
        filename: 'icons.css'
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename:'[name].css'
        })
    ],

    module: {
        rules: [
          
            {
              // test: /\.s[ac]ss$/i,
              test: /\.(scss|sass|css)$/i,
              
              use: [
                MiniCssExtractPlugin.loader,

                // Translates CSS into CommonJS
                // "css-loader",
                {
                  loader: 'css-loader',
                  options: {
                    url: true,
                  }
                },
                

                // "postcss-loader",
                {
                  loader: "postcss-loader",
                  options: {
                    postcssOptions: {
                      plugins: [
                        [
                          "autoprefixer",
                          {
                            // Options
                          },
                        ],
                      ],
                    },
                  },
                },

                {
                  loader: 'resolve-url-loader',
                  options: {
                    // silent: true,
                    sourceMap: true,
                  }
                },
                

                // Compiles Sass to CSS
                // "sass-loader",
                {
                  loader: 'sass-loader',
                  options: {
                    sourceMap: true, // <-- !!IMPORTANT!!
                  }
                },

              ],
            },
            {
              test: /\.(woff|woff2|eot|ttf|otf)$/i,
              type: 'asset/resource',
            },
        ]
    }
}
