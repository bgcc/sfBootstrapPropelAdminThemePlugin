    protected function getPager()
    {
        $query = $this->buildQuery();
        $paginateMethod = $this->configuration->getPaginateMethod();
        $pager = $query->$paginateMethod($this->getPage(), $this->getMaxPerPage());

        return $pager;
    }

    protected function setPage($page)
    {
        $this->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.page', $page, 'admin_module');
    }

    protected function getPage()
    {
        return $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.page', 1, 'admin_module');
    }

    protected function buildQuery()
    {
        <?php if ($this->configuration->hasFilterForm()): ?>
        if (null === $this->filters) {
            $this->filters = $this->configuration->getFilterForm($this->getFilters());
            <?php echo isset($this->params['disable_form_customization']) && $this->params['disable_form_customization'] ? '' : $this->getFormCustomization('filter', 'filters') ?>
        }

        $query = $this->filters->buildCriteria($this->getFilters());
        <?php else: ?>
        $query = PropelQuery::from('<?php echo $this->getModelClass() ?>');
        <?php endif; ?>

        foreach ($this->configuration->getWiths() as $with) {
            $query->joinWith($with);
        }

        foreach ($this->configuration->getQueryMethods() as $methodName => $methodParams) {
            if (is_array($methodParams)) {
                $query = call_user_func_array(array($query, $methodName), $methodParams);
            } else {
                $query = $query->$methodParams();
            }
        }

        $this->processSort($query);

        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $query);
        $query = $event->getReturnValue();

        <?php if ($this->configuration->hasFilterForm()): ?>
        $f = $this->getFilters();
        $query->_if(isset($f['with_chosen_datasets']) && $f['with_chosen_datasets'] == true)
            ->filterBy($query->getPrimaryKeyPhpName(), $this->helper->getBatchIds(), Criteria::IN)
        ->_endif();
        <?php endif; ?>

        return $query;
    }

    protected function getMaxPerPage()
    {
        return $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.max_per_page', $this->configuration->getPagerMaxPerPage(), 'admin_module');
    }

    protected function setMaxPerPage($max_per_page)
    {
        return $this->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.max_per_page', $max_per_page, 'admin_module');
    }

    public function executeNext(sfWebRequest $request)
    {
        $this->forward404Unless($obj = $this->getRoute()->getObject());

        $q = $this->buildQuery();
        $rs = $q->select($q->getPrimaryKeyPhpName())->find();
        $pos = $rs->search((string) $obj->getPrimaryKey());
        $this->forward404Unless($pos !== false);

        try {
            if ($request->hasParameter('selected_form_tab')) {
                $this->getUser()->setFlash('selected_form_tab', $request->getParameter('selected_form_tab', 0));
            }

            $this->redirect('@<?php echo $this->getUrlForAction('edit') ?>?id='.$rs->get($pos+1));
        } catch(PropelException $e) {
            $this->redirect('@<?php echo $this->getUrlForAction('new') ?>');
        }
    }

    public function executePrevious(sfWebRequest $request)
    {
        $this->forward404Unless($obj = $this->getRoute()->getObject());

        $q = $this->buildQuery();
        $rs = $q->select($q->getPrimaryKeyPhpName())->find();
        $pos = $rs->search((string) $obj->getPrimaryKey());
        $this->forward404Unless($pos !== false);

        try {
            if($request->hasParameter('selected_form_tab')) {
                $this->getUser()->setFlash('selected_form_tab', $request->getParameter('selected_form_tab', 0));
            }

            $this->redirect('@<?php echo $this->getUrlForAction('edit') ?>?id='.$rs->get($pos-1));
        } catch(PropelException $e) {
            $this->getUser()->setFlash('error', 'You are already at the first object');

            $this->redirect('@<?php echo $this->getUrlForAction('edit') ?>?id='.$obj->getId());
        }
    }
