<?php
namespace WebOfTalent\Links;

use SilverStripe\Admin\ModelAdmin;

class LinksFolderModelAdmin extends ModelAdmin
{
    private static $managed_models = [
        'WebOfTalent\Links\LinksFolder',
    ];

    private static $url_segment = 'linksfolders';

    private static $menu_title = 'Links Folders';

    private static $menu_icon = 'weboftalent/links: /icons/link-icon.png';
}
