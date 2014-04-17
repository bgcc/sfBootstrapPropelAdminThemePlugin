[?php if ($field->isPartial()): ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)); ?]
[?php elseif ($field->isComponent()): ?]
    [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)); ?]
[?php else: ?]
    <div class="form-group[?php $form[$name]->hasError() and print ' has-error has-feedback'; ?]">
        [?php echo $form[$name]->renderLabel($label, array('class' => 'col-sm-2 control-label')); ?]

        <div class="col-sm-6">
            [?php $attributes = $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes; ?]
            [?php $options = $form[$name]->getWidget()->getOptions(); ?]

            [?php if (
                !(
                    stristr(get_class($form[$name]->getWidget()), 'radio') ||
                    stristr(get_class($form[$name]->getWidget()), 'checkbox') ||
                    stristr(get_class($form[$name]->getWidget()), 'select2') ||
                    stristr(get_class($form[$name]->getWidget()), 'fileeditable') ||
                    (isset($options['renderer_class']) && stristr($options['renderer_class'], 'radio')) ||
                    (isset($options['renderer_class']) && stristr($options['renderer_class'], 'checkbox'))
                )
            ): ?]
                [?php empty($attributes['class']) ? $attributes['class'] = 'form-control' : $attributes['class'] .= 'form-control'; ?]
            [?php endif; ?]

            [?php echo $form[$name]->render($attributes); ?]

            [?php if ($help || $help = $form->getWidgetSchema()->getHelp($name)): ?]
                <span class="help-block">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>'); ?]</span>
            [?php endif; ?]

            [?php if ($form[$name]->hasError()): ?]
                <span class="fa fa-exclamation form-control-feedback"></span>
            [?php endif; ?]
        </div>

        <div class="col-sm-4">
            [?php if ($form[$name]->hasError()): ?]
                <p class="form-error-message text-danger form-text">
                    [?php echo $form[$name]->getError(); ?]
                </p>
            [?php endif; ?]
        </div>
    </div>
[?php endif; ?]
