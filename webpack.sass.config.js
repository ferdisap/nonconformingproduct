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
    entry: './resources/sass/main.scss',

    // // https://webpack.js.org/configuration/output/
    output: {
        path: path.resolve(__dirname + '/public', 'sass')
        // path: path.resolve( __dirname + '/public/js', 'ckeditor' ),
        // filename: 'mycss.bundle.js'
    },

    plugins: [
        new MiniCssExtractPlugin({
            filename:'[name].css'
        })
    ],

    module: {
        rules: [
            // {
            //     test: /.(scss|css)$/,
            //     // exclude: /node_modules/,
            //     use: [
            //       {
            //         loader: MiniCssExtractPlugin.loader,
            //         // options: {
            //         //   reloadAll: false,
            //         //   },
            //       },
            //       'css-loader','postcss-loader','sass-loader'
            //   ]
            // },
            {
              test: /\.s[ac]ss$/i,
              use: [
                MiniCssExtractPlugin.loader,

                // Translates CSS into CommonJS
                "css-loader",

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

                // Compiles Sass to CSS
                "sass-loader",
              ],
            },
            // {
            //   test: /\.scss$/i,
            //   use: [MiniCssExtractPlugin.loader, "sass-loader"],
            // },
        ]
    }
}
