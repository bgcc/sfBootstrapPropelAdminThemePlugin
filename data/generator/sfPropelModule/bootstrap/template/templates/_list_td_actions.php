<td class="text-right">
    <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
        <?php if ('_delete' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToListDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
        <?php elseif ('_edit' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
        <?php elseif ('_move_up' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveUp($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
        <?php elseif ('_move_down' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToMoveDown($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
        <?php else: ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToListAction($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>
        <?php endif; ?>
    <?php endforeach; ?>
</td>
