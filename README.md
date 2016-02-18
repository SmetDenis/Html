# JBZoo Html  [![Build Status](https://travis-ci.org/JBZoo/Html.svg?branch=master)](https://travis-ci.org/JBZoo/Html)      [![Coverage Status](https://coveralls.io/repos/JBZoo/Html/badge.svg?branch=master&service=github)](https://coveralls.io/github/JBZoo/Html?branch=master)

#### PHP library description

[![License](https://poser.pugx.org/JBZoo/Html/license)](https://packagist.org/packages/JBZoo/Html)
[![Latest Stable Version](https://poser.pugx.org/JBZoo/Html/v/stable)](https://packagist.org/packages/JBZoo/Html) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JBZoo/Html/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/JBZoo/Html/?branch=master)

### How to use?

```php
require_once './vendor/autoload.php'; // composer autoload.php

// Get needed classes.
use JBZoo\Html\Html;
```

## Html button.
```php
// Simple button.
echo Html::_('button')->render('test', 'Button', array('title' => 'title attr'));
/**
Output
<button title="title attr" name="test" type="submit">Button</button>
 */

// Change button type.
echo Html::_('button')->render('test', 'Button', array(), 'reset');
/**
Output
<button name="test" type="reset">Button</button>
 */

// Support uikit btn.
echo Html::_('button')->render('test', 'My button', array('button' => 'success', 'class' => 'my-class'));
/**
Output
<button class="my-class uk-button uk-button-success" name="test" type="submit">My button</button>
 */

// Support uikit icon.
echo Html::_('button')->render('test', 'My button', array('button' => 'success', 'icon' => 'stop'));
/**
Output
<button name="test" class="uk-button uk-button-success" type="submit"><i class="uk-icon-stop"></i> My button</button>
 */
```

## Form boolean elements.
```php
// Radio.
echo Html::_('radiobool')->render('show', 0); // if 1 set "Yes"
/**
Output
<label for="radio-322643" class="jb-radio-lbl jb-label-0">
    <input id="radio-322643" class="jb-val-0" type="radio" name="show" value="0" checked="checked">No
</label>
<label for="radio-322643" class="jb-radio-lbl jb-label-1">
     <input id="radio-322643" class="jb-val-1" type="radio" name="show" value="1">Yes
</label>
 */

// Radio.
echo Html::_('radiobool')->render('show', 0, array('data-rel' => 'test'));
/**
Output
<label for="checkbox-270924" class="jb-checkbox-lbl jb-label-1">
     <input id="checkbox-270924" data-rel="test" class="jb-val-1" type="checkbox" name="show" value="1">Yes
</label>
*/
```

## Form checkbox/radio element.
```php
// Default template 1.
echo Html::_('checkbox')->render(array(
    'val-1',
    'val-2',
    'val-3',
), 'test', array('0', '2'), array('data-rel' => 'tooltip'));
/**
<input id="checkbox-636755" class="jb-val-0" type="checkbox" name="test" value="0" data-rel="tooltip" checked="checked">
<label for="checkbox-636755" class="jb-checkbox-lbl jb-label-0">val-1</label>
<input id="checkbox-636755" class="jb-val-1" type="checkbox" name="test" value="1" data-rel="tooltip">
<label for="checkbox-636755" class="jb-checkbox-lbl jb-label-1">val-2</label>
<input id="checkbox-636755" class="jb-val-2" type="checkbox" name="test" value="2" data-rel="tooltip" checked="checked">
<label for="checkbox-636755" class="jb-checkbox-lbl jb-label-2">val-3</label>
*/

// Default template 2 (Wrap).
echo Html::_('checkbox')->render(array(
    'val-1',
    'val-2',
    'val-3',
), 'test', array('0', '2'), array('data-rel' => 'tooltip'), true);
/**
<label for="checkbox-751930" class="jb-checkbox-lbl jb-label-0">
<input id="checkbox-751930" class="jb-val-0" type="checkbox" name="test" value="0" data-rel="tooltip" checked="checked">val-1
</label>
<label for="checkbox-751930" class="jb-checkbox-lbl jb-label-1">
<input id="checkbox-751930" class="jb-val-1" type="checkbox" name="test" value="1" data-rel="tooltip">val-2
</label>
<label for="checkbox-751930" class="jb-checkbox-lbl jb-label-2">
<input id="checkbox-751930" class="jb-val-2" type="checkbox" name="test" value="2" data-rel="tooltip" checked="checked">val-3
</label>
*/

// Custom template.
echo Html::_('checkbox')->render(array(
    "val-0" => "lbl-0",
    "val-1" => "lbl-1",
), 'test', 0, array(),
    function ($list, $name, $value, $id, $text, $attrs)
    {
        $alias    = $value;
        $inpClass = 'jb-val-' . $alias;
        $input    = $list->input($name, $value, $id, $inpClass, $attrs);
        $text     = '<span class="label-title">' . $text . '</span>';
        $label    = $list->label($id, $alias, $text);

        return implode(PHP_EOL, array($input, $label));
    }
);
/**
<input id="checkbox-930565" class="jb-val-val-0" type="checkbox" name="test" value="val-0" checked="checked">
<label for="checkbox-930565" class="jb-checkbox-lbl jb-label-val-0"><span class="label-title">lbl-0</span></label>
<input id="checkbox-930565" class="jb-val-val-1" type="checkbox" name="test" value="val-1" checked="checked">
<label for="checkbox-930565" class="jb-checkbox-lbl jb-label-val-1"><span class="label-title">lbl-1</span></label>
*/
```

## Data list.
```php
echo Html::_('datalist')->render(array('Label' => 'Content text'), array(
    'class' => 'test',
    'id' => 'custom'
));
/**
<dl class="test jb-data-list" id="custom">
    <dt title="Label">Label</dt>
    <dd>Content text</dd>
</dl>
*/
```

## Data list.
```php
echo Html::_('datalist')->render(array('Label' => 'Content text'), array(
    'class' => 'test',
    'id' => 'custom'
));
/**
<dl class="test jb-data-list" id="custom">
    <dt title="Label">Label</dt>
    <dd>Content text</dd>
</dl>
*/
```

## Form select.
```php
// Default select.
echo Html::_('select')->render($options, 'test', 'val-0', array(
    'data-attr' => 'test',
));
/**
<select data-attr="test" method="post" name="test" class="jb-select">
    <option value="val-0" class="jb-option jb-option-1" selected="selected">lbl-0</option>
    <option value="val-1" class="jb-option jb-option-2">lbl-1</option>
</select>
*/

// Multiple
echo Html::_('select')->render($options, 'test', 'val-0', array(
    'method' => 'get',
    'multiple' => true,
));
/**
<select method="get" multiple="1" name="test[]" class="jb-select">
    <option value="val-0" class="jb-option jb-option-1" selected="selected">lbl-0</option>
    <option value="val-1" class="jb-option jb-option-2">lbl-1</option>
</select>
*/
```