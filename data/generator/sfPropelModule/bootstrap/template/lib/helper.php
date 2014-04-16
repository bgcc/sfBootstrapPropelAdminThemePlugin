[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
    public function getUrlForAction($action)
    {
        return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_' . $action;
    }

    public function linkToMoveUp($object, $params)
    {
        if ($object->isFirst()) {
            return '<a href="#" class="btn btn-default btn-xs disabled"><i class="fa fa-chevron-up"></i> ' . __($params['label'], array(), 'sf_admin') . '</a>';
        }

        if (empty($params['action'])) {
            $params['action'] = 'moveUp';
        }

        return link_to('<i class="fa fa-chevron-up"></i> ' . __($params['label'], array(), 'sf_admin'), '<?php echo $this->params['moduleName'] ?>/' . $params['action'] . '?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>, array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-default btn-xs'));
    }

    public function linkToMoveDown($object, $params)
    {
        if ($object->isLast()) {
            return '<a href="#" class="btn btn-default btn-xs disabled"><i class="fa fa-chevron-down"></i> ' . __($params['label'], array(), 'sf_admin') . '</a>';
        }

        if (empty($params['action'])) {
            $params['action'] = 'moveDown';
        }

        return link_to('<i class="fa fa-chevron-down"></i> ' . __($params['label'], array(), 'sf_admin'), '<?php echo $this->params['moduleName'] ?>/' . $params['action'] . '?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>, array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-default btn-xs'));
    }

    public function linkToNew($params)
    {
        return link_to('<i class="fa fa-plus"></i> <span class="hidden-xs hidden-sm">' . __($params['label'], array(), 'sf_admin') . '</span>', '@' . $this->getUrlForAction('new'), array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-success'));
    }

    public function linkToEdit($object, $params)
    {
        return link_to('<i class="fa fa-pencil"></i> ' . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object, array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-primary btn-xs'));
    }

    public function linkToSave($object, $params)
    {
        return '<button type="submit" class="btn btn-success" title="' . __($params['label'], array(), 'sf_admin') . '"><i class="fa fa-save"></i> <span class="hidden-xs hidden-sm">' . __($params['label'], array(), 'sf_admin') . '</span></button>';
    }

    public function linkToList($params)
    {
        return link_to('<i class="fa fa fa-align-justify"></i> <span class="hidden-xs hidden-sm">' . __($params['label'], array(), 'sf_admin') . '</span>', '@' . $this->getUrlForAction('list'), array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-primary'));
    }

    public function linkToSaveAndAdd($object, $params)
    {
        if (!$object->isNew()) {
            return '';
        }

        return '<button type="submit" class="btn btn-success" name="_save_and_add"><i class="fa fa-save"></i> ' . __($params['label'], array(), 'sf_admin') . '</button>';
    }

    public function linkToDelete($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        return link_to('<i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">' . __($params['label'], array(), 'sf_admin') . '</span>', $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-danger', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
    }

    public function linkToListDelete($object, $params)
    {
        if ($object->isNew()) {
            return '';
        }

        return link_to('<i class="fa fa-trash-o"></i> ' . __($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'title' => __($params['label'], array(), 'sf_admin'), 'class' => 'btn btn-danger btn-xs', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
    }

    public function linkToAction($params)
    {
        $action = '@<?php echo $this->params['route_prefix']; ?>_collection?action=' . (isset($params['action']) ?  $params['action'] : sfInflector::camelize($params['label']));

        $link_params = $params['params'];

        if (empty($link_params['class'])) {
            $link_params['class'] = 'btn btn-default';
        }

        return link_to(($link_params['icon_class'] ? '<i class="' . $link_params['icon_class'] . '"></i> ' : '') . '<span class="hidden-xs hidden-sm">' . __($params['label'], array(), 'sf_admin') . '</span>', $action, array('title' => __($params['label'], array(), 'sf_admin'), 'class' => $link_params['class']));
    }

    public function linkToPrevious($object, $params)
    {
        if (!$object->isNew()) {
            return link_to('<i class="fa fa-arrow-left"></i>', '@<?php echo $this->getUrlForAction('object') ?>?action=previous&id=' . $object->getPrimaryKey(), array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'previous_link btn btn-default'));
        }

        return '';
    }

    public function linkToNext($object, $params)
    {
        if (!$object->isNew()) {
            return link_to('<i class="fa fa-arrow-right"></i>', '@<?php echo $this->getUrlForAction('object') ?>?action=next&id=' . $object->getPrimaryKey(), array('title' => __($params['label'], array(), 'sf_admin'), 'class' => 'next_link btn btn-default'));
        }

        return '';
    }

    public function toggleBatchId($id)
    {
        if ($this->hasBatchId($id)) {
            $this->removeBatchId($id);
        } else {
            $this->addBatchId($id);
        }
    }

    public function removeBatchId($id)
    {
        $this->setBatchIds(array_filter($this->getBatchIds(), function ($element) use ($id) { return ($element != $id); }));
    }

    public function addBatchId($id)
    {
        if (!$this->hasBatchId($id)) {
            $ids = $this->getBatchIds();
            $ids[] = $id;
            $this->setBatchIds($ids);
        }
    }

    public function hasBatchId($id)
    {
        $ids = $this->getBatchIds();

        return in_array($id, $ids);
    }

    public function getBatchIds()
    {
        return sfContext::getInstance()->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.batch', array(), 'admin_module');
    }

    public function setBatchIds($ids = array())
    {
        return sfContext::getInstance()->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.batch', $ids, 'admin_module');
    }

    public function countBatchIds($ids = array())
    {
        return count($this->getBatchIds());
    }

    public function getMaxPerPage()
    {
        return sfContext::getInstance()->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.max_per_page', '', 'admin_module');
    }
}
