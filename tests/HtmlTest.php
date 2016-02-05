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
 * Class HtmlTest
 *
 * @package JBZoo\PHPUnit
 */
class HtmlTest extends PHPUnit
{

    /**
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\Renders\Input
     */
    protected $input;

    /**
     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html  = Html::getInstance();
        $this->input = $this->html['input'];
    }

    /**
     * Tear down data.
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->html, $this->input);
    }

    /**
     * Test default renders.
     *
     * @return void.
     */
    public function testDefaultInstance()
    {
        $Html = Html::getInstance();

        isClass('JBZoo\Html\Renders\Input', $Html['input']);
        isClass('JBZoo\Html\Renders\Input', $Html->_('Input'));
        isClass('JBZoo\Html\Renders\Input', $Html->_('input'));
    }

    /**
     * Test add custom render.
     *
     * @return void
     */
    public function testCustomAddRender()
    {
        $expected = 'Im test custom render';
        $result   = $this->html->_('test', 'Custom\Html')->render('text', 'name', 'value', 'class', 'id');

        isSame($expected, $result);
    }

    /**
     * Test input text output.
     *
     * @return void
     */
    public function testInputText()
    {
        $actual   = $this->input->render('text', 'image', 'my-value');
        $expected = '<input class="jb-input-text" type="text" name="image" value="my-value" />';
        isSame($expected, $actual);

        $actual   = $this->input->render('text', 'image', 'my-value', 'simple');
        $expected = '<input class="jb-input-text simple" type="text" name="image" value="my-value" />';
        isSame($expected, $actual);

        $actual   = $this->input->render('text', 'image', 'my-value', array('simple', 'array'));
        $expected = '<input class="jb-input-text simple array" type="text" name="image" value="my-value" />';
        isSame($expected, $actual);

        $actual   = $this->input->render('text', 'image', 'my-value', 'simple', 'unique');
        $expected = '<input id="unique" class="jb-input-text simple" type="text" name="image" value="my-value" />';
        isSame($expected, $actual);

        $actual = $this->input->render('text', 'image', 'my-value', 'simple', 'unique', array(
            'name'  => 'name',
            'id'    => 'new-id',
            'type'  => 'failed',
            'value' => 'test value',
        ));

        $expected = '<input id="unique" class="jb-input-text simple" type="text" name="image" value="my-value" />';
        isSame($expected, $actual);

        $actual = $this->input->render('text', 'image', 'my-value', '', '', array(
            'data-toggle' => 'tooltip',
            'data-position' => 'top',
        ));

        $expected = '<input data-toggle="tooltip" data-position="top" class="jb-input-text" type="text" name="image" value="my-value" />';
        isSame($expected, $actual);
    }

    /**
     * Test hidden input output.
     *
     * @return void
     */
    public function testInputHidden()
    {
        $actual   = $this->input->render('hidden', 'test-name', 'test-value');
        $expected = '<input class="jb-input-hidden" type="hidden" name="test-name" value="test-value" />';
        isSame($expected, $actual);
    }

    /**
     * @expectedException \JBZoo\Html\Exception
     */
    public function testInputException()
    {
        $this->input->render('no-exit', 'user', 'value-1');
        $this->input->render('textarea', 'user', 'value-1');
        $this->input->render('custom', 'user', 'value-1');
    }
}
