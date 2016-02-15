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

/**
 * Class TextArea
 *
 * @package JBZoo\Html\Render
 */
class Textarea extends Render
{

    /**
     * Setup textarea tag.
     *
     * @var string
     */
    protected $_tag = 'textarea';

    /**
     * @param $name
     * @param string $content
     * @param string $class
     * @param string $id
     * @param array $attrs
     * @return string
     */
    public function render($name, $content = '', $class = '', $id = '', array $attrs = array())
    {
        $attrs['name'] = $name;
        $attrs['tag']  = 'textarea';

        return Html::_('tag')->render($content, $class, $id, $attrs);
    }
}
