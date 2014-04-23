<?php
class sfWidgetFormBootstrap3SelectCheckbox extends sfWidgetFormChoiceBase
{
    /**
     * Constructor.
     *
     * Available options:
     *
     *  * choices:         An array of possible choices (required)
     *  * label_separator: The separator to use between the input checkbox and the label
     *  * class:           The class to use for the main <ul> tag
     *  * separator:       The separator to use between each input checkbox
     *  * formatter:       A callable to call to format the checkbox choices
     *                     The formatter callable receives the widget and the array of inputs as arguments
     *  * template:        The template to use when grouping option in groups (%group% %options%)
     *
     * @param array $options     An array of options
     * @param array $attributes  An array of default HTML attributes
     *
     * @see sfWidgetFormChoiceBase
     */
    protected function configure($options = array(), $attributes = array())
    {
        parent::configure($options, $attributes);

        $this->addOption('label_class', 'checkbox-inline');
        $this->addOption('label_separator', '&nbsp;');
        $this->addOption('formatter', array($this, 'formatter'));
        $this->addOption('template', '%group% %options%');
    }

    /**
     * Renders the widget.
     *
     * @param  string $name        The element name
     * @param  string $value       The value selected in this widget
     * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
     * @param  array  $errors      An array of errors for the field
     *
     * @return string An HTML tag string
     *
     * @see sfWidgetForm
     */
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        if ('[]' != substr($name, -2)) {
            $name .= '[]';
        }

        if (null === $value) {
            $value = array();
        }

        $choices = $this->getChoices();

        // with groups?
        if (count($choices) && is_array(current($choices))) {
            $parts = array();

            foreach ($choices as $key => $option) {
                $parts[] = strtr($this->getOption('template'), array('%group%' => '<p class="input-inline"><strong>' . $key . '</strong><br />', '%options%' => $this->formatChoices($name, $value, $option, $attributes) . '</p>'));
            }

            return implode("\n", $parts);
        } else {
            return $this->formatChoices($name, $value, $choices, $attributes);
        }
    }

    protected function formatChoices($name, $value, $choices, $attributes)
    {
        $items = array();

        foreach ($choices as $key => $option) {
            $baseAttributes = array(
                'name'  => substr($name, 0, -2),
                'type'  => 'checkbox',
                'value' => self::escapeOnce($key),
                'id'    => $id = $this->generateId($name, self::escapeOnce($key)),
            );

            if ((is_array($value) && in_array(strval($key), $value)) || (is_string($value) && strval($key) == strval($value))) {
                $baseAttributes['checked'] = 'checked';
            }

            $items[$id] = $this->renderContentTag('label', $this->renderTag('input', array_merge($baseAttributes, $attributes)) . $this->getOption('label_separator') . self::escapeOnce($option), array('class' => $this->getOption('label_class')));
        }

        return call_user_func($this->getOption('formatter'), $this, $items);
    }

    public function formatter($widget, $items)
    {
        return !$items ? '' : implode('', $items);
    }
}
