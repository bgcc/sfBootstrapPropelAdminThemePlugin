[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

[?php echo $form->renderHiddenFields(false) ?]

[?php if ($form->hasGlobalErrors()): ?]
    <div class="alert alert-danger">
        [?php echo $form->renderGlobalErrors() ?]
    </div>
[?php endif; ?]

[?php if ($configuration->getFormTabs($form->isNew() ? 'new' : 'edit')) : ?]
    <ul id="form_tabs" class="nav nav-tabs">
        [?php $i = 0; ?]
        [?php foreach($configuration->getFormTabs($form->isNew() ? 'new' : 'edit') as $name => $tab) : ?]
            [?php if(!isset($tab['credentials']) || $sf_user->hasCredential($tab['credentials'])) : ?]
                [?php $i++; ?]
                <li [?php $i == 1 and print ' class="active"'; ?]>
                    <a href="#[?php echo $name ?]" data-toggle="tab">
                        <span>[?php echo $tab['label'] ?] <i></i></span>
                    </a>
                </li>
            [?php endif; ?]
        [?php endforeach; ?]
    </ul>

    <div class="tab-content">
        [?php $i = 0; ?]
        [?php foreach($configuration->getFormTabs($form->isNew() ? 'new' : 'edit') as $name => $tab) : ?]
            [?php if(!isset($tab['credentials']) || $sf_user->hasCredential($tab['credentials'])) : ?]
                [?php $i++; ?]
                <div class="form-tab-pane tab-pane[?php $i == 1 and print ' active'; ?]" id="[?php echo $name ?]">
                    [?php foreach ($configuration->getFormFieldsForTab($name, $form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
                        [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
                    [?php endforeach; ?]
                </div>
            [?php endif; ?]
        [?php endforeach; ?]
    </div>

    <input type="hidden" value="[?php echo $sf_request->getParameter('selected_form_tab'); ?]" id="selected_form_tab" name="selected_form_tab" />

    <script type="text/javascript">
    $(document).ready(function() {
        $('#form_tabs a[href="#[?php echo $sf_request->getParameter('selected_form_tab'); ?]"]').tab('show');

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            selected_tab = $(e.target).attr('href').replace(/#/g, '');

            $('#selected_form_tab').val(selected_tab);

            $('a.previous_link, a.next_link').each(function() {
                $(this).attr('href', generatorReplaceUrlParam($(this).attr('href'), 'selected_form_tab', selected_tab));
            });
        });

        $('.tab-content').find('.form-error-message').parents('.tab-pane').each(function() {
            $('#form_tabs a[href="#' + $(this).attr('id') + '"] span').addClass('text-danger');
            $('#form_tabs a[href="#' + $(this).attr('id') + '"] span i').addClass('fa fa-exclamation');
        });
    });
    </script>
[?php else: ?]
    [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
        [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
    [?php endforeach; ?]
[?php endif; ?]
