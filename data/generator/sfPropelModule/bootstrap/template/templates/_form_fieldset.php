<div class="panel panel-default">
    [?php if ($fieldset): ?]
        <div class="panel-heading">[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue(); ?>') ?]</div>
    [?php endif; ?]

    <div class="panel-body">
        [?php foreach ($fields as $name => $field): ?]
            [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue; ?]

            [?php include_partial('<?php echo $this->getModuleName() ?>/form_field', array(
                'name'       => $name,
                'attributes' => $field->getConfig('attributes', array()),
                'label'      => $field->getConfig('label'),
                'help'       => $field->getConfig('help'),
                'form'       => $form,
                'field'      => $field
            )); ?]
        [?php endforeach; ?]
    </div>
</div>