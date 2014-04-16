<ul class="pagination pagination-sm">
    [?php if ($pager->getPage() == $pager->getFirstPage()): ?]
        <li class="disabled">
            <span><i class="fa fa-angle-double-left"></i></span>
        </li>
        <li class="disabled">
            <span><i class="fa fa-angle-left"></i></span>
        </li>
    [?php else: ?]
        <li>
            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1" title="[?php echo __('First page', array(), 'sf_admin'); ?]">
                <i class="fa fa-angle-double-left"></i>
            </a>
        </li>
        <li>
            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]" title="[?php echo __('Previous page', array(), 'sf_admin'); ?]">
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
    [?php endif; ?]

    [?php foreach ($pager->getLinks() as $page): ?]
        [?php if ($pager->getPage() == $page): ?]
            <li class="active">
                <span>[?php echo $page ?]</span>
            </li>
        [?php else: ?]
            <li>
                <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]" title="[?php echo __('Page %1%', array('%1%' => $page), 'sf_admin'); ?]">
                    [?php echo $page ?]
                </a>
            </li>
        [?php endif; ?]
    [?php endforeach; ?]

    [?php if ($pager->getPage() == $pager->getLastPage()): ?]
        <li class="disabled">
            <span><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="disabled">
            <span><i class="fa fa-angle-double-right"></i></span>
        </li>
    [?php else: ?]
        <li>
            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]" title="[?php echo __('Next page', array(), 'sf_admin'); ?]">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
        <li>
            <a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]" title="[?php echo __('Last page', array(), 'sf_admin'); ?]">
                <i class="fa fa-angle-double-right"></i>
            </a>
        </li>
    [?php endif; ?]
</ul>