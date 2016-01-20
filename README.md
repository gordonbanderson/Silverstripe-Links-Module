# Links Manager
[![Build Status](https://travis-ci.org/gordonbanderson/Silverstripe-Links-Module.svg?branch=master)](https://travis-ci.org/gordonbanderson/Silverstripe-Links-Module)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gordonbanderson/Silverstripe-Links-Module/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/Silverstripe-Links-Module/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/gordonbanderson/Silverstripe-Links-Module/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/Silverstripe-Links-Module/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/gordonbanderson/Silverstripe-Links-Module/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gordonbanderson/Silverstripe-Links-Module/build-status/master)
[![codecov.io](https://codecov.io/github/gordonbanderson/Silverstripe-Links-Module/coverage.svg?branch=master)](https://codecov.io/github/gordonbanderson/Silverstripe-Links-Module?branch=master)

[![Latest Stable Version](https://poser.pugx.org/weboftalent/links/version)](https://packagist.org/packages/weboftalent/links)
[![Latest Unstable Version](https://poser.pugx.org/weboftalent/links/v/unstable)](//packagist.org/packages/weboftalent/links)
[![Total Downloads](https://poser.pugx.org/weboftalent/links/downloads)](https://packagist.org/packages/weboftalent/links)
[![License](https://poser.pugx.org/weboftalent/links/license)](https://packagist.org/packages/weboftalent/links)
[![Monthly Downloads](https://poser.pugx.org/weboftalent/links/d/monthly)](https://packagist.org/packages/weboftalent/links)
[![Daily Downloads](https://poser.pugx.org/weboftalent/links/d/daily)](https://packagist.org/packages/weboftalent/links)

[![Dependency Status](https://www.versioneye.com/php/weboftalent:links/badge.svg)](https://www.versioneye.com/php/weboftalent:links)
[![Reference Status](https://www.versioneye.com/php/weboftalent:links/reference_badge.svg?style=flat)](https://www.versioneye.com/php/weboftalent:links/references)

![codecov.io](https://codecov.io/github/gordonbanderson/Silverstripe-Links-Module/branch.svg?branch=master)

## Maintainers

* Gordon Anderson (Nickname: nontgor)
	<gordon.b.anderson@gmail.com>

##Introduction

This module provides a facility for adding and editing links on any DataObject.
It could be used for example in providing related links on a blog article.
 
##Installation
```bash
composer require "weboftalent/links:~4"
```
##Usage
A Links tab now exists for all SiteTree pages.  If links need to be added to any
other DataObject simply add the `LinksExtension` using the normal method.

##Requirements
* SilverStripe 3.1 or 3.2
