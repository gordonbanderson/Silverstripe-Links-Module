<?php

class LinksExtension extends DataObjectDecorator {


	
	function extraStatics() { 
      return array( 
         'belongs_many_many' => array( 
            'Links' => 'Link', 
         ) 
      ); 
   }


   public function updateCMSFields(FieldSet &$fields) {

      if (in_array($this->owner->qClassName, Link::$classesToAddLinksTo)) {
        $manager = new ManyManyDataObjectManager($this->owner, "Links", "Link", array('Title' => 'Title', 'URL' => 'URL'), "getCMSFields_forPopup");
        $manager->setPluralTitle('Links');
        $fields->addFieldToTab("Root.Content.Links", $manager);  
      }
      
   }    



	public function getFooterLinksFolder() {
		error_log("Getting footer links folder");
		return DataObject::get_one('FooterLinksFolder');
	}

}

?>
