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

use JBZoo\Html\Exception;

/**
 * Class TextArea
 *
 * @package JBZoo\Html\Render
 */
class TextArea extends Tag
{

    /**
     * Setup texarea tag.
     *
     * @var string
     */
    protected $_tag = 'textarea';

    /**
     * Reload setup tag method.
     *
     * Create hardcore textarea html element.
     *
     * @param string $tag
     * @return $this
     * @throws Exception
     */
    public function set($tag = 'textarea')
    {
        if ($this->_tag !== $tag) {
            throw new Exception('The tag can not be set');
        }

        return $this;
    }
}