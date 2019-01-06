const webpackMerge = require('webpack-merge')
const commonConfiguration = require('./webpack.common.js')
const webpack = require('webpack')

module.exports = webpackMerge(
    commonConfiguration,
    {
        mode: 'development',
        devServer:
        {
            contentBase: './dist',
            hot: true,
            open: true
        },
        plugins:
        [
            new webpack.HotModuleReplacementPlugin()
        ]
    }
)