<?php

class GhoSter_VietnameseCheckout_Block_ShipAndPay extends Mage_Checkout_Block_Onepage_Abstract
{
    protected function _construct()
    {
        $this->getCheckout()->setStepData('shipping_payment', array(
            'label'     => $this->__('Shipping & Payment'),
            'is_show'   => $this->isShow()
        ));
        parent::_construct();
    }

    /**
     * Retrieve is allow and show block
     *
     * @return bool
     */
    public function isShow()
    {
        return !$this->getQuote()->isVirtual();
    }
}