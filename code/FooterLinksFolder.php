<?php
/**
 * Defines the Link page type
 */
class FooterLinksFolder extends Page {

	// A footer links folder shall contain links folders -
	// these will be rendered as columns in the footer
	static $allowed_children = array('LinksFolder');

	static $defaults = array(
		'ShowInMenus' => 0,
		'ShowInSearch' => 0
	);

	private static $icon = 'weboftalent-links/icons/link.png';
}

class FooterLinksFolder_Controller extends Page_Controller {

}
