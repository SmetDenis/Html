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

namespace JBZoo\Html\Renders;

use JBZoo\Utils\Str;
use JBZoo\Html\Exception;
use JBZoo\Html\Renders\Interfaces\InputInterface;

/**
 * Class Input
 *
 * @package JBZoo\Html\Renders
 */
class Input extends Render implements InputInterface
{

    /**
     * Allowed types of input.
     *
     * @var array
     */
    protected $_types = array(
        'button',
        'checkbox',
        'file',
        'hidden',
        'image',
        'password',
        'radio',
        'reset',
        'submit',
        'text',
    );

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
     * @param string $type
     * @param string $name
     * @param string $value
     * @param array|string $class
     * @param string $id
     * @param array $attributes
     * @return string
     * @throws Exception
     */
    public function render($type, $name, $value, $class = '', $id = '', array $attributes = array())
    {
        $type = Str::low($type);

        if (!in_array($type, $this->_types)) {
            throw new Exception(sprintf('Unknown input type "%s"', $type));
        }

        $attributes = $this->_setId($attributes, $id);
        $attributes = $this->_cleanAttributes($attributes);
        $attributes = $this->_mergeAttr($attributes, $this->_jbSrt('input-' . $type));

        if (!empty($class)) {
            $attributes = $this->_normalizeClassAttr($attributes, $class);
        }

        $attributes += array(
            'type'  => $type,
            'name'  => $name,
            'value' => $value
        );

        return '<input ' . $this->_parseAttributes($attributes) . ' />';
    }

    /**
     * Remove disallow attributes.
     *
     * @param array $attributes
     * @return array
     * @SuppressWarnings("unused")
     */
    protected function _cleanAttributes(array $attributes = array())
    {
        foreach ($attributes as $key => $val) {
            if (in_array($key, $this->_disallowAttr)) {
                unset($attributes[$key]);
            }
        }

        return $attributes;
    }
}
