[?php $widget = new sfWidgetFormChoice(array('choices' => $configuration->getMaxPerPages())); ?]

<div class="form-group">
    <label for="max_per_page">[?php echo __('Entries per page', null, 'sf_admin') ?]:</label>
    [?php echo $widget->render('max_per_page', $helper->getMaxPerPage(), array('class' => 'form-control input-sm', 'onchange' => "generatorMaxPerPage(value)")) ?]
</div>