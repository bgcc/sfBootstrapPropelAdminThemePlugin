<?php if ($listActions = $this->configuration->getValue('list.batch_actions')): ?>
    <div class="form-group">
        <label for="batch_action">[?php echo __('All chosen datasets', array(), 'sf_admin') ?]:</label>
        <select name="batch_action" class="form-control input-sm">
            <option value=""></option>
            <?php foreach ((array) $listActions as $action => $params): ?>
                <?php echo $this->addCredentialCondition('<option value="'.$action.'">[?php echo __(\''.$params['label'].'\', array(), \'sf_admin\') ?]</option>', $params) ?>
            <?php endforeach; ?>
        </select>
        [?php $form = new BaseForm(); ?]
        [?php if ($form->isCSRFProtected()): ?]
            <input type="hidden" name="[?php echo $form->getCSRFFieldName() ?]" value="[?php echo $form->getCSRFToken() ?]" />
        [?php endif; ?]
        <button type="submit" class="btn btn-default btn-sm">[?php echo __('OK', array(), 'sf_admin') ?]</button>
    </div>
<?php endif; ?>