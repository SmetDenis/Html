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

        foreach ($options as $value => $label) {
            $label = Str::clean($label);
            $value = $this->_cleanValue($value, false);
            $alias = Slug::filter($value, '-');
            $text  = $this->_translate($label);
            $id    = Str::unique($this->_type . '-');

            $inpAttrs = array(
                'id'    => $id,
                'name'  => $name,
                'type'  => $this->_type,
                'value' => $value,
                'class' => $this->_jbSrt('val-' . $alias),
            );

            $inpAttrs = array_merge($inpAttrs, $attrs);
            $inpAttrs = $this->_checkedOptions($value, $selected, $inpAttrs);

            $lblAttrs = array(
                'for' => $id,
                'class' => array(
                    $this->_jbSrt($this->_type . '-lbl'),
                    $this->_jbSrt('label-' . $alias),
                ),
            );

            $output[] = $this->_elementTpl($inpAttrs, $lblAttrs, $text);
        }

        return implode(PHP_EOL, $output);
    }

    /**
     * Single element template output.
     *
     * @param array $inpAttrs
     * @param array $lblAttrs
     * @param string $text
     * @return null|string
     */
    protected function _elementTpl(array $inpAttrs, array $lblAttrs, $text)
    {
        $input = '<input ' . $this->buildAttrs($inpAttrs) . ' />';

        if (is_callable($this->_tpl)) {
            return call_user_func($this->_tpl, $this, $inpAttrs, $lblAttrs, $text);
        }

        if ($this->_tpl == 'default') {
            return implode(PHP_EOL, array($input, $this->_label($lblAttrs, $text)));
        } elseif ($this->_tpl == 'wrap') {
            return $this->_label($lblAttrs, $input . $text);
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
        if (is_array($selected)) {
            foreach ($selected as $val) {
                if ($value == $val) {
                    $attrs['checked'] = 'checked';
                    $attrs = $this->_mergeAttr($attrs, $this->_jbSrt('checked'));
                    break;
                }
            }
        } else {
            if ($value == $selected) {
                $attrs['checked'] = 'checked';
                $attrs = $this->_mergeAttr($attrs, $this->_jbSrt('checked'));
            }
        }

        return $attrs;
    }

    /**
     * Create label tag.
     *
     * @param array $attrs
     * @param string $content
     * @return string
     */
    protected function _label(array $attrs, $content = '')
    {
        return '<label ' . $this->buildAttrs($attrs) . '>' . $content . '</label>';
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
