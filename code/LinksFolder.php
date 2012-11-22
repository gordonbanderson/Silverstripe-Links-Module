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


		$gridFieldConfig = GridFieldConfig::create()->addComponents(
          new GridFieldToolbarHeader(),
          new GridFieldAddNewButton('toolbar-header-right'),
          new GridFieldSortableHeader(),
          new GridFieldDataColumns(),
          new GridFieldPaginator(10),
          new GridFieldEditButton(),
          new GridFieldDeleteAction('unlinkRelation'),
          new GridFieldDetailForm()
//          new GridFieldBulkEditingTools()
        );

        $gridField = new GridField("Links", "List of Links:", $this->Links()->sort('SortOrder'), $gridFieldConfig);
        $fields->addFieldToTab("Root.Links", $gridField);



		//$fields->addFieldToTab('Root.Content.Links', $mng_records);

	   return $fields;
	}

}
 
class LinksFolder_Controller extends Page_Controller {
 
}
 
?>