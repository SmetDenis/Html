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
 */

namespace JBZoo\Html\Renders;

use JBZoo\Utils\Str;
use JBZoo\Html\Exception;

/**
 * Class Render
 *
 * @package JBZoo\Html\Utils
 */
class Render
{

    /**
     * Render template.
     *
     * @var string
     */
    protected $_tpl;

    /**
     * Render pattern.
     *
     * @var array
     */
    protected $_pattern = array();

    /**
     * Element constructor.
     */
    public function __construct()
    {
        $this->_setPattern();
    }

    /**
     * Setup render patter.
     *
     * @return void
     */
    protected function _setPattern()
    {
        preg_match_all('#\{\{([\w\d\._]+)\}\}#', $this->_tpl, $matches);
        $this->_pattern = array(
            'pattern'    => str_replace($matches[0], '%s', $this->_tpl),
            'attributes' => $matches[1],
        );
    }

    /**
     * Format output template.
     *
     * @param array $data
     * @return string
     * @throws Exception
     */
    protected function _format(array $data)
    {
        if (empty($this->_tpl)) {
            throw new Exception('Please, setup render template.');
        }

        $replace    = array();
        $template   = $this->_pattern['pattern'];
        $attributes = $this->_pattern['attributes'];

        foreach ($attributes as $attr) {
            $replacement = isset($data[$attr]) ? $data[$attr] : null;

            if (is_array($replacement)) {
                $replacement = implode('', $replacement);
            }

            $replace[] = $replacement;
        }

        return vsprintf($template, $replace);
    }

    /**
     * @param $string
     * @return string
     */
    protected function _jbSrt($string)
    {
        return 'jb-' . Str::clean($string);
    }

    /**
     * @param array $attrs
     * @return string
     */
    protected function _formatAttributes(array $attrs = array())
    {
        $result = ' ';

        if (!empty($attrs)) {
            ksort($attrs);
            foreach ($attrs as $key => $param) {
                $param = (array)$param;
                $value = implode(' ', $param);
                $value = Str::clean($value);
                $result .= ' ' . $key . '="' . $value . '"';
            }
        }

        return Str::trim($result);
    }
}
