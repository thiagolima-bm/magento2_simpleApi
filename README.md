## Acaldeira SimpleAPI

Magento 2 Acaldeira SimpleAPI Module

Description
-----------
This module shows how Magento 2 API works. 

Compatibility
-------------
- Magento >= 2.0

This library aims to support and is tested against the following PHP
implementations:

* PHP 7.0

Installation Instructions
-------------------------
Install using composer by adding to your composer file using commands:

1. extract the extension
2. update composer.json
 
    2.1 add require 
    
        "acaldeira/simpleapi": "*"
    
    2.2 add repositories 
    
        {
            "type": "path",
            "url": "acmodules/simpleapi"
        }
    
3. composer update
4. bin/magento setup:upgrade

Testing Instructions
-------------------------

        GET 
            http://mymagentourl/rest/V1/simpleApi/product/:productId
        
        POST 
            http://mymagentourl/rest/V1/simpleApi/product/calculateCost
        
            body {"options": {"productId": 100, "country": "US", "region": "New York", "postcode": "10010"}}

Support
-------

Credits
---------

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

License
-------
Respect the [Magento][] OSL license, which is included in this codebase.

[magento]: Magento2_LICENSE.md

Copyright
---------
Copyright (c) 2017 Acaldeira.