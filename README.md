#Silverstripe Links Module

##Installation

	git clone git@github.com:gordonbanderson/Silverstripe-Links-Module.git silverstripe-links

##Enable Extension

Enable the extension in mysite/_config.php

	Object::add_extension('SiteTree', 'LinksExtension');


##Features

This module allows you do do the following


###Footer Links
1) Add links to columns in the footer of your page.  To do this

i) Create a page of type FooterLinksFolder
ii) Create a child page of type LinksFolder for each column
iii) Add as many links as you like to this page
iv) In your Page.ss template, add the following

    <% include FooterLinks %>

Make sure you have the same number of LinksFolder objects for the number of columns in your footer design.  You can change the HTML output by overriding FooterLinks.ss in the Includes folder of your own theme.


###Pages of Certain Types Can Have Links Associated With Them
2) Add links, e.g. 'Related Links' to pages in your site.

	Link::$classesToAddLinksTo = array('Article');

This will ensure that only pages of ClassName 'Article' will have a Links tab on them when editing.