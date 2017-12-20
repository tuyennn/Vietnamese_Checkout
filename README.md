# GhoSter Vietnamese Checkout - Magento 1
---
Allows vietnamese customer checkout in magento site with 3 steps

Facts
-----
- version: 1.0.0
- extension key: GhoSter_VietnameseCheckout
- [extension on GitHub](https://github.com/tuyennn/Vietnamse_Checkout)
- [direct download link](https://github.com/tuyennn/Vietnamse_Checkout/tarball/master)

Description
-----------
This extension provide 3-steps checkout which is popular in Vietnam: 1- Login, Register; 2- Select Shipping Address or add new; 3- Select Shipping, Billing Method.
It displays progress bar on top of checkout page, extension was extended almost from magento onepage checkout


This extension have autoshipping function which folk from [IntegerNet_Autoshipping](https://github.com/integer-net/Autoshipping).
It displays the shipping costs on the shopping cart page even if you haven't entered an address yet. It takes the
target country from the configuration.
If there is more than one allowed country, a dropdown is available on the shopping cart page which allow the
customer to change the target country.
You can now exclude shipping methods by configuration (useful for pickup for example)

Requirements
------------
- PHP >= 5.2.0
- Mage_Core
- Mage_Checkout
- RWD theme
- Default theme(Untested)

Compatibility
-------------
- Magento CE >= 1.4

Installation Instructions
-------------------------
1. Clone the module and copy into your document root.
2. Clear the cache, logout from the admin panel and then login again.
3. Configure and activate the extension under System - Configuration - Sales - Vietnamese Checkout.

Uninstallation
--------------
1. Remove all extension files from your Magento installation

Screenshot
--------------
![Alt Screenshot-1](https://thinghost.info/wp-content/uploads/2017/10/Selection_087.png "thinghost.info")
![Alt Screenshot-2](https://thinghost.info/wp-content/uploads/2017/10/Selection_088.png "thinghost.info")
![Alt Screenshot-3](https://thinghost.info/wp-content/uploads/2017/10/Selection_090.png "thinghost.info")
![Alt Screenshot-4](https://thinghost.info/wp-content/uploads/2017/10/Selection_091.png "thinghost.info")
![Alt Screenshot-5](https://thinghost.info/wp-content/uploads/2017/10/Selection_092.png "thinghost.info")
![Alt Screenshot-6](https://thinghost.info/wp-content/uploads/2017/10/Selection_093.png "thinghost.info")
![Alt Screenshot-7](https://thinghost.info/wp-content/uploads/2017/10/Selection_094.png "thinghost.info")


Licence
-------
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
