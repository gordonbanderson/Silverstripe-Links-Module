<?php
namespace WebOfTalent\Links;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
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
    private static $table_name = 'Link';

    private static $db = [
        'URL' => 'Text',
        'Title' => 'Text',
        'Description' => 'HTMLText',
        'LinkType' => "Enum('External,Internal')",
        'SortOrder' => 'Int',

    ];

    private static $classesToAddLinksTo = ['Page'];

    private static $has_one = [
        'LinksFolder' => 'WebOfTalent\Links\LinksFolder',
        'InternalPage' => SiteTree::class
    ];

    private static $many_many = [
        'Pages' => SiteTree::class
    ];

    public function getCMSFields()
    {

        Requirements::javascript('weboftalent/links:/javascript/linkedit.js');

        $localeField = new HiddenField('Locale');
        $localeField->setValue($this->LinksFolder()->Locale);

        $fields = new FieldList(
            new TextField('Title', 'Link title'),
            new DropdownField('LinkType', 'Internal or External Link',
                singleton('WebOfTalent\Links\Link')->dbObject('LinkType')->enumValues()
            ),

            new TextField('URL'),
            new TreeDropdownField('InternalPageID', 'Choose an internal link', SiteTree::class),
            new HTMLEditorField('Description'),
            $localeField
        );

        return $fields;
    }

    public function LoadLink()
    {
        $refreshedLink = DataObject::get_one('WebOfTalent\Links\Link', 'Link_Live.ID='.$this->ID);

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
