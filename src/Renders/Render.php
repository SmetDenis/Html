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

/**
 * Class Render
 *
 * @package JBZoo\Html\Utils
 */
class Render
{

    /**
     * Clear attribute value
     *
     * @param string $value
     * @return string
     */
    protected function _cleanValue($value)
    {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        return trim($value);
    }

    /**
     * Get string by "jb" prefix.
     *
     * @param $string
     * @return string
     */
    protected function _jbSrt($string)
    {
        return 'jb-' . Str::clean($string);
    }

    /**
     * Merge attributes by given key.
     *
     * @param array $attributes
     * @param null $val
     * @param string $key
     * @return array
     */
    protected function _mergeAttr(array $attributes = [], $val = null, $key = 'class')
    {
        if (isset($attributes[$key]) && Str::trim($attributes[$key])) {
            $attributes[$key] .= ' ' . $val;
        } else {
            $attributes[$key] = $val;
        }

        return $attributes;
    }

    /**
     * Normalize class attribute.
     *
     * @param array $attributes
     * @param array|string $class
     * @return array
     */
    protected function _normalizeClassAttr(array $attributes, $class = '')
    {
        if (is_array($class)) {
            $class = implode(' ', $class);
        }

        return $this->_mergeAttr($attributes, $class);
    }

    /**
     * Array parse to attributes.
     *
     * @param $attributes
     * @return string
     */
    protected function _parseAttributes(array $attributes = array())
    {
        $result = ' ';

        foreach ($attributes as $key => $param) {
            $param = (array)$param;
            $value = implode(' ', $param);
            $value = $this->_cleanValue($value);

            if (!empty($value) || $value == '0' || $key == 'value') {
                $result .= ' ' . $key . '="' . $value . '"';
            }
        }

        return Str::trim($result);
    }

    /**
     * Setup element id.
     *
     * @param array $attributes
     * @param string $id
     * @return array
     */
    protected function _setId(array $attributes, $id = '')
    {
        if (!empty($id)) {
            $attributes['id'] = $id;
        }

        return $attributes;
    }
}
