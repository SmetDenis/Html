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
 * Class ImageTest
 *
 * @package JBZoo\PHPUnit
 */
class ImageTest extends PHPUnit
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

        $Html  = Html::getInstance();
        $image = $Html->_('image');

        isSame('<img class="jb-image" src="http://host.local/image.png" />', $image->render('image.png'));
        isSame('<img class="jb-image" src="http://host.local/path/to/image/image.png" />', $image->render('path\\//to\image/image.png'));

        $actual = $image->render('image.png', 'simple', 'custom', array(
            'class' => array('new-class'),
            'id'    => 'new-id'
        ));
        isSame('<img class="jb-image simple" id="custom" src="http://host.local/image.png" />', $actual);

        $actual = $image->render('image.png', array('new-class', 'my-image'), 'custom', array(
            'class' => array('new-class'),
            'id'    => 'new-id'
        ));
        isSame('<img class="jb-image new-class my-image" id="custom" src="http://host.local/image.png" />', $actual);

        $actual = $image->render('image.png', 'my-image', 'custom', array(
            'alt' => 'jb image render',
            'fullUrl' => false,
        ));
        isSame('<img alt="jb image render" class="jb-image my-image" id="custom" src="image.png" />', $actual);
    }
}
