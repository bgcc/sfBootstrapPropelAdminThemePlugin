    public function executeIndex(sfWebRequest $request)
    {
        // filtering
        if ($request->getParameter('filters')) {
            $this->setFilters($request->getParameter('filters'));
        }

        // max per page
        if ($request->getParameter('max_per_page')) {
            $this->setMaxPerPage($request->getParameter('max_per_page'));
        }

        // sorting
        if ($request->getParameter('sort')) {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        sfContext::getInstance()->getConfiguration()->loadHelpers('I18N');
        $this->getResponse()->setTitle( <?php echo $this->getI18NString('list.title') ?>);
    }
