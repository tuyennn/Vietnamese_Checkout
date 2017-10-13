<?php

class GhoSter_VietnameseCheckout_Block_Checkout_Links extends Mage_Checkout_Block_Links {
    /**
     * Add shopping cart link to parent block
     *
     * @return Mage_Checkout_Block_Links
     */
    public function addCartLink()
    {
        $parentBlock = $this->getParentBlock();
        if ($parentBlock && Mage::helper('core')->isModuleOutputEnabled('Mage_Checkout') && Mage::getSingleton('customer/session')->isLoggedIn()) {
            $count = $this->getSummaryQty() ? $this->getSummaryQty()
                : $this->helper('checkout/cart')->getSummaryCount();
            if ($count == 1) {
                $text = $this->__('My Cart (%s item)', $count);
            } elseif ($count > 0) {
                $text = $this->__('My Cart (%s items)', $count);
            } else {
                $text = $this->__('My Cart');
            }

            $parentBlock->removeLinkByUrl($this->getUrl('checkout/cart'));
            $parentBlock->addLink($text, 'checkout/cart', $text, true, array(), 50, null, 'class="top-link-cart"');
        }
        return $this;
    }

    /**
     * Add link on checkout page to parent block
     *
     * @return Mage_Checkout_Block_Links
     */
    public function addCheckoutLink()
    {
        if (!$this->helper('checkout')->canOnepageCheckout()) {
            return $this;
        }

        $parentBlock = $this->getParentBlock();
        if ($parentBlock && Mage::helper('core')->isModuleOutputEnabled('Mage_Checkout') && Mage::getSingleton('customer/session')->isLoggedIn()) {
            $text = $this->__('Checkout');
            $parentBlock->addLink(
                $text, 'checkout', $text,
                true, array('_secure' => true), 60, null,
                'class="top-link-checkout"'
            );
        }
        return $this;
    }

    /**
     * Check if customer login or not then add the link
     *
     * @return $this
     */
    public function addFavoriteLink() {
        $parentBlock = $this->getParentBlock();
        if($parentBlock && Mage::getSingleton('customer/session')->isLoggedIn() && Mage::getStoreConfig('wishlist/general/active', Mage::app()->getStore()->getId())) {
            $text = $this->__('My Wishlist');
            $parentBlock->addLink($text, 'wishlist/', $text, true, array(), 40, null, 'class="top-link-wishlist"');
        } else {
            $parentBlock->removeLinkByUrl($this->getUrl('wishlist'));
        }

        return $this;
    }

    /**
     * Check if customer login or not then add the link
     *
     * @return $this
     */
    public function addMyAccountLink() {
        $parentBlock = $this->getParentBlock();
        if($parentBlock && Mage::helper('core')->isModuleOutputEnabled('Mage_Customer') && Mage::getSingleton('customer/session')->isLoggedIn()) {
            $text = $this->__('My Account');
            $parentBlock->addLink($text, Mage::helper('customer')->getAccountUrl(), $text, false, array(), 70, null, 'class="top-link-myaccount"');

        } else {
            $parentBlock->removeLinkByUrl(Mage::helper('customer')->getAccountUrl());
        }
        return $this;
    }
}