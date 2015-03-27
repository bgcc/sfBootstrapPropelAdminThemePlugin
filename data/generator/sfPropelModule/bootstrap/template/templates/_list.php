[?php if (!$pager->getNbResults()): ?]
<div class="alert alert-warning">[?php echo __('No result', array(), 'sf_admin') ?]</div>
[?php else: ?]
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                    <th>
                        <input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" />
                    </th>
                <?php endif; ?>

                [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>', array('sort' => $sort)) ?]

                <?php if ($this->configuration->getValue('list.object_actions')): ?>
                    <th>
                        [?php echo __('Actions', array(), 'sf_admin'); ?]
                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="<?php echo count($this->configuration->getValue('list.display')) + ($this->configuration->getValue('list.object_actions') ? 1 : 0) + ($this->configuration->getValue('list.batch_actions') ? 1 : 0) ?>">
                    <div class="pull-left">
                        [?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?]
                        [?php if ($pager->haveToPaginate()): ?]
                            [?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?]
                        [?php endif; ?]

                        <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                        | [?php include_partial('<?php echo $this->getModuleName() ?>/chosen_datasets', array('helper' => $helper)) ?]
                        <?php endif; ?>
                    </div>

                    [?php if ($pager->haveToPaginate()): ?]
                        <div class="pull-right">
                            [?php include_partial('<?php echo $this->getModuleName() ?>/pagination', array('pager' => $pager)) ?]
                        </div>
                    [?php endif; ?]
                </th>
            </tr>
        </tfoot>
        <tbody>
            [?php foreach ($pager->getResults() as $i => $<?php echo $this->getSingularName() ?>): ?]
                <tr>
                    <?php if ($this->configuration->getValue('list.batch_actions')): ?>
                        [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
                    <?php endif; ?>
                    [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
                    <?php if ($this->configuration->getValue('list.object_actions')): ?>
                        [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper)) ?]
                    <?php endif; ?>
                </tr>
            [?php endforeach; ?]
        </tbody>
    </table>
</div>

<?php if ($this->configuration->getValue('list.batch_actions')): ?>
<script type="text/javascript">
function checkAll()
{
    batch_ids = [];

    var checked = $('#sf_admin_list_batch_checkbox').is(':checked');

    $('input[type="checkbox"].sf_admin_batch_checkbox').each(function() {
        var ele = $(this);

        if (checked) {
            ele.prop('checked', true);

            batch_ids.push(ele.val());
        } else {
            ele.prop('checked', false);
        }
    });

    $.ajax({
        url:      '[?php echo url_for("<?php echo $this->getModuleName()?>/remoteBatchAll") ?]',
        data:     { 'checked': checked, 'ids': batch_ids },
        complete: function(XMLHttpRequest) {
            $('.chosen_datasets').replaceWith(XMLHttpRequest.responseText);
        }
    });
}

function checkOne(id)
{
    $.ajax({
        url:      '[?php echo url_for("<?php echo $this->getModuleName()?>/remoteBatchToggle") ?]',
        data:     'id=' + id,
        complete: function(XMLHttpRequest) {
            $('.chosen_datasets').replaceWith(XMLHttpRequest.responseText);
        }
    });
}
</script>
<?php endif; ?>
[?php endif; ?]
