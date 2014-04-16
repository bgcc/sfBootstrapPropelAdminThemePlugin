    public function getPaginateMethod()
    {
        return '<?php echo isset($this->config['list']['paginate_method']) ? $this->config['list']['paginate_method'] : 'paginate' ?>';
        <?php unset($this->config['list']['paginate_method']) ?>
    }

    public function getPagerMaxPerPage()
    {
        return <?php echo isset($this->config['list']['max_per_page']) ? (integer) $this->config['list']['max_per_page'] : sfConfig::get('sf_sfBootstrapPropelAdminTheme_max_per_page') ?>;
        <?php unset($this->config['list']['max_per_page']) ?>
    }
