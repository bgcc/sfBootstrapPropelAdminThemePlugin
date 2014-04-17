<?php
/**
 * sfWidgetFormBootstrap3SelectRadio represents radio HTML tags.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormSelectRadio.class.php 30762 2010-08-25 12:33:33Z fabien $
 */
class sfWidgetFormBootstrap3SelectRadio extends sfWidgetFormChoiceBase
{
    /**
     * Constructor.
     *
     * Available options:
     *
     *  * choices:         An array of possible choices (required)
     *  * label_separator: The separator to use between the input radio and the label
     *  * separator:       The separator to use between each input radio
     *  * class:           The class to use for the main <ul> tag
     *  * formatter:       A callable to call to format the radio choices
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

        $this->addOption('label_class', 'radio-inline');
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

        $choices = $this->getChoices();

        // with groups?
        if (count($choices) && is_array(next($choices))) {
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
                'type'  => 'radio',
                'value' => self::escapeOnce($key),
                'id'    => $id = $this->generateId($name, self::escapeOnce($key)),
            );

            if (strval($key) == strval($value === false ? 0 : $value)) {
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
