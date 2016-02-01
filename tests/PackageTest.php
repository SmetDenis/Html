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

namespace JBZoo\PHPUnit;

use JBZoo\Html\Package;
use JBZoo\Html\Exception;

/**
 * Class PackageTest
 * @package JBZoo\PHPUnit
 */
class PackageTest extends PHPUnit
{

    public function testShouldDoSomeStreetMagic()
    {
        $obj = new Package();

        is('street magic', $obj->doSomeStreetMagic());
    }

    /**
     * @expectedException \JBZoo\Html\Exception
     */
    public function testShouldShowException()
    {
        throw new Exception('Test message');
    }
}
