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
     * @var \JBZoo\Html\Render\Input
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
        $this->input = $this->html->_('Input');
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
     * Test add custom render.
     *
     * @return void
     */
    public function testCustomAddRender()
    {
        $expected = 'Im test custom render';
        $result   = $this->html->_('test', 'Custom\Html')->render('name', 'value', 'class', 'id');

        isSame($expected, $result);
    }

    /**
     * Test default renders.
     *
     * @return void.
     */
    public function testDefaultInstance()
    {
        $Html = Html::getInstance();
        isClass('JBZoo\Html\Render\Input', $Html->_('Input'));
        isClass('JBZoo\Html\Render\Input', $Html->_('input'));
    }

    /**
     * Test data attributes.
     *
     * @return void
     */
    public function testDataAttr()
    {
        $Html = Html::getInstance();

        $expected = array(
            'input' => array(
                'data-test' => 'val',
                'data-json' => "{'param-1':'val-1','param-2':'val-2'}",
                'class'     => 'jb-input-text',
                'name'      => 'test',
                'value'     => 'val',
                'type'      => 'text',
            )
        );

        $input = $Html->_('input')->render('test', 'val', '', '', array(
            'data' => array(
                'test' => 'val',
                'json' => array(
                    'param-1' => 'val-1',
                    'param-2' => 'val-2',
                )
            )
        ));

        isHtml($expected, $input);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $expected = array(
            'input' => array(
                'data-test' => 'val',
                'data-json' => "{'param-1':'val-1','param-2':'val-2'}",
                'class'     => 'jb-input-text',
                'name'      => 'test',
                'value'     => 'val',
                'type'      => 'text',
            )
        );

        $obj = (object) array(
            'param-1' => 'val-1',
            'param-2' => 'val-2',
        );

        $input = $Html->_('input')->render('test', 'val', '', '', array(
            'data' => array(
                'test' => 'val',
                'json' => $obj,
            )
        ));

        isHtml($expected, $input);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $expected = array(
            'input' => array(
                'class' => 'jb-input-text',
                'name'  => 'test',
                'value' => 'val',
                'type'  => 'text',
            )
        );

        $input = $Html->_('input')->render('test', 'val', '', '', array(
            'data' => array(),
        ));

        isHtml($expected, $input);
    }
}
