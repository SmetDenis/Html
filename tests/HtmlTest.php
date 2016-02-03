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

use JBZoo\Html\Html;
use JBZoo\Html\Exception;

/**
 * Class HtmlTest
 * @package JBZoo\PHPUnit
 */
class HtmlTest extends PHPUnit
{

    protected $_defaultRenders = array('input', 'select');

    public function testInstance()
    {
        $Html = Html::getInstance();

        $expected = $this->_defaultRenders;
        isSame($expected, $Html->getRenders());

        $Html->addRender('custom');
        $expected = array('custom', 'input', 'select');
        isSame($expected, $Html->getRenders());

        isClass('JBZoo\Html\Renders\RenderInput', $Html['input']);
        isClass('JBZoo\Html\Renders\RenderSelect', $Html['select']);
    }

    public function testInput()
    {
        $Html = Html::getInstance();

        isSame(
            '<input value="test" type="text" name="input" class="jb-type-input my-class" id="my-id"/>',
            $Html->_('input')->render('input', 'test', 'my-class', 'my-id')
        );
    }

    public function testSelect()
    {
        $Html = Html::getInstance();

        isSame(
            'Select render',
            $Html->_('select')->render('input', 'test', 'my-class', 'my-id')
        );
    }

    public function testCustom()
    {
        $Html = Html::getInstance();

        isSame(
            'Custom render',
            $Html->_('custom')->render('input', 'test', 'my-class', 'my-id')
        );
    }
}
