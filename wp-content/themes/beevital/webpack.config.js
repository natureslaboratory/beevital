module.exports = {
    entry: './scripts/src/index.ts',
    output: {
        filename: "./scripts/index.js"
    },
    watch: true,
    mode: "development",
    resolve: {
        extensions: [".webpack.js", ".web.ts", ".ts", ".tsx", ".js", ".css"]
    },
    devtool: "source-map",
    module: {
        rules:  [
            {
                test: /\.tsx?$/, loader: 'ts-loader'
            },
            {
                test: /\.css$/, use: ["style-loader", "css-loader"]
            },
            {
                test: /\.js$/, loader: "source-map-loader",
            }
        ] 
    }
}