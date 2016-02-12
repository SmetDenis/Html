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
 * Class DatalistTest
 *
 * @package JBZoo\PHPUnit
 */
class DatalistTest extends PHPUnit
{

    /**
     * Test tag render.
     *
     * @return void
     */
    public function testRender()
    {
        $_SERVER['HTTP_HOST']   = 'host.local';
        $_SERVER['SERVER_PORT'] = 80;

        $Html = Html::getInstance();
        $list = $Html->_('datalist');

        $data = array(
            'Label 1' => 'Content text 1',
        );

        $actual   = $list->render($data);
        $expected = array(
            'dl' => array('class' => 'uk-description-list-horizontal jb-data-list'),
                array('dt' => array('title')),
                    'Label 1',
                '/dt',
                array('dd' => array()),
                    'Content text 1',
                '/dd',
            '/dl'
        );

        isHtml($expected, $actual);
        isHtmlContain($actual, 'dl > dt', 'Label 1');
        isHtmlContain($actual, 'dl > dd', 'Content text 1');;

        $actual = $list->render($data + array('Label 2' => 'Content text 2'), array(
            'class' => 'test',
            'id' => 'custom'
        ));
        $expected = array(
            'dl' => array('class' => 'test jb-data-list', 'id' => 'custom'),
                array('dt' => array('title')),
                    'Label 1',
                '/dt',
                array('dd' => array()),
                    'Content text 1',
                '/dd',
                array('dt' => array('title')),
                    'Label 2',
                '/dt',
                array('dd' => array()),
                    'Content text 2',
                '/dd',
            '/dl',
        );

        isHtml($expected, $actual);
    }
}
