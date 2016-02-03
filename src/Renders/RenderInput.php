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

namespace JBZoo\Html\Renders;

use JBZoo\Html\Renders\Interfaces\ListInterface;

/**
 * Class RenderInput
 *
 * @package JBZoo\Html\Renders
 */
class RenderInput extends Render implements ListInterface
{

    /**
     * Render template.
     *
     * @var string
     */
    protected $_tpl = '<input value="{{value}}" type="{{type}}" name="{{name}}" {{params}}/>';

    /**
     * Render output content.
     *
     * @param $name
     * @param $value
     * @param string|array|null $class
     * @param string|null $id
     * @param array $params
     * @return mixed
     */
    public function render($name, $value, $class = null, $id = null, array $params = array())
    {
        $params['class'] .= $this->_jbSrt('type-input') . ' ' . $class;

        if ($id !== null) {
            $params['id'] = $id;
        }

        return $this->_format(array(
            'value'  => $value,
            'type'   => 'text',
            'name'   => $name,
            'params' => $this->_formatAttributes($params),
        ));
    }
}
