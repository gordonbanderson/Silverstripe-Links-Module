<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\View\Requirements;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
/**
 * Defines the Link page type.
 */
class Link extends DataObject
{
    public static $db = array(
        'URL' => 'Text',
        'Title' => 'Text',
        'Description' => 'HTMLText',
        'LinkType' => "Enum('External,Internal')",
        'SortOrder' => 'Int',

    );

    public static $classesToAddLinksTo = array('Page');

    public static $has_one = array(
        'LinksFolder' => 'LinksFolder',
        'InternalPage' => SiteTree::class,
    );

    public static $many_many = array(
        'Pages' => SiteTree::class,
    );

    public function getCMSFields()
    {
        Requirements::javascript(LINK_EDIT_TOOLS_PATH.'/javascript/linkedit.js');

        $localeField = new HiddenField('Locale');
        $localeField->setValue($this->LinksFolder()->Locale);

        $fields = new FieldList(
            new TextField('Title', 'Link title'),
            new DropdownField('LinkType', 'Internal or External Link',
                singleton('Link')->dbObject('LinkType')->enumValues()
            ),

            new TextField('URL'),
            new TreeDropdownField('InternalPageID', 'Choose an internal link', SiteTree::class),
            new HtmlEditorField('Description'),
            $localeField
        );

        return $fields;
    }

    public function LoadLink()
    {
        $refreshedLink = DataObject::get_one('Link', 'Link_Live.ID='.$this->ID);

        return $refreshedLink->URL;
    }

    public function getWebsiteAddress()
    {
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
            $result = '#';
        }

        return $result;
    }
}
