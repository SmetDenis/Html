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

/**
 * Class Render
 *
 * @package JBZoo\Html\Render
 */
class Render
{

    /**
     * Disallow attributes.
     *
     * @var array
     */
    protected $_disallowAttr = array();

    /**
     * Build attributes.
     *
     * @param $attrs
     * @return string
     */
    public function buildAttrs(array $attrs = array())
    {
        $result = ' ';
        foreach ($attrs as $key => $param) {
            $param = (array) $param;
            if ($key == 'data') {
                $result .= $this->_buildDataAttrs($param);
                continue;
            }

            $value = implode(' ', $param);
            $value = $this->_cleanValue($value);

            if ($key !== 'data' && $attr = $this->_buildAttr($key, $value)) {
                $result .= $attr;
            }
        }

        return trim($result);
    }

    /**
     * Build attribute.
     *
     * @param string $key
     * @param string $val
     * @return null|string
     */
    protected function _buildAttr($key, $val)
    {
        $return = null;
        if (!empty($val) || $val == '0' || $key == 'value') {
            $return = ' ' . $key . '="' . $val . '"';
        }

        return $return;
    }

    /**
     * Build html data attributes.
     *
     * @param array $param
     * @return null|string
     */
    protected function _buildDataAttrs(array $param = array())
    {
        $return = '';
        foreach ($param as $data => $val) {
            $dKey = 'data-' . trim($data);

            if (is_object($val)) {
                $val = (array )$val;
            }

            if (is_array($val)) {
                $val = str_replace('"', '\'', json_encode($val));
                $return .= $this->_buildAttr($dKey, $val);
                continue;
            }

            $return .= $this->_buildAttr($dKey, $val);
        }

        return $return;
    }

    /**
     * Remove disallow attributes.
     *
     * @param array $attrs
     * @return array
     * @SuppressWarnings("unused")
     */
    protected function _cleanAttrs(array $attrs = array())
    {
        foreach ($attrs as $key => $val) {
            if (in_array($key, $this->_disallowAttr)) {
                unset($attrs[$key]);
            }
        }

        return $attrs;
    }

    /**
     * Clear attribute value
     *
     * @param $value
     * @param bool|false $trim
     * @return string
     */
    protected function _cleanValue($value, $trim = false)
    {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        return ($trim) ? trim($value) : $value;
    }

    /**
     * Get string by "jb" prefix.
     *
     * @param $string
     * @return string
     */
    protected function _jbSrt($string)
    {
        return 'jb-' . $string;
    }

    /**
     * Merge attributes by given key.
     *
     * @param array $attrs
     * @param null $val
     * @param string $key
     * @return array
     */
    protected function _mergeAttr(array $attrs = array(), $val = null, $key = 'class')
    {
        if (isset($attrs[$key])) {
            $attrs[$key] .= ' ' . $val;
        } else {
            $attrs[$key] = $val;
        }

        return $attrs;
    }

    /**
     * Normalize class attribute.
     *
     * @param array $attrs
     * @param array|string $class
     * @return array
     */
    protected function _normalizeClassAttr(array $attrs, $class = '')
    {
        if (is_array($class)) {
            $class = implode(' ', $class);
        }

        return $this->_mergeAttr($attrs, $class);
    }

    /**
     * Setup element id.
     *
     * @param array $attrs
     * @param string $id
     * @return array
     */
    protected function _setId(array $attrs, $id = '')
    {
        if (!empty($id)) {
            $attrs['id'] = $id;
        }

        return $attrs;
    }

    /**
     * @param string $text
     * @return mixed
     */
    protected function _translate($text)
    {
        return $text;
    }
}
