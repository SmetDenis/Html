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
        $html = $this->radio->render(array(
            'val-1',
            'val-2',
            'val-3',
        ), 'test');

        isHtmlContain($html, '.jb-label-0 > .jb-val-0');
        isHtmlContain($html, '.jb-label-0', 'val-1');
        isHtmlContain($html, '.jb-label-1 > .jb-val-1');
        isHtmlContain($html, '.jb-label-1', 'val-2');
        isHtmlContain($html, '.jb-label-2 > .jb-val-2');
        isHtmlContain($html, '.jb-label-2', 'val-3');

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test data and checked single option by array.
        $html = $this->radio->render(array(
            'test-1'   => 'Test label 1',
            'test-2'   => 'Test label 2',
            'test-3'   => 'Test label 3',
            'значение' => 'Translate cyrillic value',
            'common'   => 'Common label'
        ), 'test', array('common'));

        isHtmlContain($html, '.jb-label-test-1 > .jb-val-test-1');
        isHtmlContain($html, '.jb-label-test-1 [name=test]');
        isHtmlContain($html, '.jb-label-test-1 [type=radio]');
        isHtmlContain($html, '.jb-label-test-1 [value=test-1]');
        isHtmlContain($html, '.jb-label-test-1', 'Test label 1');

        isHtmlContain($html, '.jb-label-test-2 > .jb-val-test-2');
        isHtmlContain($html, '.jb-label-test-2', 'Test label 2');

        isHtmlContain($html, '.jb-label-test-3 > .jb-val-test-3');
        isHtmlContain($html, '.jb-label-test-3', 'Test label 3');

        isHtmlContain($html, '.jb-label-znachenie > .jb-val-test-3');
        isHtmlContain($html, '.jb-label-znachenie', 'Translate cyrillic value');

        isHtmlContain($html, '.jb-label-common > .jb-val-common');
        isHtmlContain($html, '.jb-label-common', 'Common label');
        isHtmlContain($html, '.jb-label-common > .jb-checked');
        isHtmlContain($html, '.jb-label-common [checked=checked]');
        isHtmlContain($html, '.jb-label-common [value=common]');

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test checked single option by string.
        $html = $this->radio->render(array(
            'test-3'   => 'Test label 3',
            'значение' => 'Translate cyrillic value',
            'common'   => 'Common label'
        ), 'test', 'common');

        isHtmlContain($html, '.jb-label-common > .jb-val-common');
        isHtmlContain($html, '.jb-label-common', 'Common label');
        isHtmlContain($html, '.jb-label-common > .jb-checked');
        isHtmlContain($html, '.jb-label-common [checked=checked]');
        isHtmlContain($html, '.jb-label-common [value=common]');

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test checked options by array.
        $html = $this->radio->render(array(
            'test-1'   => 'Test label 1',
            'test-2'   => 'Test label 2',
            'test-3'   => 'Test label 3',
            'test-4'   => 'Test label 4',
            'test-6'   => 'Test label 6',
            'test-7'   => 'Test label 7',
            'test-8'   => 'Test label 8',
            'common'   => 'Common label'
        ), 'test', array('common', 'test-8', 'test-2', 'test-4'));

        isHtmlContain($html, '.jb-label-common > .jb-val-common');
        isHtmlContain($html, '.jb-label-common', 'Common label');
        isHtmlContain($html, '.jb-label-common > .jb-checked');
        isHtmlContain($html, '.jb-label-common [checked=checked]');
        isHtmlContain($html, '.jb-label-common [value=common]');

        isHtmlContain($html, '.jb-label-test-8 > .jb-val-test-8');
        isHtmlContain($html, '.jb-label-test-8 > .jb-checked');
        isHtmlContain($html, '.jb-label-test-8 [checked=checked]');
        isHtmlContain($html, '.jb-label-test-8 [value=test-8]');

        isHtmlContain($html, '.jb-label-test-2 > .jb-val-test-2');
        isHtmlContain($html, '.jb-label-test-2 > .jb-checked');
        isHtmlContain($html, '.jb-label-test-2 [checked=checked]');
        isHtmlContain($html, '.jb-label-test-2 [value=test-2]');

        isHtmlContain($html, '.jb-label-test-4 > .jb-val-test-4');
        isHtmlContain($html, '.jb-label-test-4 > .jb-checked');
        isHtmlContain($html, '.jb-label-test-4 [checked=checked]');
        isHtmlContain($html, '.jb-label-test-4 [value=test-4]');

        isHtmlContain($html, '.jb-label-test-5 > .jb-checked');
        isHtmlContain($html, '.jb-label-test-5 [checked=checked]');
        isHtmlContain($html, '.jb-label-test-5 [value=test-4]');

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test clear setup template.
        $html = $this->radio->tpl('no-exits')->render(array(
            'test-1'   => 'Test label 1',
            'test-2'   => 'Test label 2',
        ), 'test');

        isEmpty(Str::clean($html));

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //  Test setup callable template.
        $options = array(
            'test-1' => 'Test label 1',
            'test-2' => 'Test label 2',
        );

        $html = $this->radio->tpl(function () {
            return 'custom output';
        })->render($options, 'test');

        isSame(implode(PHP_EOL, array(
            'custom output',
            'custom output',
        )), $html);

        $html = $this->radio->tpl(function ($list, $inpAttrs, $lblAttrs, $text) {
            $input = '<input ' . $list->buildAttrs($inpAttrs) . '>';
            $text  = '<span class="label-title">' . $text . '</span>';
            $label = '<label ' . $list->buildAttrs($lblAttrs) . '>' . $text . '</label>';

            return implode(PHP_EOL, array($input, $label));
        })->render($options, 'test', 0);

        isHtmlContain($html, '.jb-val-test-1');
        isHtmlContain($html, '.jb-val-test-2');
        isHtmlContain($html, '.jb-val-test-1.jb-checked');
        isHtmlNotContain($html, '.jb-radio-lbl .jb-val-test-1', '');

        isHtmlContain($html, '.jb-label-test-1');
        isHtmlContain($html, '.jb-label-test-2');

        $inputReload = Html::_('checkbox', 'Custom\Html');
        $html = $inputReload->render($options, 'test');

        isHtmlContain($html, '.jb-input > .jb-checkbox-lbl');
        isHtmlContain($html, '.jb-input > .jb-checkbox-lbl > jb-val-test-1');
        isHtmlContain($html, '.jb-input > .jb-checkbox-lbl', 'Test label 1');
    }
}
