<?php
/**
 * Defines the Link page type
 */
class FooterLinksFolder extends Page {
	static $db = array(
	);

  	// a footer links folder shall contain links folders - these will be rendered as columns in the footer
	static $allowed_children = array('LinksFolder');

	static $defaults = array( 
    	'ShowInMenus' => 0,
    	'ShowInSearch' => 0
    );


}
 
class FooterLinksFolder_Controller extends Page_Controller {
 
}
 
?>

