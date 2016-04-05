## SilverStripe OptionalTreeDropdownField

This module extends SilverStripe TreeDropdownField to allow clearing a selection.

## Requirements

* SilverStripe 3.1 (or higher)

## Installation ##

1. Run `composer require richardsjoqvist/silverstripe-optionaltreedropdownfield`
1. Run `sake /dev/build`

## Usage ##

```php
$fields = new FieldList();  
$treeField = new OptionalTreeDropdownField('MyFieldID', 'My Field Title', 'SiteTree');  
$treeField->setEmptyString('No page');
$fields->push($treeField);
```
