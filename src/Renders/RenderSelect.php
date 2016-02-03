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

namespace JBZoo\Html\Renders;

use JBZoo\Html\Renders\Interfaces\ListInterface;

/**
 * Class RenderSelect
 *
 * @package JBZoo\Html\Renders
 */
class RenderSelect extends Render implements ListInterface
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
     * @SuppressWarnings("unused")
     */
    public function render($name, $value, $class = null, $id = null, array $params = array())
    {
        return 'Select render';
    }
}
