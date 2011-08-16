<?php
/**
 * Defines the Link page type
 */
class LinksFolder extends Page {
   static $db = array(
   );
  

  static $has_many = array('Links' => 'Link');

   function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->renameField("Content", "Description");

			$mng_records = new DataObjectManager(
			$this,
			'Links',
			'Link',
			array('Title' => 'Title','URL' => 'URL'),
			'getCMSFields_forPopup'
		);



		$fields->addFieldToTab('Root.Content.Links', $mng_records);

	   return $fields;
	}

}
 
class LinksFolder_Controller extends Page_Controller {
 
}
 
?>

