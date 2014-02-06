<?php

class LinksExtension extends DataExtension {

  static $belongs_many_many = array( 'Links' => 'Link' );

  static $belongs_many_many_extraFields = array(
    'Links' => array(
      'SortOrder' => "Int"
    )
  );


  /* Edit links */
  public function updateCMSFields( FieldList $fields ) {
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
        $gridField = new GridField("Links", "List of Links:", $this->owner->Links(), $gridFieldConfig);
        $fields->addFieldToTab("Root.Links", $gridField);
    }
}
