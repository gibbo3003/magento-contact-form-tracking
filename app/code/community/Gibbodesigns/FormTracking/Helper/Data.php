<?php
/**
 * Gibbodesigns FormTracking data helper
 *
 * @category   Gibbodesigns
 * @package    Gibbodesigns_FormTracking
 */
class Gibbodesigns_FormTracking_Helper_Data extends Mage_Core_Helper_Abstract{
    /**
     * Config paths for using throughout the code
     */
    const XML_PATH_ACTIVE   = 'google/formtracking/active';
    const XML_PATH_CATEGORY = 'google/formtracking/category';
    const XML_PATH_ACTION   = 'google/formtracking/action';
    const XML_PATH_LABEL    = 'google/formtracking/label';
    const XML_PATH_VALUE    = 'google/formtracking/value';
    
    /**
     * Get contact form tracking code
     *
     * @param string $store
     * @return string
     */
    public function getContactFormEventString($store = null) {
        $trackingString = array(
            'category' => Mage::getStoreConfig(self::XML_PATH_CATEGORY, $store),
            'action'   => Mage::getStoreConfig(self::XML_PATH_ACTION, $store),
            'label'    => Mage::getStoreConfig(self::XML_PATH_LABEL, $store),
            'value'    => Mage::getStoreConfig(self::XML_PATH_VALUE, $store)
        );
        return $trackingString;
    }
    
    /**
     * Returns true if we can use Contact Form Tracking
     *
     * @param string $store
     * @return string
     */
    public function isContactFormTrackingAvailable($store = null) {
        return Mage::getStoreConfigFlag(self::XML_PATH_ACTIVE, $store);
    }
    
}