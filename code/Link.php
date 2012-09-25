<?php
/**
 * Defines the Link page type
 */
class Link extends DataObject {
	static $db = array(
		'URL' => 'Text',
		'Title' => 'Text',
		'Description' => 'HTMLText',
		"LinkType" => "Enum('External,Internal')",
	);


	static $classesToAddLinksTo = array('Page');


	static $has_one = array(
		'LinksFolder' => 'LinksFolder',
		'InternalPage' => 'SiteTree'
	);

	public static $many_many = array(
		"Pages" => "SiteTree"
	);


	function getRequirementsForPopup() {
		Requirements::javascript( 'silverstripe-links/javascript/linkedit.js' );
	}


	function getCMSFields_forPopup() {

		$localeField = new HiddenField('Locale');
		$localeField->setValue($this->LinksFolder()->Locale);


		$fields = new FieldSet(
			new TextField('Title'),
			new DropdownField( 'LinkType', 'Internal or External Link',
				singleton('Link')->dbObject( 'LinkType' )->enumValues()
			),

			new TextField('URL'),
			new LiveDropdownField( "InternalPageID", "Choose an internal link", "SiteTree" ),
			new SimpleTinyMCEField( 'Description' ),
			$localeField
		);

		return $fields;
	}


	function LoadLink() {
		$refreshedLink = DataObject::get_one( "Link", "Link_Live.ID=".$this->ID );
		return $refreshedLink->URL;
	}


	function getWebsiteAddress() {
		$result = $this->URL;

		if ( $this->LinkType == 'Internal' ) {
			$targetPage = DataObject::get_by_id( 'Page', $this->InternalPageID );
			if ( $targetPage ) {
				$result = $targetPage->Link();
			} else {
				$result = '#';
			}
		}

		if ( !$result ) {
			$result =  '#';
		}
		return $result;
	}

}

?>