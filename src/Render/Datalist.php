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
 * Class Datalist
 *
 * @package JBZoo\Html\Render
 */
class Datalist extends Render
{

    /**
     * Create data list.
     *
     * @param array $data
     * @param array $attrs
     * @return string
     */
    public function render(array $data, array $attrs = array())
    {
        $output = array();
        $attrs  += array('class' => 'uk-description-list-horizontal');
        $attrs  = $this->_mergeAttr($attrs, $this->_jbSrt('data-list'));

        $output[] = '<dl ' . $this->buildAttrs($attrs) . '>';

        foreach ($data as $label => $text) {
            $label = $this->_translate($label);
            $output[] = '<dt title="' . $this->_cleanValue($label) . '">' . $label . '</dt>';
            $output[] = '<dd>' . $text . '</dd>';
        }

        $output[] = '</dl>';

        return implode('', $output);
    }
}
