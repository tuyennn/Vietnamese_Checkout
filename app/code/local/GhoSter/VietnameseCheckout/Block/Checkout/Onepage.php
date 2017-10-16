<?php
class GhoSter_VietnameseCheckout_Block_Checkout_Onepage extends Mage_Checkout_Block_Onepage {

    /**
     * Get checkout steps codes
     *
     * @return array
     */
    protected function _getStepCodes()
    {
        if(Mage::getStoreConfigFlag('vietnamesecheckout/checkout_settings/enabled')) {
            return array('login', 'billing',  'shipping_payment');
        } else {
            return parent::_getStepCodes();
        }
    }

}