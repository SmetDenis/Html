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

use JBZoo\Html\ListAbstract;

/**
 * Class radio
 *
 * @package JBZoo\Html\Render
 */
class Radio extends ListAbstract
{

    /**
     * Setup radio type.
     *
     * @var string
     */
    protected $_type = 'radio';

    /**
     * Generates an HTML radio list.
     *
     * @param array $options
     * @param string $name
     * @param array $selected
     * @param array $attrs
     * @param bool|false $tpl
     * @return string
     */
    public function render(array $options, $name, $selected = array(), array $attrs = array(), $tpl = false)
    {
        if (is_array($selected)) {
            $selectedVal = isset($selected[count($selected) - 1]) ? $selected[count($selected) - 1] : null;
            list($options, $selected) = $this->_checkSelected($options, $selectedVal);
        }

        if (is_string($selected)) {
            list($options, $selected) = $this->_checkSelected($options, $selected);
        }

        return parent::render($options, $name, $selected, $attrs, $tpl);
    }

    /**
     * Check selected option in list.
     *
     * @param array $options
     * @param string $selectedVal
     * @return array
     */
    protected function _checkSelected(array $options, $selectedVal)
    {
        if (!empty($selectedVal) && !array_key_exists($selectedVal, $options)) {
            $selectedVal = 'no-exits';
            $options = array_merge(array('no-exits' => $this->_translate('No exits')), $options);
        }

        return array($options, $selectedVal);
    }
}
