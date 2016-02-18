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

namespace JBZoo\Html;

use JBZoo\Html\Render\Render;

/**
 * Class ButtonAbstract
 *
 * @package JBZoo\Html
 */
abstract class ButtonAbstract extends Render
{

    /**
     * Uikit button prefix.
     *
     * @var string
     */
    protected $_btm = 'uk-button';

    /**
     * Uikit icon prefix.
     *
     * @var string
     */
    protected $_icon = 'uk-icon';

    /**
     * Output content.
     *
     * @param string $name
     * @param string $content
     * @param array $attrs
     * @param string $type
     * @return mixed
     */
    abstract public function render($name = '', $content = '', array $attrs = array(), $type = 'submit');

    /**
     * Create button classes.
     *
     * @param array $attrs
     * @return array
     */
    protected function _getBtnClasses(array $attrs = array())
    {
        if (isset($attrs['button'])) {
            $classes = array($this->_btm);
            foreach ((array) $attrs['button'] as $btn) {
                $classes[] = $this->_btm . '-' . $btn;
            }

            $attrs = $this->_mergeAttr($attrs, implode(' ', $classes));
            unset($attrs['button']);
        }

        return $attrs;
    }
}
