<td class="text-right">
    <div class="hidden-xs hidden-sm">
        <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
            <?php if ('_delete' == $name): ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToListDelete($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]', $params); ?>
            <?php elseif ('_edit' == $name): ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]', $params); ?>
            <?php elseif ('_move_up' == $name): ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveUp($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]', $params); ?>
            <?php elseif ('_move_down' == $name): ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveDown($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]', $params); ?>
            <?php else: ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToListAction($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]', $params); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="hidden-md hidden-lg">
        <div class="dropdown navbar-right">
            <a class="btn btn-default btn-xs" data-toggle="dropdown">
                [?php echo __('Actions', array(), 'sf_admin') ?] <span class="caret"></span>
            </a>
            <ul class="dropdown-menu text-left" role="menu">
                <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
                    <?php $params['for_dropdown'] = true; ?>

                    <?php if ('_delete' == $name): ?>
                        <?php echo $this->addCredentialCondition('<li>[?php echo $helper->linkToListDelete($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]</li>', $params); ?>
                    <?php elseif ('_edit' == $name): ?>
                        <?php echo $this->addCredentialCondition('<li>[?php echo $helper->linkToEdit($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]</li>', $params); ?>
                    <?php elseif ('_move_up' == $name): ?>
                        <?php echo $this->addCredentialCondition('<li>[?php echo $helper->linkToMoveUp($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]</li>', $params); ?>
                    <?php elseif ('_move_down' == $name): ?>
                        <?php echo $this->addCredentialCondition('<li>[?php echo $helper->linkToMoveDown($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]</li>', $params); ?>
                    <?php else: ?>
                        <?php echo $this->addCredentialCondition('<li>[?php echo $helper->linkToListAction($'.$this->getSingularName() . ', ' . $this->asPhp($params) . '); ?]</li>', $params); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</td>

<?php /*
<td class="xtext-right">
    <div class="hidden-xs hidden-sm">
        <?php echo $helper->linkToEdit($article, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
        <?php echo $helper->linkToListDelete($article, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    </div>
    <div class="xhidden-md xhidden-lg">
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                Actions <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Dropdown link</a></li>
                <li><a href="#">Dropdown link</a></li>
            </ul>
        </div>
    </div>
</td>
*/; ?>