[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorConfiguration extends sfModelGeneratorConfiguration
{
<?php include dirname(__FILE__).'/actionsConfiguration.php' ?>

<?php include dirname(__FILE__).'/fieldsConfiguration.php' ?>

    /**
     * Gets the form class name.
     *
     * @return string The form class name
     */
    public function getFormClass()
    {
        return '<?php echo isset($this->config['form']['class']) ? $this->config['form']['class'] : $this->getModelClass().'Form' ?>';
        <?php unset($this->config['form']['class']) ?>
    }

    public function hasFilterForm()
    {
        return <?php echo !isset($this->config['filter']['class']) || false !== $this->config['filter']['class'] ? 'true' : 'false' ?>;
    }

    /**
     * Gets the filter form class name
     *
     * @return string The filter form class name associated with this generator
     */
    public function getFilterFormClass()
    {
        return '<?php echo isset($this->config['filter']['class']) && !in_array($this->config['filter']['class'], array(null, true, false), true) ? $this->config['filter']['class'] : $this->getModelClass().'FormFilter' ?>';
        <?php unset($this->config['filter']['class']) ?>
    }

<?php include dirname(__FILE__).'/paginationConfiguration.php' ?>

<?php include dirname(__FILE__).'/sortingConfiguration.php' ?>

    public function getWiths()
    {
        return <?php echo $this->asPhp(isset($this->config['list']['with']) ? $this->config['list']['with'] : array()) ?>;
        <?php unset($this->config['list']['with']) ?>
    }

    public function getQueryMethods()
    {
        return <?php echo $this->asPhp(isset($this->config['list']['query_methods']) ? $this->config['list']['query_methods'] : array()) ?>;
        <?php unset($this->config['list']['query_methods']) ?>
    }

    public function getMaxPerPages()
    {
        $defaults = sfConfig::get('sf_sfBootstrapPropelAdminTheme_max_per_pages');

        return <?php echo isset($this->config['list']['max_per_pages']) ? "array_combine(".$this->asPhp($this->config['list']['max_per_pages']).", ".$this->asPhp($this->config['list']['max_per_pages']).")" : "array_combine(\$defaults, \$defaults)"  ?>;
        <?php unset($this->config['list']['max_per_pages']) ?>
    }

    public function getFormTabs($type = 'new')
    {
        if ($type == 'new' && $this->getNewTabs() != false) {
            return $this->getNewTabs();
        } elseif ($type == 'edit' && $this->getEditTabs() != false) {
            return $this->getEditTabs();
        }

        return <?php echo $this->asPhp(isset($this->config['form']['tabs']) ? $this->config['form']['tabs'] : false) ?>;
        <?php unset($this->config['form']['tabs']) ?>
    }

    public function getEditTabs()
    {
        return <?php echo $this->asPhp(isset($this->config['edit']['tabs']) ? $this->config['edit']['tabs'] : false) ?>;
        <?php unset($this->config['edit']['tabs']) ?>
    }

    public function getNewTabs()
    {
        return <?php echo $this->asPhp(isset($this->config['new']['tabs']) ? $this->config['new']['tabs'] : false) ?>;
        <?php unset($this->config['new']['tabs']) ?>
    }
}
