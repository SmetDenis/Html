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
 * Class TagTest
 *
 * @package JBZoo\PHPUnit
 */
class TagTest extends PHPUnit
{

    /**
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\Render\Tag
     */
    protected $tag;

    /**
     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html  = Html::getInstance();
        $this->tag = $this->html->_('tag');
    }

    /**
     * Test tag render.
     *
     * @return void
     */
    public function testRender()
    {
        $expected = $this->tag->render('simple content');
        isSame($expected, '<p>simple content</p>');

        $expected = $this->tag->render('simple content', 'my-class');
        isSame($expected, '<p class="my-class">simple content</p>');

        $expected = $this->tag->render('simple content', 'my-class', 'my-id');
        isSame($expected, '<p id="my-id" class="my-class">simple content</p>');

        $expected = $this->tag->render('simple content', 'my-class', 'my-id', array(
            'id' => 'new-id',
            'class' => 'new-class',
        ));
        isSame($expected, '<p id="my-id" class="my-class">simple content</p>');

        $expected = $this->tag->render('simple content', 'my-class', 'my-id', array(
            'title' => 'text title',
            'style' => 'color: red;',
        ));
        isSame($expected, '<p title="text title" style="color: red;" id="my-id" class="my-class">simple content</p>');

        $expected = $this->tag->set('strong')->render('simple content');
        isSame($expected, '<strong>simple content</strong>');

        $expected = $this->tag->set('li')->render('simple content');
        isSame($expected, '<li>simple content</li>');

        $expected = $this->tag->set('a')->render('simple content', 'test', 'unique', array(
            'href' => 'http://google.com',
            'target' => '_blank',
        ));
        isSame($expected, '<a href="http://google.com" target="_blank" id="unique" class="test">simple content</a>');
    }
}
