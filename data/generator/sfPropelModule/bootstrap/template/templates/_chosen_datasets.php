[?php use_helper('I18N') ?]
<span class="chosen_datasets">
    [?php $count = $helper->countBatchIds() ?]
    [?php echo format_number_choice('[0] no datasets chosen|[1] one dataset chosen|(1,+Inf] %1% datasets chosen', array('%1%' => $count), $count, 'sf_admin') ?]
</span>
