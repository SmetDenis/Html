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

namespace JBZoo\Html;

use JBZoo\Html\Render\Render;

/**
 * Class TagAbstract
 *
 * @package JBZoo\Html
 */
abstract class TagAbstract extends Render
{

    /**
     * Renderer tag.
     *
     * @var string
     */
    protected $_tag = 'p';

    /**
     * Output content.
     *
     * @param string $content
     * @param string $class
     * @param string $id
     * @param array $attrs
     * @return mixed
     */
    abstract public function render($content, $class = '', $id = '', array $attrs = array());
}
