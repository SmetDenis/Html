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
 * Class ButtonTest
 *
 * @package JBZoo\PHPUnit
 */
class ButtonTest extends PHPUnit
{

    /**
     * Test tag render.
     *
     * @return void
     */
    public function testRender()
    {
        $Html   = Html::getInstance();
        $button = $Html->_('button');

        isSame('<button type="submit"></button>', $button->render());
        isSame('<button name="test" type="submit"></button>', $button->render('test'));
        isSame('<button name="test" type="submit"></button>', $button->render('test'));

        $actual = $button->render('test', array('text' => 'My button'));
        isSame('<button name="test" type="submit">My button</button>', $actual);

        $actual = $button->render('test', array('text' => 'Reset button'), 'reset');
        isSame('<button name="test" type="reset">Reset button</button>', $actual);

        $actual = $button->render('test', array('text' => 'My button', 'button' => 'success'));
        isSame('<button name="test" class="uk-button uk-button-success" type="submit">My button</button>', $actual);

        $actual = $button->render('test', array('text' => 'My button', 'button' => 'success', 'class' => 'my-class'));
        isSame('<button class="my-class uk-button uk-button-success" name="test" type="submit">My button</button>', $actual);

        $actual   = $button->render('test', array('text' => 'My button', 'button' => 'success', 'icon' => 'stop'));
        $expected = array(
            'button' => array('name' => 'test', 'class' => 'uk-button uk-button-success', 'type' => 'submit'),
                'i' => array('class' => 'uk-icon-stop'), '/i',
                ' My button',
            '/button'
        );
        isHtml($expected, $actual);
    }
}
