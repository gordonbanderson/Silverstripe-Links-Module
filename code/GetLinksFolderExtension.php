<?php
namespace WebOfTalent\Links;
use SilverStripe\ORM\DataExtension;

/**
 * Get a handle on a links folder for rendering purposes
 *
 * Class LinksExtension
 * @package WebOfTalent\Links
 */
class GetLinksFolderExtension extends DataExtension
{
    /**
     * @param $slug the slug of the links folder in question, e.g. header, footer, quicklinks
     */
   public function getLinksFolder($slug)
   {
       $folder = LinksFolder::get()->filter(['Slug' => $slug])->first();
       return $folder->Links();
   }

}
