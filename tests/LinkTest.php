<?php

use SilverStripe\Dev\SapphireTest;

class LinkTest extends SapphireTest
{
    public function testGetCMSFields()
    {
        $link = new Link();
        $fields = $link->getCMSFields();
        //$tab = $fields->findOrMakeTab('Root');
        //$fields = $tab->fieldList();
        $names = array();
        foreach ($fields as $field) {
            array_push($names, $field->getName());
        }
        $expected = array('Title', 'LinkType', 'URL', 'InternalPageID',
            'Description', 'Locale');
        $this->assertEquals($expected, $names);
    }

    public function testLoadLink()
    {
        $this->markTestSkipped('TODO');
    }

    public function testGetWebsiteAddress()
    {
        $this->markTestSkipped('TODO');
    }
}
