
const path = require("path");
const localDomain = "http://autoakademia.test";

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = {
  entry: ["./sass/screen.scss", "./js/main.js"],
  output: {
    path: path.resolve(__dirname, "../dist"),
    filename: "js/[name].js",
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "stylesheets/[name].css",
    }),

    new BrowserSyncPlugin(
      {
        // browse to http://localhost:3000/ during development,
        // ./public directory is being served
        proxy: localDomain,
        files: [
          "./../",
          "./../**/*.php",
          "./../*.php",
          "./",
          "!./node_modules",
          "!./yarn-error.log",
          "!./package.json",
          "!./style.css.map",
          "!./app.js.map",
        ],
        injectCss: true,
        online: true
      },
      { reload: false }
    ),
  ],
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
            plugins: [["@babel/transform-runtime"]],
          },
        },
      },
      {
        test: [/\.sass$/i, /\.scss$/i, /\.css$/i],
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              sourceMap: true,
            },
          },
          {
            loader: "postcss-loader",
            options: {
              sourceMap: true,
              postcssOptions: {
                plugins: [
                  [
                    "postcss-preset-env",
                    {
                      browsers: "last 6 versions",
                    },
                  ],
                ],
              },
            },
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
            },
          },
        ],
      },
    ],
  }
};
