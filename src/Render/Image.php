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

use JBZoo\Utils\FS;
use JBZoo\Utils\Url;

/**
 * Class Image
 *
 * @package JBZoo\Html\Render
 */
class Image extends Render
{

    /**
     * Create img tag.
     *
     * @param $src
     * @param string|array $class
     * @param string $id
     * @param array $attrs
     * @return string
     */
    public function render($src, $class = '', $id = '', array $attrs = array())
    {
        $attrs += array(
            'fullUrl' => true
        );

        $attrs['id']    = $id;
        $attrs['class'] = (is_array($class)) ? implode(' ', $class) : $class;

        $attrs  = $this->_mergeAttr($attrs, $this->_jbSrt('image'));
        $isFull = $attrs['fullUrl'];
        unset($attrs['fullUrl']);

        $src = FS::clean($src, '/');
        $attrs['src'] = ($isFull) ? Url::root() . '/' . $src : $src;

        return '<img ' . $this->buildAttrs($attrs) . ' />';
    }
}
