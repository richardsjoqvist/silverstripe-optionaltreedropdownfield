## SilverStripe OptionalTreeDropdownField

This module extends SilverStripe TreeDropdownField to allow clearing a selection.

## Requirements

* SilverStripe 3.0

## Installation ##

Drop folder into your SilverStripe project and run /dev/build

## Usage ##

$fields = new FieldList();  
$treeField = new OptionalTreeDropdownField('MyFieldID', 'My Field Title', 'SiteTree');  
$treeField->setEmptyString('(Choose)');  
$fields->push($treeField);
