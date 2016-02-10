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

namespace PHPSTORM_META {
    /** @noinspection PhpUnusedLocalVariableInspection */
    /** @noinspection PhpIllegalArrayKeyTypeInspection */
    $STATIC_METHOD_TYPES = [
        \JBZoo\Html\Html::_('') => [
            'input'     instanceof \JBZoo\Html\Render\Input,
            'select'    instanceof \JBZoo\Html\Render\Select,
            'hidden'    instanceof \JBZoo\Html\Render\Hidden,
            'tag'       instanceof \JBZoo\Html\Render\Tag,
            'text'      instanceof \JBZoo\Html\Render\Text,
            'textarea'  instanceof \JBZoo\Html\Render\TextArea,
            'iframe'    instanceof \JBZoo\Html\Render\Iframe,
        ],
    ];
}
