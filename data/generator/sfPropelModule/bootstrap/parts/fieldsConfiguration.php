    public function getListParams()
    {
        return <?php echo $this->asPhp(isset($this->config['list']['params']) ? $this->config['list']['params'] : '%%'.implode('%% - %%', isset($this->config['list']['display']) ? $this->config['list']['display'] : $this->getAllFieldNames(false)).'%%') ?>;
        <?php unset($this->config['list']['params']) ?>
    }

    public function getListLayout()
    {
        return '<?php echo isset($this->config['list']['layout']) ? $this->config['list']['layout'] : 'tabular' ?>';
        <?php unset($this->config['list']['layout']) ?>
    }

    public function getListTitle()
    {
        return '<?php echo $this->escapeString(isset($this->config['list']['title']) ? $this->config['list']['title'] : sfInflector::humanize($this->getModuleName()).' List') ?>';
        <?php unset($this->config['list']['title']) ?>
    }

    public function getEditTitle()
    {
        return '<?php echo $this->escapeString(isset($this->config['edit']['title']) ? $this->config['edit']['title'] : 'Edit '.sfInflector::humanize($this->getModuleName())) ?>';
        <?php unset($this->config['edit']['title']) ?>
    }

    public function getNewTitle()
    {
        return '<?php echo $this->escapeString(isset($this->config['new']['title']) ? $this->config['new']['title'] : 'New '.sfInflector::humanize($this->getModuleName())) ?>';
        <?php unset($this->config['new']['title']) ?>
    }

    public function getFilterDisplay()
    {
        return <?php echo $this->asPhp(isset($this->config['filter']['display']) ? $this->config['filter']['display'] : array()) ?>;
        <?php unset($this->config['filter']['display']) ?>
    }

    public function getFormDisplay()
    {
        <?php if (isset($this->config['form']['display'])): ?>
        return <?php echo $this->asPhp($this->config['form']['display']) ?>;
        <?php elseif (isset($this->config['form']['tabs'])): ?>
            <?php $tab_display = array() ?>
            <?php foreach ($this->config['form']['tabs'] as $tab): ?>
                <?php if (isset($tab['display'])): ?>
                    <?php $tab_display = array_merge($tab_display, $tab['display']); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        return <?php echo $this->asPhp($tab_display) ?>;
        <?php else: ?>
        return array();
        <?php endif; ?>
        <?php unset($this->config['form']['display']) ?>
    }

    public function getEditDisplay()
    {
        return <?php echo $this->asPhp(isset($this->config['edit']['display']) ? $this->config['edit']['display'] : array()) ?>;
        <?php unset($this->config['edit']['display']) ?>
    }

    public function getNewDisplay()
    {
        return <?php echo $this->asPhp(isset($this->config['new']['display']) ? $this->config['new']['display'] : array()) ?>;
        <?php unset($this->config['new']['display']) ?>
    }

    public function getListDisplay()
    {
        <?php if (isset($this->config['list']['display'])): ?>
        return <?php echo $this->asPhp($this->config['list']['display']) ?>;
        <?php elseif (isset($this->config['list']['hide'])): ?>
        return <?php echo $this->asPhp(array_diff($this->getAllFieldNames(false), $this->config['list']['hide'])) ?>;
        <?php else: ?>
        return <?php echo $this->asPhp($this->getAllFieldNames(false)) ?>;
        <?php endif; ?>
        <?php unset($this->config['list']['display'], $this->config['list']['hide']) ?>
    }

    public function getFieldsDefault()
    {
        return array(
            <?php foreach ($this->getDefaultFieldsConfiguration() as $name => $params): ?>
            '<?php echo $name ?>' => <?php echo $this->asPhp($params) ?>,
            <?php endforeach; ?>
        );
    }

    <?php foreach (array('list', 'filter', 'form', 'edit', 'new') as $context): ?>
    public function getFields<?php echo ucfirst($context) ?>()
    {
        return array(
            <?php foreach ($this->getFieldsConfiguration($context) as $name => $params): ?>
            '<?php echo $name ?>' => <?php echo $this->asPhp($params) ?>,
            <?php endforeach; ?>
        );
    }
    <?php endforeach; ?>

    public function hasHiddenFilterFields()
    {
        foreach ($this->getFieldsDefault() as $name => $params) {
            if (isset($params['filter']) && $params['filter'] == 'hidden') {
                return true;
            }
        }

        return false;
    }

    public function getFormFieldsForTab($tab_name, sfForm $form, $new)
    {
        foreach($this->getFormTabs($new) as $name => $tab) {
            if ($name == $tab_name && isset($tab['display'])) {
                $return = array();

                foreach ($this->getFormFields($form, $new) as $fieldset => $field) {
                    foreach($tab['display'] as $name) {
                        list($display, $flag) = sfModelGeneratorConfigurationField::splitFieldWithFlag($name);

                        if ($fieldset != 'NONE') {
                            if ($fieldset == $display) {
                                $return[$fieldset] = $field;
                                continue;
                            }
                        } else {
                            foreach ($field as $single_name => $single_field) {
                                if ($single_name == $display) {
                                    $return['NONE'][$single_name] = $single_field;
                                    break;
                                }
                            }
                        }
                    }
                }

                return $return;
            }
        }

        throw new sfException('Tab '.$tab_name.' not found');
    }