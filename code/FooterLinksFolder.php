<?php
/**
* Defines the Link page type.
*/
class FooterLinksFolder extends Page
{
    public static $db = array();

    // a footer links folder shall contain links folders - these will be rendered as columns in the footer
    public static $allowed_children = array('LinksFolder');

    public static $defaults = array(
        'ShowInMenus' => 0,
        'ShowInSearch' => 0,
    );
}

class FooterLinksFolder_Controller extends Page_Controller
{
}
