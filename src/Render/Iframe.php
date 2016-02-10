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
use JBZoo\Utils\Str;

/**
 * Class Iframe
 *
 * @package JBZoo\Html\Render
 */
class Iframe extends Tag
{

    /**
     * Setup render tag.
     *
     * @var string
     */
    protected $_tag = 'iframe';

    /**
     * Deny access.
     *
     * @param string $content
     * @param array|string $class
     * @param string $id
     * @param array $attrs
     * @throws Exception
     * @return void
     */
    public function render($content = '', $class = '', $id = '', array $attrs = array())
    {
        throw new Exception('Method render is not available');
    }

    /**
     * Create iframe.
     *
     * @param $src
     * @param string $class
     * @param string $id
     * @param array $attrs
     * @return string
     */
    public function create($src, $class = '', $id = '', array $attrs = array())
    {
        $attrs['src'] = Str::trim($src);
        return parent::render(null, $class, $id, $attrs);
    }
}
