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

use JBZoo\Utils\Arr;
use JBZoo\Html\TagAbstract;

/**
 * Class Tag
 *
 * @package JBZoo\Html\Render
 */
class Tag extends TagAbstract
{

    /**
     * Disallow attributes.
     *
     * @var array
     */
    protected $_disallowAttr = array(
        'class',
    );

    /**
     * Create html tag.
     *
     * @param string $content
     * @param array|string $class
     * @param string $id
     * @param array $attrs
     * @return string
     */
    public function render($content, $class = '', $id = '', array $attrs = array())
    {
        $attrs = $this->_setId($attrs, $id);
        $attrs = $this->_cleanAttrs($attrs);

        if (!empty($class)) {
            $attrs = $this->_normalizeClassAttr($attrs, $class);
        }

        $tag = $this->_tag;
        if (Arr::key('tag', $attrs)) {
            $tag = $attrs['tag'];
            unset($attrs['tag']);
        }

        $format = (!empty($attrs)) ? '<%s %s>%s</%s>' : '<%s%s>%s</%s>';
        $output = sprintf($format, $tag, $this->buildAttrs($attrs), $content, $tag);

        return $output;
    }
}
