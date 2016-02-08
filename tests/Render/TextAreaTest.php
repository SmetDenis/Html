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
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\Render\TextArea
     */
    protected $textarea;

    /**
     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html  = Html::getInstance();
        $this->textarea = $this->html->_('textarea');
    }

    /**
     * Test tag render.
     *
     * @return void
     */
    public function testRender()
    {
        $expected = $this->textarea->render('simple content');
        isSame($expected, '<textarea>simple content</textarea>');

        $expected = $this->textarea->set()->render('simple content');
        isSame($expected, '<textarea>simple content</textarea>');

        $expected = $this->textarea->set('textarea')->render('simple content');
        isSame($expected, '<textarea>simple content</textarea>');

        $expected = $this->textarea->render('simple content', 'my-class');
        isSame($expected, '<textarea class="my-class">simple content</textarea>');

        $expected = $this->textarea->render('simple content', 'my-class', 'my-id');
        isSame($expected, '<textarea id="my-id" class="my-class">simple content</textarea>');

        $expected = $this->textarea->render('simple content', 'my-class', 'my-id', array(
            'id' => 'new-id',
            'class' => 'new-class',
        ));
        isSame($expected, '<textarea id="my-id" class="my-class">simple content</textarea>');

        $expected = $this->textarea->render('simple content', 'my-class', 'my-id', array(
            'title' => 'text title',
            'style' => 'color: red;',
        ));
        isSame($expected, '<textarea title="text title" style="color: red;" id="my-id" class="my-class">simple content</textarea>');
    }

    /**
     * @expectedException \JBZoo\Html\Exception
     */
    public function testInvalidRender()
    {
        $this->textarea->set('li')->render('simple content');
        $this->textarea->set('strong')->render('simple content');
    }
}
