<?php
namespace WebOfTalent\Links;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldSortableHeader;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Forms\GridField\GridFieldPaginator;
use SilverStripe\Forms\GridField\GridFieldEditButton;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldDetailForm;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\DataExtension;

/**
 * Add links to an existing object just as a page
 *
 * Class LinksExtension
 * @package WebOfTalent\Links
 */
class LinksExtension extends DataExtension
{
    /** @var array  */
    private static $has_many = [
        'Links' => 'WebOfTalent\Links\Link'
    ];

    /** @var array  */
    private static $belongs_many_many_extraFields = [
            'Links' => [
                'SortOrder' => 'Int',
            ]
    ];

    /**
     * Render links editing in CMS
     *
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        if (in_array($this->owner->qClassName, Link::$classesToAddLinksTo)) {
            $gridFieldConfig = GridFieldConfig::create()->addComponents(
            new GridFieldToolbarHeader(),
            new GridFieldAddNewButton('toolbar-header-right'),
            new GridFieldSortableHeader(),
            new GridFieldDataColumns(),
            new GridFieldPaginator(10),
            new GridFieldEditButton(),
            new GridFieldDeleteAction(),
            new GridFieldDetailForm()
            );

            $gridField = new GridField('Links', 'List of Links:', $this->Links(), $gridFieldConfig);
            $fields->addFieldToTab('Root.Links', $gridField);
        }
    }

}
