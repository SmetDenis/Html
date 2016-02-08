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

use JBZoo\Html\Exception;
use JBZoo\Html\InputAbstract;

/**
 * Class Input
 *
 * @package JBZoo\Html\Render
 */
class Input extends InputAbstract
{

    /**
     * Input type.
     *
     * @var string
     */
    protected $_type = 'text';

    /**
     * Disallow attributes.
     *
     * @var array
     */
    protected $_disallowAttr = array(
        'type', 'name', 'value', 'class'
    );

    /**
     * Output content.
     *
     * @param string $name
     * @param string $value
     * @param array|string $class
     * @param string $id
     * @param array $attrs
     * @return string
     * @throws Exception
     */
    public function render($name, $value, $class = '', $id = '', array $attrs = array())
    {
        $attrs = $this->_setId($attrs, $id);
        $attrs = $this->_cleanAttrs($attrs);
        $attrs = $this->_mergeAttr($attrs, $this->_jbSrt('input-text'));

        if (!empty($class)) {
            $attrs = $this->_normalizeClassAttr($attrs, $class);
        }

        $attrs += array(
            'name'  => $name,
            'value' => $value,
            'type'  => $this->_type
        );

        return '<input ' . $this->_buildAttrs($attrs) . ' />';
    }
}
