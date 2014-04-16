[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

[?php if ($form->hasGlobalErrors()): ?]
    <div class="alert alert-danger">
        [?php echo $form->renderGlobalErrors() ?]
    </div>
[?php endif; ?]

<div class="panel panel-default">
    <div class="panel-heading">[?php echo __('Filter', array(), 'sf_admin') ?]</div>
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" class="form-horizontal filter" role="form" method="post">
        [?php echo $form->renderHiddenFields() ?]

        <div class="panel-body">
            [?php $i = 0; ?]

            <div class="row">
                [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
                    [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
                    [?php $i++; ?]
                    [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
                        'name'       => $name,
                        'attributes' => $field->getConfig('attributes', array()),
                        'label'      => $field->getConfig('label'),
                        'help'       => $field->getConfig('help'),
                        'form'       => $form,
                        'field'      => $field
                    )); ?]

                    [?php if ($i % 2 == 0): ?]
                        <div class="clearfix visible-sm"></div>
                    [?php endif; ?]

                    [?php if ($i % 3 == 0): ?]
                        <div class="clearfix visible-md"></div>
                    [?php endif; ?]

                    [?php if ($i % 4 == 0): ?]
                        <div class="clearfix visible-lg"></div>
                    [?php endif; ?]
                [?php endforeach; ?]
            </div>
        </div>

        <div class="panel-footer text-right">
            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-filter"></i> [?php echo __('Filter', array(), 'sf_admin') ?]</button>
            [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn btn-link btn-xs')) ?]
        </div>
    </form>
</div>