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

use JBZoo\Html\Html;
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
     * @param array $inpAttrs
     * @param array $lblAttrs
     * @param string $text
     * @return string
     */
    protected function _elementTpl(array $inpAttrs, array $lblAttrs, $text)
    {
        $input = '<input ' . $this->buildAttrs($inpAttrs) . '>';
        $html  = '<label ' . $this->buildAttrs($lblAttrs) . '>' . $input . $text . '</label>';

        return '<div class="jb-input jb-checkbox">' . $html . '</div>';
    }
}