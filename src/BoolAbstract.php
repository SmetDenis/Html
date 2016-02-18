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
use JBZoo\Html\Render\Render;

/**
 * Class BoolAbstract
 *
 * @package JBZoo\Html
 */
abstract class BoolAbstract extends Render
{

    /**
     * Default bool type.
     *
     * @var string
     */
    protected $_type = 'radio';

    /**
     * Output content.
     *
     * @param string $name
     * @param array $attrs
     * @param int $checked
     * @param bool|true $isLblWrap
     * @return string
     */
    public function render($name, $checked = 0, array $attrs = array(), $isLblWrap = true)
    {
        $this->_type = Str::low($this->_type);
        if ($this->_type == 'radio') {
            $options = array(
                0 => $this->_translate('No'),
                1 => $this->_translate('Yes')
            );
            return Html::_('radio')->render($options, $name, $checked, $attrs, $isLblWrap);
        } elseif ($this->_type == 'checkbox') {
            $options = array(
                1 => $this->_translate('Yes')
            );
            return Html::_('checkbox')->render($options, $name, $checked, $attrs, $isLblWrap);
        }
    }
}
