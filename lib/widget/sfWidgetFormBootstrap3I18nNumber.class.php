<?php
class sfWidgetFormBootstrap3I18nNumber extends sfWidgetFormInput
{
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);

        $this->addOption('culture', $this->_current_language());
        $this->addOption('prepend');
        $this->addOption('append');
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        if (is_numeric($value) && !is_null($value)) {
            $numberFormat = new sfNumberFormat($this->getOption('culture'));
            $value = $numberFormat->format($value);
        }

        $input = parent::render($name, $value, $attributes, $errors);

        $prepend = '';
        $append = '';

        if ($this->getOption('prepend')) {
            $prepend = '<span class="input-group-addon">' . $this->getOption('prepend') . '</span>';
        }

        if ($this->getOption('append')) {
            $append = '<span class="input-group-addon">' . $this->getOption('append') . '</span>';
        }

        $html =  '<div class="input-group">';
        $html .=     $prepend;
        $html .=     $input;
        $html .=     $append;
        $html .= '</div>';

        return $html;
    }
    
    function _current_language()
    {
        try {
            return sfContext::getInstance()->getUser()->getCulture();
        } catch (Exception $e) {
            return sfCultureInfo::getInstance()->getName();
        }
    }
}
