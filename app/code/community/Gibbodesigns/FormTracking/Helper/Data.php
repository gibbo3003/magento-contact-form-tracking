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
    
    const XML_BILLING_PATH_ACTIVE   = 'google/billingtracking/active';
    const XML_BILLING_PATH_CATEGORY = 'google/billingtracking/category';
    const XML_BILLING_PATH_ACTION   = 'google/billingtracking/action';
    const XML_BILLING_PATH_LABEL    = 'google/billingtracking/label';
    const XML_BILLING_PATH_VALUE    = 'google/billingtracking/value';
    
    const XML_SHIPPING_PATH_ACTIVE   = 'google/shippingtracking/active';
    const XML_SHIPPING_PATH_CATEGORY = 'google/shippingtracking/category';
    const XML_SHIPPING_PATH_ACTION   = 'google/shippingtracking/action';
    const XML_SHIPPING_PATH_LABEL    = 'google/shippingtracking/label';
    const XML_SHIPPING_PATH_VALUE    = 'google/shippingtracking/value';
    
    const XML_SHIPPING_METHOD_PATH_ACTIVE   = 'google/shippingmethodtracking/active';
    const XML_SHIPPING_METHOD_PATH_CATEGORY = 'google/shippingmethodtracking/category';
    const XML_SHIPPING_METHOD_PATH_ACTION   = 'google/shippingmethodtracking/action';
    const XML_SHIPPING_METHOD_PATH_LABEL    = 'google/shippingmethodtracking/label';
    const XML_SHIPPING_METHOD_PATH_VALUE    = 'google/shippingmethodtracking/value';
    
    const XML_PAYMENT_METHOD_PATH_ACTIVE   = 'google/paymentmethodtracking/active';
    const XML_PAYMENT_METHOD_PATH_CATEGORY = 'google/paymentmethodtracking/category';
    const XML_PAYMENT_METHOD_PATH_ACTION   = 'google/paymentmethodtracking/action';
    const XML_PAYMENT_METHOD_PATH_LABEL    = 'google/paymentmethodtracking/label';
    const XML_PAYMENT_METHOD_PATH_VALUE    = 'google/paymentmethodtracking/value';
    
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
     * Get billing form tracking code
     *
     * @param string $store
     * @return string
     */
    public function getBillingFormEventString($store = null) {
        $trackingString = array(
            'category' => Mage::getStoreConfig(self::XML_BILLING_PATH_CATEGORY, $store),
            'action'   => Mage::getStoreConfig(self::XML_BILLING_PATH_ACTION, $store),
            'label'    => Mage::getStoreConfig(self::XML_BILLING_PATH_LABEL, $store),
            'value'    => Mage::getStoreConfig(self::XML_BILLING_PATH_VALUE, $store)
        );
        return $trackingString;
    }
    
    /**
     * Get shipping form tracking code
     *
     * @param string $store
     * @return string
     */
    public function getShippingFormEventString($store = null) {
        $trackingString = array(
            'category' => Mage::getStoreConfig(self::XML_SHIPPING_PATH_CATEGORY, $store),
            'action'   => Mage::getStoreConfig(self::XML_SHIPPING_PATH_ACTION, $store),
            'label'    => Mage::getStoreConfig(self::XML_SHIPPING_PATH_LABEL, $store),
            'value'    => Mage::getStoreConfig(self::XML_SHIPPING_PATH_VALUE, $store)
        );
        return $trackingString;
    }
    
    /**
     * Get shipping method form tracking code
     *
     * @param string $store
     * @return string
     */
    public function getShippingMethodFormEventString($store = null) {
        $trackingString = array(
            'category' => Mage::getStoreConfig(self::XML_SHIPPING_METHOD_PATH_CATEGORY, $store),
            'action'   => Mage::getStoreConfig(self::XML_SHIPPING_METHOD_PATH_ACTION, $store),
            'label'    => Mage::getStoreConfig(self::XML_SHIPPING_METHOD_PATH_LABEL, $store),
            'value'    => Mage::getStoreConfig(self::XML_SHIPPING_METHOD_PATH_VALUE, $store)
        );
        return $trackingString;
    }
    
    /**
     * Get payment method form tracking code
     *
     * @param string $store
     * @return string
     */
    public function getPaymentMethodFormEventString($store = null) {
        $trackingString = array(
            'category' => Mage::getStoreConfig(self::XML_PAYMENT_METHOD_PATH_CATEGORY, $store),
            'action'   => Mage::getStoreConfig(self::XML_PAYMENT_METHOD_PATH_ACTION, $store),
            'label'    => Mage::getStoreConfig(self::XML_PAYMENT_METHOD_PATH_LABEL, $store),
            'value'    => Mage::getStoreConfig(self::XML_PAYMENT_METHOD_PATH_VALUE, $store)
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
    
    /**
     * Returns true if we can use Billing Form Tracking
     *
     * @param string $store
     * @return string
     */
    public function isBillingFormTrackingAvailable($store = null) {
        return Mage::getStoreConfigFlag(self::XML_BILLING_PATH_ACTIVE, $store);
    }

    /**
     * Returns true if we can use Shipping Form Tracking
     *
     * @param string $store
     * @return string
     */
    public function isShippingFormTrackingAvailable($store = null) {
        return Mage::getStoreConfigFlag(self::XML_SHIPPING_PATH_ACTIVE, $store);
    }
    
    /**
     * Returns true if we can use Shipping Method Form Tracking
     *
     * @param string $store
     * @return string
     */
    public function isShippingMethodFormTrackingAvailable($store = null) {
        return Mage::getStoreConfigFlag(self::XML_SHIPPING_METHOD_PATH_ACTIVE, $store);
    }
    
    /**
     * Returns true if we can use Payment Method Form Tracking
     *
     * @param string $store
     * @return string
     */
    public function isPaymentMethodFormTrackingAvailable($store = null) {
        return Mage::getStoreConfigFlag(self::XML_PAYMENT_METHOD_PATH_ACTIVE, $store);
    }
    
}