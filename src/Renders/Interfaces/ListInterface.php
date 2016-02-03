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
 */

namespace JBZoo\Html\Renders\Interfaces;

/**
 * Interface ListInterface
 *
 * @package JBZoo\Html\Renders\Interfaces
 */
interface ListInterface
{

    /**
     * Render output content.
     *
     * @param $name
     * @param $value
     * @param string|array|null $class
     * @param string|null $id
     * @param array $params
     * @return mixed
     */
    public function render($name, $value, $class, $id, array $params);
}
