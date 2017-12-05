const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: './app/assets/main.js',
  output: {
    path: path.resolve(__dirname, '.assets'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.(png|jpg|gif)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 10000
            }
          }
        ]
      },
      {
        test: /\.styl$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            'css-loader',
            'stylus-loader'
          ]
        })
      },
      {
        test: /\.(woff|woff2|eot|ttf|otf|svg)$/,
        use: [
          'file-loader?name=fonts/[name].[ext]'
        ]
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('styles.css'),
  ]
};