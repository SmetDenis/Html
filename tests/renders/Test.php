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

namespace Custom\Html\Renders;

use JBZoo\Html\Renders\Render;
use JBZoo\Html\Renders\Interfaces\InputInterface;

/**
 * Class Test
 *
 * @package Custom\Html\Renders
 */
class Test extends Render implements InputInterface
{

    /**
     * Output content.
     *
     * @param string $name
     * @param string $type
     * @param string $value
     * @param array|string $class
     * @param string $id
     * @param array $params
     * @return mixed
     */
    public function render($type, $name, $value, $class = '', $id = '', array $params = array())
    {
        return 'Im test custom render';
    }
}
