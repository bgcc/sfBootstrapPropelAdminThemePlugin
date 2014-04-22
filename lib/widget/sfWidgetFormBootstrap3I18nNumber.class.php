<?php
class sfWidgetFormBootstrap3I18nNumber extends sfWidgetFormI18nNumber
{
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure();

        $this->addOption('prepend');
        $this->addOption('append');
    }

    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
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
}
