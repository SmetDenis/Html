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
 * Class TextAreaTest
 *
 * @package JBZoo\PHPUnit
 */
class TextAreaTest extends PHPUnit
{

    /**
     * Test tag render.
     *
     * @return void
     */
    public function testRender()
    {
        $Html = Html::getInstance();
        $textarea = $Html->_('textarea');

        $expected = $textarea->render('test', 'simple content');
        isSame($expected, '<textarea name="test">simple content</textarea>');

        $expected = $textarea->render('test', 'simple content', 'my-class');
        isSame($expected, '<textarea name="test" class="my-class">simple content</textarea>');

        $expected = $textarea->render('test', 'simple content', 'my-class', 'my-id');
        isSame($expected, '<textarea name="test" id="my-id" class="my-class">simple content</textarea>');

        $expected = $textarea->render('test', 'simple content', 'my-class', 'my-id', array(
            'id' => 'new-id',
            'class' => 'new-class',
        ));
        isSame($expected, '<textarea id="my-id" name="test" class="my-class">simple content</textarea>');

        $expected = $textarea->render('test', 'simple content', 'my-class', 'my-id', array(
            'title' => 'text title',
            'style' => 'color: red;',
        ));
        isSame($expected, '<textarea title="text title" style="color: red;" name="test" id="my-id" class="my-class">simple content</textarea>');
    }
}
