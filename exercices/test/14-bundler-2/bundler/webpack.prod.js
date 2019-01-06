const CleanWebpackPlugin = require('clean-webpack-plugin')
const path = require('path')
const webpackMerge = require('webpack-merge')
const commonConfiguration = require('./webpack.common.js')

module.exports = webpackMerge(
    commonConfiguration,
    {
        mode: 'production',
        plugins:
        [
            new CleanWebpackPlugin(['dist'], { root: path.resolve(__dirname, '..') })
        ]
    }
)