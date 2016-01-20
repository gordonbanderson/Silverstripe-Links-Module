<?php

class LinksExtension extends DataExtension
{
    public static $belongs_many_many = array('Links' => 'Link');

    public static $belongs_many_many_extraFields = array(
            'Links' => array(
            'SortOrder' => 'Int',
        )
    );

    public function updateCMSFields(FieldList $fields)
    {
        if (in_array($this->owner->qClassName, Link::$classesToAddLinksTo)) {
            $gridFieldConfig = GridFieldConfig::create()->addComponents(
            new GridFieldToolbarHeader(),
            new GridFieldAddNewButton('toolbar-header-right'),
            new GridFieldSortableHeader(),
            new GridFieldDataColumns(),
            new GridFieldPaginator(10),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(),
            new GridFieldDetailForm()
            );

            $gridField = new GridField('Links', 'List of Links:', $this->Links(), $gridFieldConfig);
            $fields->addFieldToTab('Root.Links', $gridField);
        }
    }

    public function getFooterLinksFolder()
    {
        return DataObject::get_one('FooterLinksFolder');
    }
}
