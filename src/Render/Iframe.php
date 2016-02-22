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

use JBZoo\Html\Html;
use JBZoo\Utils\Str;

/**
 * Class Iframe
 *
 * @package JBZoo\Html\Render
 */
class Iframe extends Render
{

    /**
     * Disallow attributes.
     *
     * @var array
     */
    protected $_disallowAttr = array(
        'class', 'id',
    );

    /**
     * Create iframe.
     *
     * @param string $src
     * @param string $class
     * @param string $id
     * @param array $attrs
     * @return string
     */
    public function render($src, $class = '', $id = '', array $attrs = array())
    {
        $attrs = array_merge(array(
            'frameborder' => 0,
            'content'     => null,
            'tag'         => 'iframe',
            'src'         => Str::trim($src)
        ), $attrs);

        $attrs   = $this->_cleanAttrs($attrs);
        $content = $attrs['content'];
        unset($attrs['content']);

        return Html::_('tag')->render($content, Str::trim($class), Str::trim($id), $attrs);
    }
}
