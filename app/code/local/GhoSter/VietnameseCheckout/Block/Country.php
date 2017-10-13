<?php
class GhoSter_VietnameseCheckout_Block_Country extends Mage_Directory_Block_Data
{
    public function __construct()
    {
        $this->setTemplate('ghoster/vietnamesecheckout/cart/country.phtml');
    }

    /**
     * @return string
     */
    public function getSelectedCountryId()
    {
        return Mage::getSingleton('checkout/session')->getQuote()->getShippingAddress()->getCountryId();
    }
    
    public function getCountryHtmlSelect($defValue=null, $name='country_id', $id='country', $title='Country')
    {
        if (is_null($defValue)) {
            $defValue = $this->getCountryId();
        }
        $cacheKey = 'DIRECTORY_COUNTRY_SELECT_STORE_'.Mage::app()->getStore()->getCode();
        if (Mage::app()->useCache('config') && $cache = Mage::app()->loadCache($cacheKey)) {
            $options = unserialize($cache);
        } else {
            $options = $this->getCountryCollection()->toOptionArray();
            if (Mage::app()->useCache('config')) {
                Mage::app()->saveCache(serialize($options), $cacheKey, array('config'));
            }
        }
        $html = $this->getLayout()->createBlock('core/html_select')
            ->setName($name)
            ->setId($id)
            ->setTitle(Mage::helper('directory')->__($title))
            ->setClass('validate-select')
            ->setValue($defValue)
            ->setOptions($options)
            ->getHtml();

        return $html;
    }
}
