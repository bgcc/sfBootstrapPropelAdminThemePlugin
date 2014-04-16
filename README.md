sfBootstrapPropelAdminThemePlugin
======================

Description
-----------
The `sfBootstrapPropelAdminThemePlugin` is a symfony 1.2 / 1.3 / 1.4 plugin that provides a Twitter Bootstrap 3.x base admin theme for Propel 1.6+.

Requirements
------------
  * symfony 1.2 / 1.3 / 1.4
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

Usage
-----
Coming soon...
