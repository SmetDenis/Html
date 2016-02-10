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

namespace JBZoo\PHPUnit;

use JBZoo\Html\Html;

/**
 * Class IframeTest
 *
 * @package JBZoo\PHPUnit
 */
class IframeTest extends PHPUnit
{

    /**
     * Test tag create.
     *
     * @return void
     */
    public function testCreate()
    {
        $Html  = Html::getInstance();
        $frame = $Html->_('iframe');

        $actual = $frame->create('http://yandex.ru');
        isSame('<iframe src="http://yandex.ru"></iframe>', $actual);

        $actual = $frame->create('http://yandex.ru', 'my-class', 'my-id');
        isSame('<iframe src="http://yandex.ru" id="my-id" class="my-class"></iframe>', $actual);
    }

    /**
     * @expectedException \JBZoo\Html\Exception
     */
    public function testRender()
    {
        Html::getInstance()->_('iframe')->render();
    }
}
