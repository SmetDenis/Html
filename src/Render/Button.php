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

namespace JBZoo\Html\Render;

use JBZoo\Html\ButtonAbstract;

/**
 * Class Button
 *
 * @package JBZoo\Html\Render
 */
class Button extends ButtonAbstract
{

    /**
     * Crete button.
     *
     * @param string $name
     * @param string $content
     * @param array $attrs
     * @param string $type
     * @return string
     */
    public function render($name = '', $content = '', array $attrs = array(), $type = 'submit')
    {
        $attrs += array('text' => null, 'name' => $name);

        $attrs = $this->_getBtnClasses($attrs);
        $attrs['type'] = $type;

        if (isset($attrs['icon'])) {
            $content = '<i class="' . $this->_icon . '-' . $attrs['icon'] . '"></i> ' . $this->_translate($content);
            unset($attrs['icon']);
        }

        return '<button ' . $this->buildAttrs($attrs) . '>' . $content . '</button>';
    }
}
