#Silverstripe Links Module

Enable the extension in mysite/_config.php

	Object::add_extension('SiteTree', 'LinksExtension');


This module allows you do do the following

1) Add links to columns in the footer of your page.  To do this

i) Create a page of type FooterLinksFolder
ii) Create a child page of type LinksFolder for each column
iii) Add as many links as you like to this page
iv) In your Page.ss template, add the following

    <% include FooterLinks %>

Make sure you have the same number of LinksFolder objects for the number of columns in your footer design.

2) Add links, e.g. 'Related Links' to pages in your site.

	Link::$classesToAddLinksTo = array('Article');

This will ensure that only pages of ClassName 'Article' will have a Links tab on them.