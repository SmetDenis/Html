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

use JBZoo\Html\BoolAbstract;

/**
 * Class Checkbool
 *
 * @package JBZoo\Html\Render
 */
class Checkbool extends BoolAbstract
{

    /**
     * Setup input type.
     *
     * @var string
     */
    protected $_type = 'checkbox';
}
