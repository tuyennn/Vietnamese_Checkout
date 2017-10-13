<?php
class GhoSter_VietnameseCheckout_Model_Source_ShippingMethods
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = array(array(
            'value' => '',
            'label' => '',
        ));
        foreach(Mage::getStoreConfig('carriers') as $carrierCode => $carrierConfig) {
            $options[] = array(
                'value' => $carrierCode,
                'label' => Mage::getStoreConfig('carriers/' . $carrierCode . '/title') . ' [' . $carrierCode . ']',
            );
        }
        return $options;
    }
}