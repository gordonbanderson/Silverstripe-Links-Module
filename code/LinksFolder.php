<?php
/**
 * Defines the Link page type
 */
class LinksFolder extends Page {
  static $db = array(
    'SlotName' => 'Varchar(255)'
  );

  private static $icon = 'weboftalent-links/icons/link.png'; 



  static $has_many = array( 'Links' => 'Link' );

  function getCMSFields() {
    $fields = parent::getCMSFields();
    $nameField = new TextField('SlotName', _t('Link.SLOT_NAME', 'Name of the slot on the page where these links will appear'));
    $fields->addFieldToTab('Root.PageSlot', $nameField);
    $fields->renameField( "Content", "Description" );
    $gridConfig = GridFieldConfig_RelationEditor::create()->addComponent( new GridFieldSortableRows( 'SortOrder' ) );
    $gridConfig->getComponentByType( 'GridFieldAddExistingAutocompleter' )->setSearchFields( array( 'URL', 'Title', 'Description' ) );
    $gridField = new GridField( "Links", "List of Links:", $this->Links()->sort( 'SortOrder' ), $gridConfig );
    $fields->addFieldToTab( "Root.Links", $gridField );
    return $fields;
  }

}

class LinksFolder_Controller extends Page_Controller {

}

?>