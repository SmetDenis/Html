<?php
/**
 * JBZoo Html
 *
 * This file is part of tPerformanceTesthe JBZoo CCK package.
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

/**
 * Class PerformanceTest
 * @package JBZoo\Html
 */
class PerformanceTest extends PHPUnit
{
    protected $_max = 500;

    protected $_options = array(
        "val-0" => "lbl-0",
        "val-1" => "lbl-1",
        "val-2" => "lbl-2",
        "val-3" => "lbl-3",
        "val-4" => "lbl-4",
        "val-5" => "lbl-5",
        "val-6" => "lbl-6",
        "val-7" => "lbl-7",
        "val-8" => "lbl-8",
        "val-9" => "lbl-9",
        "val-10" => "lbl-10",
        "val-11" => "lbl-11",
        "val-12" => "lbl-12",
        "val-13" => "lbl-13",
        "val-14" => "lbl-14",
        "val-15" => "lbl-15",
        "val-16" => "lbl-16",
        "val-17" => "lbl-17",
        "val-18" => "lbl-18",
        "val-19" => "lbl-19",
        "val-20" => "lbl-20",
        "val-21" => "lbl-21",
        "val-22" => "lbl-22",
        "val-23" => "lbl-23",
        "val-24" => "lbl-24",
        "val-25" => "lbl-25",
        "val-26" => "lbl-26",
        "val-27" => "lbl-27",
        "val-28" => "lbl-28",
        "val-29" => "lbl-29",
        "val-30" => "lbl-30",
    );

    public function testRenders()
    {
        runBench(array(
            'Select' => function () {
                return Html::_('select')->render($this->_options, 'default', array(
                    'val-29'
                ));
            },
            'Bool' => function () {
                return Html::_('checkbool')->render('bool');
            },
            'Checkbox' => function () {
                return Html::_('checkbox')->render($this->_options, 'checkbox', 'val-20');
            },
            'Radio' => function () {
                return Html::_('radio')->render($this->_options, 'radio', 'val-11');
            },
            'InputText' => function () {
                return Html::_('input')->render($this->_options, 'input', 'val-11');
            },
            'Textarea' => function () {
                return Html::_('textarea')->render('textarea', 'Text area content');
            },
            'DataList' => function () {
                return Html::_('datalist')->render($this->_options);
            },
        ), array('count' => 300, 'name' => 'Renders performance'));
    }
}
