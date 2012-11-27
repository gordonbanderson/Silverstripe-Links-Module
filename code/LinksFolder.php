<?php
/**
 * Defines the Link page type
 */
class LinksFolder extends Page {
   static $db = array(
   );
  

  static $has_many = array('Links' => 'Link');

/*
	static $many_many_extraFields = array( 
        'Links' => array( 
                'SortOrder' => "Int" 
        )
	);
*/
   function getCMSFields() {
      $fields = parent::getCMSFields();
      $fields->renameField("Content", "Description");
      $gridConfig = GridFieldConfig_RelationEditor::create()->addComponent(new GridFieldSortableRows('SortOrder'));
      $gridConfig->getComponentByType('GridFieldAddExistingAutocompleter')->setSearchFields(array('URL', 'Title','Description'));
      //$jsInclude = new GridFieldLinkEdit();
      //$gridConfig->addComponent($jsInclude);
      $gridField = new GridField("Links", "List of Links:", $this->Links()->sort('SortOrder'), $gridConfig);
      $fields->addFieldToTab("Root.Links", $gridField);
	   return $fields;
	}

}
 
class LinksFolder_Controller extends Page_Controller {
 
}
 
?>