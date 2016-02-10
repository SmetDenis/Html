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

namespace JBZoo\Html\Render;

/**
 * Class Hidden
 *
 * @package JBZoo\Html\Render
 */
class Hidden extends Input
{

    /**
     * Setup input type.
     *
     * @var string
     */
    protected $_type = 'hidden';

    /**
     * Create group hidden inputs.
     *
     * @param array $fields
     * @return string
     */
    public function group(array $fields)
    {
        $output = array();
        foreach ($fields as $name => $data) {
            if (is_array($data)) {
                list($data, $value, $class, $id) = $this->_findMainAttr($data);
                $output[] = $this->render($name, $value, $class, $id, $data);
            } else {
                $output[] = $this->render($name, $data);
            }
        }

        return implode(PHP_EOL, $output);
    }

    /**
     * Find main/required attributes in data array.
     *
     * @param array $data
     * @return array
     */
    protected function _findMainAttr(array $data)
    {
        $id = $class = $value = '';
        if (isset($data['value'])) {
            $value = $data['value'];
            unset($data['value']);
        }

        if (isset($data['class'])) {
            $class = $data['class'];
            unset($data['class']);
        }

        if (isset($data['id'])) {
            $id = $data['id'];
            unset($data['id']);
        }

        return array($data, $value, $class, $id);
    }
}
