const path = require('path')
const webpackMerge = require('webpack-merge')
const commonConfiguration = require('./webpack.common.js')
const CleanWebpackPlugin = require('clean-webpack-plugin')

module.exports = webpackMerge(
    commonConfiguration,
    {
        mode: 'production',
    },
    {
        plugins:
        [
            new CleanWebpackPlugin(['dist'], { root: path.resolve(__dirname, '..') })
        ]
    }
)