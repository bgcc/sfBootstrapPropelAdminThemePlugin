    public function executeCreate(sfWebRequest $request)
    {
        $this->form = $this->configuration->getForm();
        <?php echo isset($this->params['disable_form_customization']) && $this->params['disable_form_customization'] ? '' : $this->getFormCustomization('new'); ?>
        $this-><?php echo $this->getSingularName() ?> = $this->form->getObject();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }
