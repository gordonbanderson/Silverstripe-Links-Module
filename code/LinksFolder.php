<?php
namespace WebOfTalent\Links;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridField;
use PageController;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

/**
* Defines the Link page type.
*/
class LinksFolder extends DataObject
{
    private static $table_name = 'LinksFolder';

    private static $db = [
        'Slug' => 'Varchar(255)'
    ];

    private static $has_many = [
        'Links' => 'WebOfTalent\Links\Link']
    ;

    private static $summary_fields = ['Slug'];

    /**
     * Render the model admin
     *
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Slug')
        ]);

        $gridConfig = GridFieldConfig_RelationEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'));
        $gridConfig->getComponentByType(GridFieldAddExistingAutocompleter::class)->setSearchFields(array('URL', 'Title', 'Description'));
        $gridField = new GridField('Links', 'List of Links:', $this->Links()->sort('SortOrder'), $gridConfig);
        $fields->addFieldToTab('Root.Links', $gridField);
        return $fields;
    }

}

