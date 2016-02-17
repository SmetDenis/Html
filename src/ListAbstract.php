<?php
/**
 * JBZoo Html
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package   Html
 * @license   MIT
 * @copyright Copyright (C) JBZoo.com,  All rights reserved.
 * @link      https://github.com/JBZoo/Html
 * @author    Sergey Kalistratov <kalistratov.s.m@gmail.com>
 */

namespace JBZoo\Html;

use JBZoo\Utils\Str;
use JBZoo\Utils\Slug;
use JBZoo\Html\Render\Render;

/**
 * Class ListAbstract
 *
 * @package JBZoo\Html
 */
abstract class ListAbstract extends Render
{

    const TPL_WRAP = 'wrap';
    const TPL_DEFAULT = 'default';

    /**
     * Default list type.
     *
     * @var string
     */
    protected $_type = 'checkbox';

    /**
     * Default single element template.
     *
     * @var string
     */
    protected $_tpl = 'default';

    /**
     * Generates an HTML checkbox/radio list.
     *
     * @param array $options
     * @param $name
     * @param array $selected
     * @param string|array $attrs
     * @param bool $tpl
     * @return string
     */
    public function render(array $options, $name, $selected = array(), array $attrs = array(), $tpl = false)
    {
        $output = array();
        $this->_setTpl($tpl);

        $id = Str::unique($this->_type . '-');
        foreach ($options as $value => $label) {
            $label = trim($label);
            $value = $this->_cleanValue($value);
            $text  = $this->_translate($label);
            $attrs = $this->_checkedOptions($value, $selected, $attrs);

            $output[] = $this->_elementTpl($name, $value, $id, $text, $attrs);
        }

        return implode(PHP_EOL, $output);
    }

    /**
     * Create input.
     *
     * @param string $name
     * @param string $value
     * @param string $id
     * @param string $class
     * @param array $attrs
     * @return string
     */
    public function input($name, $value = '', $id = '', $class = '', array $attrs = array())
    {
        return '<input id="' . $id . '" class="' . $class . '" type="' . $this->_type . '" name="' . $name . '"
                          value="' . $value . '" ' . $this->buildAttrs($attrs) . '/>';
    }

    /**
     * Single element template output.
     *
     * @param string $name
     * @param string $value
     * @param string $id
     * @param string $text
     * @param array $attrs
     * @return mixed|null|string
     */
    protected function _elementTpl($name, $value = '', $id = '', $text = '', array $attrs = array())
    {
        $alias    = Str::slug($value, true);
        $inpClass = $this->_jbSrt('val-' . $alias);
        $input    = $this->input($name, $value, $id, $inpClass, $attrs);

        if ($this->_tpl == 'default') {
            return $input . $this->label($id, $alias, $text);
        } elseif ($this->_tpl == 'wrap') {
            return $this->label($id, $alias, $input . $text);
        }

        if (is_callable($this->_tpl)) {
            return call_user_func($this->_tpl, $this, $name, $value, $id, $text, $attrs);
        }

        return null;
    }

    /**
     * Checked options.
     *
     * @param string $value
     * @param string|array $selected
     * @param array $attrs
     * @return array
     */
    protected function _checkedOptions($value, $selected, array $attrs)
    {
        $attrs['checked'] = false;
        if (is_array($selected)) {
            foreach ($selected as $val) {
                if ($value == $val) {
                    $attrs['checked'] = 'checked';
                    break;
                }
            }
        } else {
            if ($value == $selected) {
                $attrs['checked'] = 'checked';
            }
        }

        return $attrs;
    }

    /**
     * Create label tag.
     *
     * @param string $id
     * @param string $valAlias
     * @param string $content
     * @return string
     */
    public function label($id, $valAlias, $content = '')
    {
        $class = implode(' ', array(
            $this->_jbSrt($this->_type . '-lbl'),
            $this->_jbSrt('label-' . $valAlias),
        ));

        return '<label for="' . $id . '" class="' . $class . '">' . $content . '</label>';
    }

    /**
     * Setup template.
     *
     * @param $tpl
     * @return void
     */
    protected function _setTpl($tpl)
    {
        $this->_tpl = $tpl;

        if ($tpl === true) {
            $this->_tpl = self::TPL_WRAP;
        }

        if ($tpl === false) {
            $this->_tpl = self::TPL_DEFAULT;
        }
    }
}
