<?php
// make links sortable
//SortableDataObject::add_sortable_class('Link');

// enabled the extension, need the FooterLinksFolder method to be available
Object::add_extension('SiteTree', 'LinksExtension');

//define global path to Components' root folder
if(!defined('LINK_EDIT_TOOLS_PATH'))
{
	define('LINK_EDIT_TOOLS_PATH', rtrim(basename(dirname(__FILE__))));
}
?>
