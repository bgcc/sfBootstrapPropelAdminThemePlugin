    public function getActionsDefault()
    {
        return <?php echo $this->asPhp(isset($this->config['actions']) ? $this->config['actions'] : array()) ?>;
        <?php unset($this->config['actions']) ?>
    }

    public function getFormActions()
    {
        return <?php echo $this->asPhp(isset($this->config['form']['actions']) ? $this->config['form']['actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_form_actions')); ?>;
        <?php unset($this->config['form']['actions']) ?>
    }

    public function getNewActions()
    {
        return <?php echo $this->asPhp(isset($this->config['new']['actions']) ? $this->config['new']['actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_new_actions')); ?>;
        <?php unset($this->config['new']['actions']) ?>
    }

    public function getEditActions()
    {
        return <?php echo $this->asPhp(isset($this->config['edit']['actions']) ? $this->config['edit']['actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_edit_actions')); ?>;
        <?php unset($this->config['edit']['actions']) ?>
    }

    public function getListObjectActions()
    {
        <?php if ($this->hasBehavior('sortable')): ?>
        return <?php echo $this->asPhp(isset($this->config['list']['object_actions']) ? $this->config['list']['object_actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_object_actions_sortable')); ?>;
        <?php else: ?>
        return <?php echo $this->asPhp(isset($this->config['list']['object_actions']) ? $this->config['list']['object_actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_object_actions')); ?>;
        <?php endif ?>
        <?php unset($this->config['list']['object_actions']) ?>
    }

    public function getListActions()
    {
        return <?php echo $this->asPhp(isset($this->config['list']['actions']) ? $this->config['list']['actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_list_actions')); ?>;
        <?php unset($this->config['list']['actions']) ?>
    }

    public function getListBatchActions()
    {
        return <?php echo $this->asPhp(isset($this->config['list']['batch_actions']) ? $this->config['list']['batch_actions'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_batch_actions')); ?>;
        <?php unset($this->config['list']['batch_actions']) ?>
    }
