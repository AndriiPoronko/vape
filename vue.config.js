module.exports = {
    publicPath: process.env.NODE_ENV === "production" ? "/vape_app/" : "/",
    css: {
        loaderOptions: {
            sass: {
                sassOptions: {
                    prependData: '@import "./resources/sass/app.scss"',
                }
            },
        },
    },
};
