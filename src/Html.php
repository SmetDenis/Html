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

use JBZoo\Path\Path;
use JBZoo\Utils\Str;
use Pimple\Container;

/**
 * Class Html
 *
 * @package JBZoo\Html
 */
class Html extends Container
{

    const PATH_KEY   = 'jb_html';
    const RENDER_DIR = 'Render';

    /**
     * Html constructor.
     */
    public function __construct()
    {
        parent::__construct(array());

        $path = Path::getInstance(Html::PATH_KEY);
        $path->add(__DIR__ . '/' . Html::RENDER_DIR, 'core');
    }

    /**
     * Get instance object.
     *
     * @return Html
     */
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Get and register render.
     *
     * @param string $render
     * @param string $ns
     * @return mixed
     */
    public static function _($render, $ns = __NAMESPACE__)
    {
        $html   = self::getInstance();
        $render = Str::low($render);
        $alias  = $ns . '\\' . $render;

        if (!isset($html[$alias])) {
            $html[$alias] = self::_register($render, $ns);
        }

        return $html[$alias];
    }

    /**
     * Pimple callback register render.
     *
     * @param $render
     * @param string $ns
     * @return \Closure
     */
    private static function _register($render, $ns)
    {
        return function () use ($render, $ns) {
            $render = Str::clean($render);
            $render = implode('\\', array(
                $ns,
                Html::RENDER_DIR,
                ucfirst($render)
            ));

            return new $render();
        };
    }
}
