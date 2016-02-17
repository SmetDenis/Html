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

namespace Custom\Html\Render;

use JBZoo\Utils\Str;
use JBZoo\Html\ListAbstract;

/**
 * Class Checkbox
 *
 * @package Custom\Html\Render
 */
class Checkbox extends ListAbstract
{
    /**
     * Setup template.
     *
     * @var string
     */
    protected $_tpl = 'custom';

    /**
     * Reload default template.
     *
     * @param string $name
     * @param string $value
     * @param string $id
     * @param string $text
     * @param array $attrs
     * @return string
     */
    protected function _elementTpl($name, $value = '', $id = '', $text = '', array $attrs = array())
    {
        $alias    = Str::slug($value, true);
        $inpClass = 'jb-val-' . $alias;
        $input    = $this->input($name, $value, $id, $inpClass, $attrs);
        $text     = '<span class="label-title">' . $text . '</span>';
        $html     = $this->label($id, $alias, $input . $text);

        return '<div class="jb-input jb-checkbox">' . $html . '</div>';
    }
}