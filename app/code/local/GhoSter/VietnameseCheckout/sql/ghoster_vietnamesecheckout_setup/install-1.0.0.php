<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

Mage::getConfig()->saveConfig('checkout/options/guest_checkout', '1', 'default', 0);

$installer->endSetup();