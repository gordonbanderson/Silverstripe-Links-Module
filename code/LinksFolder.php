<?php

use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridField;
use PageController;
/**
* Defines the Link page type.
*/
class LinksFolder extends Page
{
    public static $db = array(
    );

    public static $has_many = array('Links' => 'Link');

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->renameField('Content', 'Description');
        $gridConfig = GridFieldConfig_RelationEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'));
        $gridConfig->getComponentByType(GridFieldAddExistingAutocompleter::class)->setSearchFields(array('URL', 'Title', 'Description'));
        $gridField = new GridField('Links', 'List of Links:', $this->Links()->sort('SortOrder'), $gridConfig);
        $fields->addFieldToTab('Root.Links', $gridField);
        return $fields;
    }
}

class LinksFolder_Controller extends PageController
{
}
