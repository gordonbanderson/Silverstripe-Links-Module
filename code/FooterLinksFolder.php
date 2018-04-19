<?php
namespace WebOfTalent\Links;

use PageController;
/**
* Defines the Link page type.
*/
class FooterLinksFolder extends \Page
{
    private static $db = array();

    // a footer links folder shall contain links folders - these will be rendered as columns in the footer
    private static $allowed_children = array('LinksFolder');

    private static $defaults = array(
        'ShowInMenus' => 0,
        'ShowInSearch' => 0,
    );
}

class FooterLinksFolder_Controller extends PageController
{
}
