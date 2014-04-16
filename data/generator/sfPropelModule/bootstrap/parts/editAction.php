    public function executeEdit(sfWebRequest $request)
    {
        if ($this->getUser()->hasFlash('selected_form_tab')) {
            $request->setParameter('selected_form_tab', $this->getUser()->getFlash('selected_form_tab'));
        }

        $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();

        sfContext::getInstance()->getConfiguration()->loadHelpers('I18N');
        $<?php echo $this->getSingularName() ?> = $this-><?php echo $this->getSingularName() ?>;
        $this->getResponse()->setTitle(<?php echo $this->getI18NString('edit.title') ?>);

        $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
        <?php echo isset($this->params['disable_form_customization']) && $this->params['disable_form_customization'] ? '' : $this->getFormCustomization('edit'); ?>
    }
