# JBZoo Html  [![Build Status](https://travis-ci.org/JBZoo/Html.svg?branch=master)](https://travis-ci.org/JBZoo/Html)      [![Coverage Status](https://coveralls.io/repos/JBZoo/Html/badge.svg?branch=master&service=github)](https://coveralls.io/github/JBZoo/Html?branch=master)

#### PHP library description
JBHtml needed to make HTML-related options easier, faster, and more resilient to change. Using this library will enable your application to be more light on its feet, and more flexible on where it is placed in relation to the root of a domain.

[![License](https://poser.pugx.org/JBZoo/Html/license)](https://packagist.org/packages/JBZoo/Html)
[![Latest Stable Version](https://poser.pugx.org/JBZoo/Html/v/stable)](https://packagist.org/packages/JBZoo/Html) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JBZoo/Html/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/JBZoo/Html/?branch=master)
### How to use?
```php
require_once './vendor/autoload.php'; // composer autoload.php

// Get needed classes
use JBZoo\Html\Html;
```
## 1# Html button
#### 1.1 Simple button
```php
echo Html::_('button')->render('test', 'Button', array('title' => 'title attr'));
```

```html
<button title="title attr" name="test" type="submit">Button</button>
```
#### 1.2 Change button type
```php
echo Html::_('button')->render('test', 'Button', array(), 'reset');
```
#### Output
```html
<button name="test" type="reset">Button</button>
```
#### 1.3 Support Uikit CSS Framework button
```php
echo Html::_('button')->render('test', 'My button', array(
    'button' => 'success',
    'class'  => 'my-class',
));
```
#### Output
```html
<button class="my-class uk-button uk-button-success" name="test" type="submit">
    My button
</button>
```
#### 1.4 Support Uikit CSS Framework icon
```php
echo Html::_('button')->render('test', 'My button', array(
    'button' => 'success',
    'icon'   => 'stop',
));
```
#### Output
```html
<button name="test" class="uk-button uk-button-success" type="submit">
    <i class="uk-icon-stop"></i> My button
</button>
```
------------------------------------------------------------------------------------------------------------------------
## 2# Form boolean elements
#### 2.1 Output radio
```php
echo Html::_('radiobool')->render('show', 0);  // if 1 default set "Yes"
```
#### Output
```html
<label for="radio-322643" class="jb-radio-lbl jb-label-0">
    <input id="radio-322643" class="jb-val-0" type="radio" name="show" value="0" checked="checked">No
</label>
<label for="radio-322643" class="jb-radio-lbl jb-label-1">
    <input id="radio-322643" class="jb-val-1" type="radio" name="show" value="1">Yes
</label>
```
#### 2.2 Output checkbox
```php
echo Html::_('checkbool')->render('show', 0, array(
    'data-rel'   => 'tooltip',
    'data-title' => 'Checkbox title',
));
```
#### Output
```html
<label for="checkbox-270924" class="jb-checkbox-lbl jb-label-1">
     <input id="checkbox-270924" data-rel="tooltip" data-title="Checkbox title" class="jb-val-1" type="checkbox" name="show" value="1">Yes
</label>
```
------------------------------------------------------------------------------------------------------------------------
## 3# Form checkbox/radio elements
#### 3.1 Default checkbox template (No wrap)
```php
echo Html::_('checkbox')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', array('val-1', 'val-3'), array('data-rel' => 'tooltip'));
```
#### Output
```html
<input id="checkbox-405099" class="jb-val-val-1" type="checkbox" name="test" value="val-1" data-rel="tooltip" checked="checked">
<label for="checkbox-405099" class="jb-checkbox-lbl jb-label-val-1">Label 1</label>
<input id="checkbox-405099" class="jb-val-val-2" type="checkbox" name="test" value="val-2" data-rel="tooltip">
<label for="checkbox-405099" class="jb-checkbox-lbl jb-label-val-2">Custom Label</label>
<input id="checkbox-405099" class="jb-val-val-3" type="checkbox" name="test" value="val-3" data-rel="tooltip" checked="checked">
<label for="checkbox-405099" class="jb-checkbox-lbl jb-label-val-3">Var 3</label>
```
#### 3.2 Default wrap checkbox template
```php
echo Html::_('checkbox')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', array('val-1', 'val-3'), array('data-rel' => 'tooltip'));
```
#### Output
```html
<label for="checkbox-301932" class="jb-checkbox-lbl jb-label-val-1">
    <input id="checkbox-301932" class="jb-val-val-1" type="checkbox" name="test" value="val-1" checked="checked">Label 1
</label>
<label for="checkbox-301932" class="jb-checkbox-lbl jb-label-val-2">
    <input id="checkbox-301932" class="jb-val-val-2" type="checkbox" name="test" value="val-2">Custom Label
</label>
<label for="checkbox-301932" class="jb-checkbox-lbl jb-label-val-3">
    <input id="checkbox-301932" class="jb-val-val-3" type="checkbox" name="test" value="val-3" checked="checked">Var 3
</label>
```
#### 3.3 Custom checkbox template
```php
echo Html::_('checkbox')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', 'val-1', array(),
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
```
#### Output
```html
<input id="checkbox-491721" class="jb-val-val-1" type="checkbox" name="test" value="val-1" checked="checked">
<label for="checkbox-491721" class="jb-checkbox-lbl jb-label-val-1">
    <span class="label-title">Label 1</span>
</label>
<input id="checkbox-491721" class="jb-val-val-2" type="checkbox" name="test" value="val-2">
<label for="checkbox-491721" class="jb-checkbox-lbl jb-label-val-2">
    <span class="label-title">Custom Label</span>
</label>
<input id="checkbox-491721" class="jb-val-val-3" type="checkbox" name="test" value="val-3">
<label for="checkbox-491721" class="jb-checkbox-lbl jb-label-val-3">
    <span class="label-title">Var 3</span>
</label>
```
#### 3.3 Default checkbox template (No wrap)
```php
echo Html::_('radio')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', array('val-1', 'val-3'), array('data-rel' => 'tooltip'));
```
#### Output
```html
<input id="radio-170734" class="jb-val-val-1" type="radio" name="test" value="val-1" data-rel="tooltip">
<label for="radio-170734" class="jb-radio-lbl jb-label-val-1">Label 1</label>
<input id="radio-170734" class="jb-val-val-2" type="radio" name="test" value="val-2" data-rel="tooltip">
<label for="radio-170734" class="jb-radio-lbl jb-label-val-2">Custom Label</label>
<input id="radio-170734" class="jb-val-val-3" type="radio" name="test" value="val-3" data-rel="tooltip" checked="checked">
<label for="radio-170734" class="jb-radio-lbl jb-label-val-3">Var 3</label>
```
#### 3.4 Default wrap checkbox template
```php
echo Html::_('radio')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', 'val-1', array(), true);
```
#### Output
```html
<label for="radio-336365" class="jb-radio-lbl jb-label-val-1">
    <input id="radio-336365" class="jb-val-val-1" type="radio" name="test" value="val-1" checked="checked">Label 1
</label>
<label for="radio-336365" class="jb-radio-lbl jb-label-val-2">
    <input id="radio-336365" class="jb-val-val-2" type="radio" name="test" value="val-2">Custom Label
</label>
<label for="radio-336365" class="jb-radio-lbl jb-label-val-3">
    <input id="radio-336365" class="jb-val-val-3" type="radio" name="test" value="val-3">Var 3
</label>
```
#### 3.5 Custom radio template
```php
echo Html::_('radio')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', 'val-1', array(),
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
```
#### Output
```html
<input id="radio-491721" class="jb-val-val-1" type="radio" name="test" value="val-1" checked="checked">
<label for="radio-491721" class="jb-radio-lbl jb-label-val-1">
    <span class="label-title">Label 1</span>
</label>
<input id="radio-491721" class="jb-val-val-2" type="radio" name="test" value="val-2">
<label for="radio-491721" class="jb-radio-lbl jb-label-val-2">
    <span class="label-title">Custom Label</span>
</label>
<input id="radio-491721" class="jb-val-val-3" type="radio" name="test" value="val-3">
<label for="radio-491721" class="jb-radio-lbl jb-label-val-3">
    <span class="label-title">Var 3</span>
</label>
```
#### 3.5 No exit checked element
```php
echo Html::_('radio')->render(array(
    'val-1' => 'Label 1',
    'val-2' => 'Custom Label',
    'val-3' => 'Var 3',
), 'test', 'val-8', array(), true);
```
#### Output
```html
<label for="radio-336365" class="jb-radio-lbl jb-label-val-1">
    <input id="radio-336365" class="jb-val-val-1" type="radio" name="test" value="val-1">Label 1
</label>
<label for="radio-336365" class="jb-radio-lbl jb-label-val-2">
    <input id="radio-336365" class="jb-val-val-2" type="radio" name="test" value="val-2">Custom Label
</label>
<label for="radio-336365" class="jb-radio-lbl jb-label-val-3">
    <input id="radio-336365" class="jb-val-val-3" type="radio" name="test" value="val-3">Var 3
</label>
<label for="radio-706898" class="jb-radio-lbl jb-label-no-exits">
    <input id="radio-706898" class="jb-val-no-exits" type="radio" name="test" value="no-exits" checked="checked">No exits
</label>
```
------------------------------------------------------------------------------------------------------------------------
## 3# Data list
```php
echo Html::_('datalist')->render(
    array(
        'Label' => 'Content text',
        'Custom label' => 'List text',
    ),
    array(
        'class' => 'test',
        'id' => 'custom',
    )
);
```
#### Output
```html
<dl class="test jb-data-list" id="custom">
    <dt title="Label">Label</dt>
    <dd>Content text</dd>
    <dt title="Custom label">Custom label</dt>
    <dd>List text</dd>
</dl>
```
------------------------------------------------------------------------------------------------------------------------
## 4# Html form select
#### 4.1 Default select
```php
echo Html::_('select')->render(array(
    'val-1'  => 'Label 1',
    'test'   => 'Label test',
    'custom' => 'Custom',
), 'test', 'custom', array(
    'data-title' => 'My form select',
));
```
#### Output
```html
<select data-title="My form select" method="post" name="test" class="jb-select">
    <option value="val-1" class="jb-option jb-option-1">Label 1</option>
    <option value="test" class="jb-option jb-option-2">Label test</option>
    <option value="custom" class="jb-option jb-option-3" selected="selected">Custom</option>
</select>
```
#### 4.1 Multiple select
```php
echo Html::_('select')->render(array(
    'val-1'  => 'Label 1',
    'test'   => 'Label test',
    'custom' => 'Custom',
    'simple' => 'Simple label',
    'moscow' => 'Moscow',
), 'test', array(
    'test',
    'moscow',
), array(
    'method' => 'get',
    'multiple' => true,
));
```
#### Output
```html
<select method="get" multiple="1" name="test[]" class="jb-select">
    <option value="val-1" class="jb-option jb-option-1">Label 1</option>
    <option value="test" class="jb-option jb-option-2" selected="selected">Label test</option>
    <option value="custom" class="jb-option jb-option-3">Custom</option>
    <option value="simple" class="jb-option jb-option-4">Simple label</option>
    <option value="moscow" class="jb-option jb-option-5" selected="selected">Moscow</option>
</select>
```
#### 4.3 Selected option not found
```php
/**
 * If selected params is array. For check selected option taken last array var.
 * If option no exits, created new option. See output.
 */
echo Html::_('select')->render(array(
    'val-1'  => 'Label 1',
    'test'   => 'Label test',
    'custom' => 'Custom',
    'simple' => 'Simple label',
    'moscow' => 'Moscow',
), 'test', array(
        'test',
        'moscow',
        'no-value',
    )
);
```
```html
<select method="post" name="test" class="jb-select">
    <option value="no-value" class="jb-option jb-option-6" selected="selected">--No selected--</option>
    <option value="val-1" class="jb-option jb-option-1">Label 1</option>
    <option value="test" class="jb-option jb-option-2">Label test</option>
    <option value="custom" class="jb-option jb-option-3">Custom</option>
    <option value="simple" class="jb-option jb-option-4">Simple label</option>
    <option value="moscow" class="jb-option jb-option-5">Moscow</option>
</select>
```
------------------------------------------------------------------------------------------------------------------------
## 5# Html form hidden
#### 5.1 Single hidden input
```php
echo Html::_('hidden')->render('image', 'my-value', 'my-class', 'unique', array(
    'data-profile' => 'user-1'
));
```
#### Output
```html
<input data-profile="user-1" id="unique" class="jb-input-hidden my-class" name="image" value="my-value" type="hidden">
```
#### 5.2 Group hidden inputs
```php
echo Html::_('hidden')->group(array(
    'my-name' => 'My name value',
    'user'    => 'Administrator',
    'array'   => array(
        'value' => 'my value',
        'class' => 'array-hidden',
        'id'    => 'hide-id',
    ),
));
```
#### Output
```html
<input class="jb-input-hidden" name="my-name" value="My name value" type="hidden">
<input class="jb-input-hidden" name="user" value="Administrator" type="hidden">
<input id="hide-id" class="jb-input-hidden array-hidden" name="array" value="my value" type="hidden">
```
------------------------------------------------------------------------------------------------------------------------
## 6# Html Iframe
```php
echo Html::_('iframe')->render('http://my-site.com/page', 'my-class', 'my-id', array(
    'data-rel' => 'my-iframe',
));
```
#### Output
```html
<iframe data-rel="my-iframe" frameborder="0" src="http://my-site.com/page" id="my-id" class="my-class"></iframe>
```
------------------------------------------------------------------------------------------------------------------------
## 7# Html textarea
```php
echo Html::_('textarea')->render('test', 'Text area content', 'my-class', 'my-id', array(
    'data-rel'   => 'tooltip',
    'data-title' => 'Enter description',
));
```
#### Output
```html
<textarea data-rel="tooltip" data-title="Enter description" name="test" id="my-id" class="my-class">
Text area content
</textarea>
```
------------------------------------------------------------------------------------------------------------------------
## 7# Custom tag
```php
echo Html::_('tag')->render('My content', 'custom-class', 'unique', array(
    'tag' => 'div',
    'title' => 'Custom title'
));
```
#### Output
```html
<div title="Custom title" id="unique" class="custom-class">My content</div>
```