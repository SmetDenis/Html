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
 * Class CheckboxTest
 *
 * @package JBZoo\PHPUnit
 */
class CheckboxTest extends PHPUnit
{

    /**
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\ListAbstract
     */
    protected $checkbox;

    /**
     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html = Html::getInstance();
        $this->checkbox = $this->html->_('checkbox');
    }

    /**
     * Test radio list output.
     *
     * return void
     */
    public function testCheckBoxChecked()
    {
        $html = $this->checkbox->render(array(
            'val-1',
            'val-2',
            'val-3',
        ), 'test', array('0', '2'), array(), true);

        $expected = array(
            array('label' => array('for' => 'preg:/checkbox-[0-9]+/', 'class' => 'jb-checkbox-lbl jb-label-0'),
                'input' => array(
                    'id'      => 'preg:/checkbox-[0-9]+/',
                    'name'    => 'test',
                    'type'    => 'checkbox',
                    'value'   => 0,
                    'class'   => 'jb-val-0',
                    'checked' => 'checked',
                )),
                'val-1',
            '/label',
            array('label' => array('for' => 'preg:/checkbox-[0-9]+/', 'class' => 'jb-checkbox-lbl jb-label-1'),
                'input' => array(
                    'id'    => 'preg:/checkbox-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'checkbox',
                    'value' => 1,
                    'class' => 'jb-val-1'
                )),
                'val-2',
            '/label',
            array('label' => array('for' => 'preg:/checkbox-[0-9]+/', 'class' => 'jb-checkbox-lbl jb-label-2'),
                'input' => array(
                    'id'      => 'preg:/checkbox-[0-9]+/',
                    'name'    => 'test',
                    'type'    => 'checkbox',
                    'value'   => 2,
                    'class'   => 'jb-val-2',
                    'checked' => 'checked',
                )),
                'val-3',
            '/label',
        );

        isHtml($expected, $html);
    }
}
