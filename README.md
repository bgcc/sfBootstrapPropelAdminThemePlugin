sfBootstrapPropelAdminThemePlugin
======================

[![License](https://poser.pugx.org/bgcc/sf-bootstrap-propel-admin-theme-plugin/license.png)](https://packagist.org/packages/bgcc/sf-bootstrap-propel-admin-theme-plugin)
[![Total Downloads](https://poser.pugx.org/bgcc/sf-bootstrap-propel-admin-theme-plugin/downloads.png)](https://packagist.org/packages/bgcc/sf-bootstrap-propel-admin-theme-plugin)
[![Monthly Downloads](https://poser.pugx.org/bgcc/sf-bootstrap-propel-admin-theme-plugin/d/monthly.png)](https://packagist.org/packages/bgcc/sf-bootstrap-propel-admin-theme-plugin)
[![Daily Downloads](https://poser.pugx.org/bgcc/sf-bootstrap-propel-admin-theme-plugin/d/daily.png)](https://packagist.org/packages/bgcc/sf-bootstrap-propel-admin-theme-plugin)

Description
-----------
The `sfBootstrapPropelAdminThemePlugin` is a [symfony 1.4](https://github.com/bgcc/symfony1) plugin that provides a [Bootstrap 3](https://github.com/twbs/bootstrap) based admin theme for [Propel 1.5+](https://github.com/propelorm/sfPropelORMPlugin).
All icons are replaced with [Font Awesome](https://github.com/FortAwesome/Font-Awesome).

Screenshots
-----------
Available Screenshots:
  * Login
  * Navigation
  * List
  * Responsive List
  * Form with tabs (first tab selected)
  * Form with tabs (second tab selected)
  * Form with tabs and error (second tab selected)
  * Responsive Form

View the gallery under [http://imgur.com/a/Smu3G](http://imgur.com/a/Smu3G).

Features
------------
  * Full features from admin15 theme of sfPropelORMPlugin
  * Additional features
    * Session based batch selection of list items (keeps the selection upon navigation)
    * Override default settings via settings.yml
    * Changing the page title depending on module and action
    * Pagination inside the form
    * Enhanced generator.yml with tabs and panels
  * Responsive layout
  * Bootstrap 3
  * Font Awesome
  * Bootstrap 3 optimized widgets
  * Auto-adding of necessary CSS classes to filter and form widgets

Requirements
------------
  * [symfony 1.4](https://github.com/bgcc/symfony1)
  * [sfPropelORMPlugin](https://github.com/propelorm/sfPropelORMPlugin)

Installation via Composer
-------------------------
```json
{
    "require": {
        "bgcc/sf-bootstrap-propel-admin-theme-plugin": "dev-master"
    }
}
```

Installation via Git
--------------------
  * Install the plugin and init submodule

        $ git submodule add git://github.com/bgcc/sfBootstrapPropelAdminThemePlugin.git plugins/sfBootstrapPropelAdminThemePlugin
        $ git submodule update --init --recursive

Setup
-----
  * Enable the plugin in your `/config/ProjectConfiguration.class.php`
    ``` php
    $this->enablePlugins('sfBootstrapPropelAdminThemePlugin');
    ```

  * Publish assets

        $ ./symfony plugin:publish-assets

  * Clear you cache

        $ ./symfony cc

  * See the config folder of the plugin for examples of `view.yml` (for the application) and `generator.yml`.

  * Enable the module in your `application_name/config/settings.yml`
    ``` yaml
    all:
      .settings:
        enabled_modules:        [ theme ]
    ```

  * Generate a propel admin module with the bootstrap theme

        $ ./symfony propel:generate-admin --theme="bootstrap" application_name ModelName

Included Widgets
-----
  * `sfWidgetFormBootstrap3I18nNumber`: Input widget with an optional input-group that formats the number based on a given culture.

  * `sfWidgetFormBootstrap3Input`: Input widget with an optional input-group that formats the number based on a given culture.

  * `sfWidgetFormBootstrap3SelectCheckbox`: Renderer class for expandend multiple choice widgets. Usage:
    ``` php
    $this->setWidget('widget_name', new sfWidgetFormChoice(array(
        'choices'        => $choices,
        'expanded'       => true,
        'multiple'       => true,
        'renderer_class' => 'sfWidgetFormBootstrap3SelectCheckbox'
    )));
    ```

  * `sfWidgetFormBootstrap3SelectRadio`: Renderer class for expandend choice widgets. Usage:
    ``` php
    $this->setWidget('widget_name', new sfWidgetFormChoice(array(
        'choices'        => $choices,
        'expanded'       => true,
        'renderer_class' => 'sfWidgetFormBootstrap3SelectRadio'
    )));
    ```

Bonus
-----
  * Check the `signinSuccess.php` in `plugins/sfBootstrapPropelAdminThemePlugin/modules/theme/templates` for a nice login page. Copy the content to the template of your signin action and modify it if it's necessary.

  * Modify the `view.yml` of the module where you sigin action is placed and add
    ``` yaml
    signinSuccess:
        layout:       %sf_plugins_dir%/sfBootstrapPropelAdminThemePlugin/templates/login
    ```

Contribution
-----
  * Issues and pull requests are welcome.
  * If you have a feature request or question feel free to open an issue.
