const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry: {main: './src/js/index.js'},
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js'
    },
    module: {
        rules: [
            {
              test: /\.js$/,
              exclude: /node_modules/
            },
            {
              test: /\.(sa|sc|c)ss$/,
              use:  [  'style-loader', MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader', 'sass-loader']
            }
        ]
    },
    plugins: [

        new MiniCssExtractPlugin({
          filename: "bundle.css"
        }),
        new HtmlWebpackPlugin({
          inject: false,
          hash: true,
          template: './src/index.html',
          filename: 'index.html'
        })
      
    ]
};