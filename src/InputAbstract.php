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
 * Class InputAbstract
 *
 * @package JBZoo\Html
 */
abstract class InputAbstract extends Render
{

    /**
     * Output content.
     *
     * @param string $name
     * @param string $value
     * @param array|string $class
     * @param string $id
     * @param array $params
     * @return mixed
     */
    abstract public function render($name, $value, $class = '', $id = '', array $params = array());
}
