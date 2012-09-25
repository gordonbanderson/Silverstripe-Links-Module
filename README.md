#Installation

	git clone git@github.com:gordonbanderson/Silverstripe-Links-Module.git silverstripe-links
	git checkout -b stable24


#Features

This module allows you do do the following


##Footer Links
1) Add links to columns in the footer of your page.  To do this

* Create a page of type FooterLinksFolder
* Create a child page of type LinksFolder for each column
* Add as many links as you like to this page
* In your Page.ss template, add the following

    <% include FooterLinks %>

Make sure you have the same number of LinksFolder objects for the number of columns in your footer design.  You can change the HTML output by overriding FooterLinks.ss in the Includes folder of your own theme.


##Pages of Certain Types Can Have Links Associated With Them
2) Add links, e.g. 'Related Links' to pages in your site.

	Link::$classesToAddLinksTo = array('Article');

This will ensure that only pages of ClassName 'Article' will have a Links tab on them when editing.

# Silverstripe Version Compatibility
2.4 only (tested with 2.4.5+) - stable24 branch