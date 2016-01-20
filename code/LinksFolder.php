<?php
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
        $gridConfig->getComponentByType('GridFieldAddExistingAutocompleter')->setSearchFields(array('URL', 'Title', 'Description'));
        $gridField = new GridField('Links', 'List of Links:', $this->Links()->sort('SortOrder'), $gridConfig);
        $fields->addFieldToTab('Root.Links', $gridField);
        return $fields;
    }
}

class LinksFolder_Controller extends Page_Controller
{
}
