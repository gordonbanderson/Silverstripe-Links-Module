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
		'SortOrder' => 'Int'

	);


	static $classesToAddLinksTo = array('Page');


	static $has_one = array(
		'LinksFolder' => 'LinksFolder',
		'InternalPage' => 'SiteTree'
	);

	public static $many_many = array(
		"Pages" => "SiteTree"
	);


	public function getCMSFields() {
		Requirements::javascript(LINK_EDIT_TOOLS_PATH . '/javascript/linkedit.js');

		$localeField = new HiddenField('Locale');
		$localeField->setValue($this->LinksFolder()->Locale);

		$fields = new FieldList(
			new TextField('Title', 'Link title'),
			new DropdownField('LinkType', 'Internal or External Link',
				singleton('Link')->dbObject('LinkType')->enumValues()
			),

			new TextField('URL'),
			new TreeDropdownField("InternalPageID", "Choose an internal link", "SiteTree"),
			new HtmlEditorField('Description'),
			$localeField
		);

		return $fields;
	}


	function LoadLink() {
		$refreshedLink = DataObject::get_one("Link", "Link_Live.ID=".$this->ID);
		return $refreshedLink->URL;
	}


	function getWebsiteAddress() {
		$result = $this->URL;

		if ($this->LinkType == 'Internal') {
			$targetPage = DataObject::get_by_id('Page', $this->InternalPageID);
			if ($targetPage) {
				$result = $targetPage->Link();
			} else {
				$result = '#';
			}
		}

		if (!$result) {
			$result =  '#';
		}
		return $result;
	}

}

?>