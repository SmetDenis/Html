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
 * Class HiddenTest
 *
 * @package JBZoo\PHPUnit
 */
class HiddenTest extends PHPUnit
{

    /**
     * @var \JBZoo\Html\Html
     */
    protected $html;

    /**
     * @var \JBZoo\Html\Render\Input
     */
    protected $hidden;

    /**
     * Setup test data.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->html   = Html::getInstance();
        $this->hidden = $this->html->_('hidden');
    }

    /**
     * Test input text output.
     *
     * @return void
     */
    public function testInputText()
    {
        $actual   = $this->hidden->render('image', 'my-value');
        $expected = '<input class="jb-input-text" name="image" value="my-value" type="hidden" />';
        isSame($expected, $actual);

        $actual   = $this->hidden->render('image', 'my-value', 'simple');
        $expected = '<input class="jb-input-text simple" name="image" value="my-value" type="hidden" />';
        isSame($expected, $actual);

        $actual   = $this->hidden->render('image', 'my-value', array('simple', 'array'));
        $expected = '<input class="jb-input-text simple array" name="image" value="my-value" type="hidden" />';
        isSame($expected, $actual);

        $actual   = $this->hidden->render('image', 'my-value', 'simple', 'unique');
        $expected = '<input id="unique" class="jb-input-text simple" name="image" value="my-value" type="hidden" />';
        isSame($expected, $actual);

        $actual = $this->hidden->render('image', 'my-value', 'simple', 'unique', array(
            'name'  => 'name',
            'id'    => 'new-id',
            'type'  => 'failed',
            'value' => 'test value',
        ));

        $expected = '<input id="unique" class="jb-input-text simple" name="image" value="my-value" type="hidden" />';
        isSame($expected, $actual);

        $actual = $this->hidden->render('image', 'my-value', '', '', array(
            'data-toggle' => 'tooltip',
            'data-position' => 'top',
        ));

        $expected = '<input data-toggle="tooltip" data-position="top" class="jb-input-text" name="image" value="my-value" type="hidden" />';
        isSame($expected, $actual);
    }
}
