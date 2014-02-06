<?php

/*
Methods require to access links from any page on the site - this needs added to SiteTree
*/
class LinksUtilExtension extends DataExtension {

  public function getFooterLinksFolder() {
    return DataObject::get_one( 'FooterLinksFolder' );
  }

  public function LinksFolderForSlot($slotname) {
    error_log('+++++++++++++++++++++++++++++++++++++ slot for links folder '+$slotname);
    return LinksFolder::get()->filter('SlotName',$slotname) -> first();
  }

}
