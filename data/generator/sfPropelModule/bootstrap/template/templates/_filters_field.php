[?php if ($field->isPartial()): ?]
    [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
    [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
    <div class="col-lg-3 col-md-4 col-sm-6 form-group[?php $form[$name]->hasError() and print ' has-error has-feedback'; ?]">
        [?php echo $form[$name]->renderLabel($label, array('class' => 'col-sm-4 control-label')); ?]

        <div class="col-sm-8">
            [?php $attributes = $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes; ?]
            [?php $options = $form[$name]->getWidget()->getOptions(); ?]

            [?php if (
                !(
                    stristr(get_class($form[$name]->getWidget()), 'radio') ||
                    stristr(get_class($form[$name]->getWidget()), 'checkbox') ||
                    stristr(get_class($form[$name]->getWidget()), 'select2') ||
                    (isset($options['renderer_class']) && stristr($options['renderer_class'], 'radio')) ||
                    (isset($options['renderer_class']) && stristr($options['renderer_class'], 'checkbox'))
                )
            ): ?]
                [?php empty($attributes['class']) ? $attributes['class'] = 'form-control input-sm' : $attributes['class'] .= 'form-control'; ?]
            [?php endif; ?]

            [?php echo $form[$name]->render($attributes) ?]

            [?php if ($form[$name]->hasError()): ?]
                <span class="text-danger">
                    [?php echo $form[$name]->getError(); ?]
                </span>
            [?php endif; ?]

            [?php if ($help || $help = $form->getWidgetSchema()->getHelp($name)): ?]
                <span class="help-block">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</span>
            [?php endif; ?]

            [?php if ($form[$name]->hasError()): ?]
                <span class="fa fa-exclamation form-control-feedback"></span>
            [?php endif; ?]
        </div>
    </div>
[?php endif; ?]
