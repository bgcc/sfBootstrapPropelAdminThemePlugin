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