<?php
/**
 * JBZoo Html
 *
 * This file is part of tPerformanceTesthe JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package   Html
 * @license   MIT
 * @copyright Copyright (C) JBZoo.com,  All rights reserved.
 * @link      https://github.com/JBZoo/Html
 */

namespace JBZoo\PHPUnit;

/**
 * Class PerformanceTest
 * @package JBZoo\Html
 */
class PerformanceTest extends PHPUnit
{
    protected $_max = 1000000;

    public function testLeakMemoryCreate()
    {
        /*if ($this->isXDebug()) {
            return;
        }

        $this->startProfiler();

        for ($i = 0; $i < $this->_max; $i++) {
            // Your code start
            $obj = new Package();
            $obj->doSomeStreetMagic();
            unset($obj);
            // Your code finish
        }

        alert($this->loopProfiler($this->_max), 'Create - min');*/
    }
}
