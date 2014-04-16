sfBootstrapPropelAdminThemePlugin
======================

Description
-----------
The `sfBootstrapPropelAdminThemePlugin` is a symfony 1.4 plugin that provides a Twitter Bootstrap 3.x based admin theme for Propel 1.5+.

Requirements
------------
  * symfony 1.4
  * [Propel ORM](https://github.com/propelorm/sfPropelORMPlugin)

Installation via Composer
-------------------------
```json
{
    "require": {
        "bgcc/sf-bootstrap-propel-admin-theme-plugin": "~1.0"
    }
}
```

Installation via Git
--------------------
  * Install the plugin and init submodule

        $ git submodule add git://github.com/bgcc/sfBootstrapPropelAdminThemePlugin.git plugins/sfBootstrapPropelAdminThemePlugin
        $ git submodule update --init --recursive

  * Enable the plugin in your `/config/ProjectConfiguration.class.php`
    ``` php
    $this->enablePlugins('sfBootstrapPropelAdminThemePlugin');
    ```

  * Publish assets

        $ ./symfony plugin:publish-assets

  * Clear you cache

        $ ./symfony cc

Setup
-----
  * See the config folder of the plugin for examples of `view.yml` (for the application) and `generator.yml`.

  * Enable the module in your `application_name/config/settings.yml`
    ``` yaml
    all:
      .settings:
        enabled_modules:        [ theme ]
    ```

Bonus
-----
  * Check the `signinSuccess.php` in `plugins/sfBootstrapPropelAdminThemePlugin/modules/theme/templates` for a nice login page. Copy the content to the template of your signin action and modify it if it's necessary.

  * Modify the `view.yml` of the module where you sigin action is placed and add
    ``` yaml
    signinSuccess:
        layout:       %sf_plugins_dir%/sfBootstrapPropelAdminThemePlugin/templates/login
    ```