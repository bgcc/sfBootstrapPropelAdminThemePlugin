    public function executeShow(sfWebRequest $request)
    {
        $this->setTemplate('edit');

        return $this->executeEdit($request);
    }
