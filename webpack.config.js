const Encore = require("@symfony/webpack-encore");

if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || "dev");
}

Encore.setOutputPath("public/build/")
  .setPublicPath("/build")
  .copyFiles({
    from: "./assets/images",
    to: "images/[path][name].[ext]",
  })
  .addEntry("app", "./assets/app.ts")
  .splitEntryChunks()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = "usage";
    config.corejs = "3.23";
  })
  .enableSassLoader()
  .enableTypeScriptLoader()
  .autoProvidejQuery()
  // Tu dodajemy wywołanie metody .enableSingleRuntimeChunk()
  .enableSingleRuntimeChunk(); // Możesz tu również użyć .disableSingleRuntimeChunk() jeśli to preferujesz

const appConfig = Encore.getWebpackConfig();
appConfig.name = "appConfig";
Encore.reset();

Encore.setOutputPath("public/build/admin/")
  .setPublicPath("/build/admin")
  .addEntry("app-admin", "./assets/admin/app-admin.ts")
  .splitEntryChunks()
  .enableSingleRuntimeChunk()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = "usage";
    config.corejs = "3.23";
  })
  .enableSassLoader()
  .enableTypeScriptLoader()
  .autoProvidejQuery();

const appAdminConfig = Encore.getWebpackConfig();
appAdminConfig.name = "appAdminConfig";

module.exports = [appConfig, appAdminConfig];
