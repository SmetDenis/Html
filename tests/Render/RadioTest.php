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
use JBZoo\Utils\Str;

/**
 * Class RadioTest
 *
 * @package JBZoo\PHPUnit
 */
class RadioTest extends PHPUnit
{

    /**
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\ListAbstract
     */
    protected $radio;

    /**
     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html  = Html::getInstance();
        $this->radio = $this->html->_('radio');
    }

    /**
     * Test radio list output.
     *
     * return void
     */
    public function testRadio()
    {
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $html = $this->radio->render(array(
            'val-1',
            'val-2',
            'val-3',
        ), 'test', array(), array(), true);

        $expected = array(
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-0'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 0,
                    'class' => 'jb-val-0'
                )),
                'val-1',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-1'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 1,
                    'class' => 'jb-val-1'
                )),
                'val-2',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-2'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 2,
                    'class' => 'jb-val-2'
                )),
                'val-3',
            '/label',
        );

        isHtml($expected, $html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test data and checked single option by array.
        $html = $this->radio->render(array(
            '<p>tag</p>'     => 'Tag',
            ' '              => 'Empty',
            '"Test label 3"' => 'Custom',
            'значение'       => 'Translate cyrillic value',
            'common'         => 'Common label'
        ), 'test', array('common'), array(), true);

        $expected = array(
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-lt-p-gt-tag-lt-p-gt'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => '&amp;lt;p&amp;gt;tag&amp;lt;/p&amp;gt;',
                    'class' => 'jb-val-lt-p-gt-tag-lt-p-gt'
                )),
                'Tag',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => ' ',
                    'class' => 'jb-val-'
                )),
                'Empty',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-quot-test-label-3-quot'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => '&amp;quot;Test label 3&amp;quot;',
                    'class' => 'jb-val-quot-test-label-3-quot'
                )),
                'Custom',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-znachenie'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'значение',
                    'class' => 'jb-val-znachenie'
                )),
                'Translate cyrillic value',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-common'),
                'input' => array(
                    'id'      => 'preg:/radio-[0-9]+/',
                    'name'    => 'test',
                    'type'    => 'radio',
                    'value'   => 'common',
                    'class'   => 'jb-val-common jb-checked',
                    'checked' => 'checked',
                )),
                'Common label',
            '/label',
        );

        isHtml($expected,$html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test checked single option by string.
        $html = $this->radio->render(array(
            '"Test label 3"' => 'Custom',
            'значение'       => 'Translate cyrillic value',
            'common'         => 'Common label'
        ), 'test', 'common', array(), true);

        $expected = array(
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-quot-test-label-3-quot'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => '&amp;quot;Test label 3&amp;quot;',
                    'class' => 'jb-val-quot-test-label-3-quot'
                )),
                'Custom',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-znachenie'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'значение',
                    'class' => 'jb-val-znachenie'
                )),
                'Translate cyrillic value',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-common'),
                'input' => array(
                    'id'      => 'preg:/radio-[0-9]+/',
                    'name'    => 'test',
                    'type'    => 'radio',
                    'value'   => 'common',
                    'class'   => 'jb-val-common jb-checked',
                    'checked' => 'checked',
                )),
                'Common label',
            '/label',
        );

        isHtml($expected, $html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $html = $this->radio->render(array(
            'test-7' => 'Test label 7',
            'test-8' => 'Test label 8',
        ), 'test', array('common', 'test-8', 'test-2', 'test-4'));

        $expected = array(
            array('input' => array(
                'id'    => 'preg:/radio-[0-9]+/',
                'name'  => 'test',
                'type'  => 'radio',
                'value' => 'test-7',
                'class' => 'jb-val-test-7',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-7')),
                'Test label 7',
            '/label',
            array('input' => array(
                'id'    => 'preg:/radio-[0-9]+/',
                'name'  => 'test',
                'type'  => 'radio',
                'value' => 'test-8',
                'class' => 'jb-val-test-8',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-8')),
                'Test label 8',
            '/label',
            array('input' => array(
                'id'      => 'preg:/radio-[0-9]+/',
                'name'    => 'test',
                'type'    => 'radio',
                'value'   => 'no-exits',
                'class'   => 'jb-val-no-exits jb-checked',
                'checked' => 'checked',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-no-exits')),
                'No exits',
            '/label',
        );

        isHtml($expected, $html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $html = $this->radio->render(array(
            'test-7' => 'Test label 7',
            'test-8' => 'Test label 8',
        ), 'test', 'test');

        $expected = array(
            array('input' => array(
                'id'    => 'preg:/radio-[0-9]+/',
                'name'  => 'test',
                'type'  => 'radio',
                'value' => 'test-7',
                'class' => 'jb-val-test-7',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-7')),
                'Test label 7',
            '/label',
            array('input' => array(
                'id'    => 'preg:/radio-[0-9]+/',
                'name'  => 'test',
                'type'  => 'radio',
                'value' => 'test-8',
                'class' => 'jb-val-test-8',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-8')),
                'Test label 8',
            '/label',
            array('input' => array(
                'id'      => 'preg:/radio-[0-9]+/',
                'name'    => 'test',
                'type'    => 'radio',
                'value'   => 'no-exits',
                'class'   => 'jb-val-no-exits jb-checked',
                'checked' => 'checked',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-no-exits')),
                'No exits',
            '/label',
        );

        isHtml($expected, $html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test checked options by array.
        $html = $this->radio->render(array(
            'test-1' => 'Test label 1',
            'test-2' => 'Test label 2',
            'test-3' => 'Test label 3',
            'test-4' => 'Test label 4',
            'test-6' => 'Test label 6',
            'test-7' => 'Test label 7',
            'test-8' => 'Test label 8',
            'common' => 'Common label'
        ), 'test', array('common', 'test-8', 'test-2', 'test-4'), array(), true);

        $expected = array(
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-1'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'test-1',
                    'class' => 'jb-val-test-1'
                )),
                'Test label 1',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-2'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'test-2',
                    'class' => 'jb-val-test-2',
                )),
                'Test label 2',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-3'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'test-3',
                    'class' => 'jb-val-test-3'
                )),
                'Test label 3',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-4'),
                'input' => array(
                    'id'      => 'preg:/radio-[0-9]+/',
                    'name'    => 'test',
                    'type'    => 'radio',
                    'value'   => 'test-4',
                    'class'   => 'jb-val-test-4 jb-checked',
                    'checked' => 'checked',
                )),
                'Test label 4',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-6'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'test-6',
                    'class' => 'jb-val-test-6'
                )),
                'Test label 6',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-7'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'test-7',
                    'class' => 'jb-val-test-7'
                )),
                'Test label 7',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-8'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'test-8',
                    'class' => 'jb-val-test-8',
                )),
                'Test label 8',
            '/label',
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-common'),
                'input' => array(
                    'id'    => 'preg:/radio-[0-9]+/',
                    'name'  => 'test',
                    'type'  => 'radio',
                    'value' => 'common',
                    'class' => 'jb-val-common',
                )),
                'Common label',
            '/label',
        );

        isHtml($expected, $html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test setup callable template.
        $options = array(
            'test-1' => 'Test label 1',
        );

        $html = $this->radio->render($options, 'test', 0, array(), function ($list, $inpAttrs, $lblAttrs, $text) {
            $input = '<input ' . $list->buildAttrs($inpAttrs) . ' />';
            $text  = '<span class="label-title">' . $text . '</span>';
            $label = '<label ' . $list->buildAttrs($lblAttrs) . '>' . $text . '</label>';

            return implode(PHP_EOL, array($input, $label));
        });

        $expected = array(
            array('input' => array(
                'id'      => 'preg:/radio-[0-9]+/',
                'name'    => 'test',
                'type'    => 'radio',
                'value'   => 'test-1',
                'class'   => 'jb-val-test-1 jb-checked',
                'checked' => 'checked',
            )),
            array('label' => array('for' => 'preg:/radio-[0-9]+/', 'class' => 'jb-radio-lbl jb-label-test-1')),
                'span' => array('class' => 'label-title'),
                    'Test label 1',
                '/span',
            '/label',
        );

        isHtml($expected, $html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $html = $this->radio->render($options, 'test', 0, array(), 'no-exits');
        isEmpty($html);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $inputReload = Html::_('checkbox', 'Custom\Html');
        $html = $inputReload->render($options, 'test');

        $expected = array(
            'div' => array('class' => 'jb-input jb-checkbox'),
                'label' => array('for' => 'preg:/checkbox-[0-9]+/', 'class' => 'jb-checkbox-lbl jb-label-test-1'),
                    array('input' => array(
                        'id'    => 'preg:/checkbox-[0-9]+/',
                        'name'  => 'test',
                        'type'  => 'checkbox',
                        'value' => 'test-1',
                        'class' => 'jb-val-test-1',
                    )),
                    'Test label 1',
                '/label',
            '/div'
        );

        isHtml($expected, $html);
    }
}
