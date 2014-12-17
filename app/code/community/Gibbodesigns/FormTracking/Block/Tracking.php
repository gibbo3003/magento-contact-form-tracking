<?php
/**
 * GoogleAnalitics Page Block
 *
 * @category   Gibbodesign
 * @package    Gibbodesigns_FormTracking
 * @author     Timothy Giblin <tim@gibbodesigns.co.uk>
 */
class Gibbodesigns_FormTracking_Block_Tracking extends Mage_Core_Block_Template
{

    /**
     * Render contact form tracking javascript code
     *
     * @param string $accountId
     * @return string
     */
    protected function _getContactFormTrackingCode($eventstring)
    {
        if (Mage::helper('googleanalytics')->isUseUniversalAnalytics()) {
            return $this->_getContactFormTrackingCodeUniversal($eventstring);
        } else {
            return $this->_getContactFormTrackingCodeAnalytics($eventstring);
        }
    }
    
    /**
     * Render universal contact form tracking javascript code
     *
     * @return string
     */
    protected function _getContactFormTrackingCodeUniversal($eventstring)
    {
        return "ga('send', 'event',
        {
            'eventCategory' : '".$eventstring['category']."',
            'eventAction'   : '".$eventstring['action']."',
            'eventLabel'    : '".$eventstring['label']."',
            'eventValue'    : '".$eventstring['value']."',
            'hitCallback'   : function () {
                contactForm.submit();
            },
            'hitCallbackFail' : function () {
                contactForm.submit();   
            }
        });\r\n";
    }
    
    /**
     * Render analytics contact form tracking javascript code
     * 
     * @return string
     */
    protected function _getPageTrackingCodeAnalytics($eventstring)
    {
        return "_gaq.push(['_trackEvent','".$eventstring['category']."','".$eventstring['action']."','".$eventstring['label']."','".$eventstring['value']."']);\r\n
        _gaq.push(function() { contactForm.submit(); });\r\n";
    
    }

    /**
     * Render tracking scripts
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!Mage::helper('googleanalytics')->isGoogleAnalyticsAvailable() || !Mage::helper('gibbodesigns')->isContactFormTrackingAvailable()) {
            return '';
        }
        return parent::_toHtml();
    }
}