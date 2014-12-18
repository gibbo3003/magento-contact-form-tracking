<?php
/**
 * GoogleAnalytics Page Block
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
        
        $output = "ga('send', 'event',{
            'eventCategory' : '".$eventstring['category']."',
            'eventAction'   : '".$eventstring['action']."',";
        $output .= ($eventstring['label'] != '') ? "
            'eventLabel'    : '".$eventstring['label']."'," : ''; //only show eventLabel when it exists
        $output .= (is_numeric($eventstring['value'])) ? "
            'eventValue'    : ".$eventstring['value']."," : ''; //only show eventValue when it exists
        $output .= "
            'hitCallback'   : function () {
                contactForm.submit();
            },
            'hitCallbackFail' : function () {
                contactForm.submit();
            }
        });\r\n";
        
        return $output;
    }
    
    /**
     * Render analytics contact form tracking javascript code
     * 
     * @return string
     */
    protected function _getPageTrackingCodeAnalytics($eventstring)
    {
        $output = "_gaq.push(['_trackEvent','".$eventstring['category']."','".$eventstring['action']."'";
        $output .= ($eventstring['label'] != '') ? ",'".$eventstring['label']."'" : ''; //only show eventLabel when it exists
        $output .= (is_numeric($eventstring['value'])) ? ",'".$eventstring['value']."'" : ''; //only show eventValue when it exists
        $output .= "]);\r\n
        _gaq.push(function() { contactForm.submit(); });\r\n";
        
        return $output;
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
