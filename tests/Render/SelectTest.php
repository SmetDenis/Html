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
 * Class SelectTest
 *
 * @package JBZoo\PHPUnit
 */
class SelectTest extends PHPUnit
{

    /**
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\Render\Select
     */
    protected $select;

    /**     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html   = Html::getInstance();
        $this->select = $this->html->_('select');
    }

    /**
     * Test select.
     *
     * @return void
     */
    public function testSelectRender()
    {
        $options = array(
            'val-1' => 'Label 1',
            'test'  => 'Test label',
            ' '     => 'Space label',
            'array' => 'Array label',
        );

        $actual = $this->select->render($options, 'test');

        $expected = array(
            'select' => array('name' => 'test', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('option' => array('value' => ' ', 'class' => 'jb-option jb-option-')),
                    'Space label',
                '/option',
                array('option' => array('value' => 'array', 'class' => 'jb-option jb-option-array')),
                    'Array label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $actual = $this->select->render($options, 'test', 'array');

        $expected = array(
            'select' => array('name' => 'test', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('option' => array('value' => ' ', 'class' => 'jb-option jb-option-')),
                    'Space label',
                '/option',
                array('option' => array('value' => 'array', 'selected' => 'selected', 'class' => 'jb-option jb-option-array')),
                    'Array label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $actual = $this->select->render($options, 'test', array(' ', 'array'));

        $expected = array(
            'select' => array('name' => 'test', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('option' => array('value' => ' ', 'class' => 'jb-option jb-option-')),
                    'Space label',
                '/option',
                array('option' => array('value' => 'array', 'selected' => 'selected', 'class' => 'jb-option jb-option-array')),
                    'Array label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $actual = $this->select->render($options, 'test', array(' ', 'array-1'));

        $expected = array(
            'select' => array('name' => 'test', 'class' => 'jb-select'),
                array('option' => array(
                    'value'    => 'array-1',
                    'selected' => 'selected',
                    'class'    => 'jb-option jb-option-array-1'
                )),
                    '--No selected--',
                '/option',
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('option' => array('value' => ' ', 'class' => 'jb-option jb-option-')),
                    'Space label',
                '/option',
                array('option' => array('value' => 'array', 'class' => 'jb-option jb-option-array')),
                    'Array label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $options = array(
            'val-1' => 'Label 1',
            'test'  => 'Test label',
            ' '     => 'Space label',
        );

        $actual = $this->select->render($options, 'test', array(' '));

        $expected = array(
            'select' => array('name' => 'test', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('option' => array('value' => ' ', 'selected' => 'selected', 'class' => 'jb-option jb-option-')),
                    'Space label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $options = array(
            'val-1'    => 'Label 1',
            'test'     => 'Test label',
            'custom'   => 'Custom label',
            'test-val' => 'Test val label',
        );

        $actual = $this->select->render($options, 'test', array(
            'test',
            'custom',
            'no-exits'
        ), array(
            'name' => 'hello',
            'method' => 'get',
            'multiple' => true,
        ));

        $expected = array(
            'select' => array('name' => 'test[]', 'multiple' => 'multiple', 'method' => 'get', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array(
                    'selected' => 'selected',
                    'value' => 'test',
                    'class' => 'jb-option jb-option-test'
                )),
                    'Test label',
                '/option',
                array('option' => array('selected' => 'selected', 'value' => 'custom', 'class' => 'jb-option jb-option-custom')),
                    'Custom label',
                '/option',
                array('option' => array('value' => 'test-val', 'class' => 'jb-option jb-option-test-val')),
                    'Test val label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $options = array(
            'val-1' => 'Label 1',
            'test' => 'Test label',
            'custom' => 'Custom label',
            'test-val' => 'Test val label',
        );

        $actual = $this->select->render($options, 'test', 'test', array(
            'name' => 'hello',
            'method' => 'get',
            'multiple' => true,
        ));

        $expected = array(
            'select' => array('name' => 'test[]', 'multiple' => 'multiple', 'method' => 'get', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array(
                    'selected' => 'selected',
                    'value' => 'test',
                    'class' => 'jb-option jb-option-test'
                )),
                    'Test label',
                '/option',
                array('option' => array('value' => 'custom', 'class' => 'jb-option jb-option-custom')),
                    'Custom label',
                '/option',
                array('option' => array('value' => 'test-val', 'class' => 'jb-option jb-option-test-val')),
                    'Test val label',
                '/option',
            '/select'
        );

        isHtml($expected, $actual);
    }

    /**
     * Test multiple select.
     *
     * @return void
     */
    public function testMultipleSelect()
    {
        $options = array(
            'val-1' => 'Label 1',
            'test'  => 'Test label',
            array(
                'gr-test' => 'Group test 1',
                'val-1' => 'No exits in group',
            )
        );

        $expected = array(
            'select' => array('name' => 'test[]', 'multiple' => 'multiple', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('optgroup' => array('label' => 'Select group 0')),
                    'option' => array('class' => 'jb-option jb-option-group-test-1', 'value' => 'gr-test'),
                        'Group test 1',
                    '/option',
                '/optgroup',
            '/select'
        );

        $actual = $this->select->render($options, 'test', array(), array('multiple' => true));
        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $expected = array(
            'select' => array('name' => 'test[]', 'multiple' => 'multiple', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'selected' => 'selected', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('optgroup' => array('label' => 'Select group 0')),
                    'option' => array('class' => 'jb-option jb-option-group-test-1', 'selected' => 'selected', 'value' => 'gr-test'),
                        'Group test 1',
                    '/option',
                '/optgroup',
            '/select'
        );

        $actual = $this->select->render($options, 'test', array('gr-test', 'val-1'), array('multiple' => true));
        isHtml($expected, $actual);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $expected = array(
            'select' => array('name' => 'test[]', 'multiple' => 'multiple', 'class' => 'jb-select'),
                array('option' => array('value' => 'val-1', 'selected' => 'selected', 'class' => 'jb-option jb-option-val-1')),
                    'Label 1',
                '/option',
                array('option' => array('value' => 'test', 'class' => 'jb-option jb-option-test')),
                    'Test label',
                '/option',
                array('optgroup' => array('label' => 'Select group 0')),
                    'option' => array('class' => 'jb-option jb-option-group-test-1', 'value' => 'gr-test'),
                        'Group test 1',
                    '/option',
                '/optgroup',
            '/select'
        );

        $actual = $this->select->render($options, 'test', 'val-1', array('multiple' => true));
        isHtml($expected, $actual);
    }
}
