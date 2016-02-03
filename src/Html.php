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

    const PATH_KEY = 'jb_html';
    const RENDER_DIR = 'Renders';
    const CLASS_POSTFIX = 'Render';

    /**
     * Hold renders.
     *
     * @var array
     */
    protected $_renders = array(
        'input',
        'select',
    );

    /**
     * Html constructor.
     */
    public function __construct()
    {
        parent::__construct(array());

        $path = Path::getInstance(Html::PATH_KEY);

        $path->add(__DIR__ . '/' . Html::RENDER_DIR);
        $this->_setRenders();
    }

    /**
     * Add new html render.
     *
     * @param $render
     * @return $this
     */
    public function addRender($render)
    {
        $this[$render] = $this->_getRender($render);
        array_unshift($this->_renders, $render);

        return $this;
    }

    /**
     * Get all renders.
     *
     * @return array
     */
    public function getRenders()
    {
        return $this->_renders;
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
     * @param $render
     * @return mixed
     */
    public static function _($render)
    {
        $html = self::getInstance();
        return $html[$render];
    }

    /**
     * Setup renders.
     *
     * @return void
     */
    protected function _setRenders()
    {
        foreach ($this->_renders as $render) {
            $this[mb_strtolower($render)] = $this->_getRender($render);
        }
    }

    /**
     * @param $render
     * @return string
     */
    protected function _getRender($render)
    {
        $render = Str::clean($render);
        $render = implode('\\', array(
            __NAMESPACE__,
            Html::RENDER_DIR,
            Html::CLASS_POSTFIX . ucfirst($render)
        ));

        return new $render();
    }
}
