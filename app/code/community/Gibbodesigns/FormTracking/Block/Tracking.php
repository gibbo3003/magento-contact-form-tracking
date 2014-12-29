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
     * Render form tracking javascript code
     *
     * @param string $form
     * @param string $eventstring
     * @return string
     */
    protected function _getFormTrackingCode($form,$eventstring)
    {
        if (Mage::helper('googleanalytics')->isUseUniversalAnalytics()) {
            return $this->_getFormTrackingCodeUniversal($form,$eventstring);
        } else {
            return $this->_getFormTrackingCodeAnalytics($form,$eventstring);
        }
    }
    
    /**
     * Render onepage form tracking javascript code
     *
     * @param string $form
     * @param string $eventstring
     * @return string
     */
    protected function _getOnePageTrackingCode($eventstring)
    {
        if (Mage::helper('googleanalytics')->isUseUniversalAnalytics()) {
            return $this->_getOnePageTrackingCodeUniversal($eventstring);
        } else {
            return $this->_getOnePageTrackingCodeAnalytics($eventstring);
        }
    }
    
    
    /**
     * Render universal form tracking javascript code
     *
     * @param string $form
     * @param string $eventstring
     * @return string
     */
    protected function _getFormTrackingCodeUniversal($form,$eventstring)
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
                ".$form.".submit();
            },
            'hitCallbackFail' : function () {
                ".$form.".submit();
            }
        });\r\n";
        
        return $output;
    }
    
    /**
     * Render analytics form tracking javascript code
     *
     * @param string $form
     * @param string $eventstring
     * @return string
     */
    protected function _getFormTrackingCodeAnalytics($form,$eventstring)
    {
        $output = "_gaq.push(['_trackEvent','".$eventstring['category']."','".$eventstring['action']."'";
        $output .= ($eventstring['label'] != '') ? ",'".$eventstring['label']."'" : ''; //only show eventLabel when it exists
        $output .= (is_numeric($eventstring['value'])) ? ",'".$eventstring['value']."'" : ''; //only show eventValue when it exists
        $output .= "]);\r\n
        _gaq.push(function() { ".$form.".submit(); });\r\n";
        
        return $output;
    }
    
    /**
     * Render universal onepage tracking javascript code
     *
     * @param string $eventstring
     * @return string
     */
    protected function _getOnePageTrackingCodeUniversal($eventstring)
    {
        
        $output = "ga('send', 'event',{
            'eventCategory' : '".$eventstring['category']."',
            'eventAction'   : '".$eventstring['action']."',";
        $output .= ($eventstring['label'] != '') ? "
            'eventLabel'    : '".$eventstring['label']."'," : ''; //only show eventLabel when it exists
        $output .= (is_numeric($eventstring['value'])) ? "
            'eventValue'    : ".$eventstring['value']."," : ''; //only show eventValue when it exists
        $output .= "
        });\r\n";
        
        return $output;
    }
    
    /**
     * Render analytics onepage tracking javascript code
     *
     * @param string $eventstring
     * @return string
     */
    protected function _getOnePageTrackingCodeAnalytics($form,$eventstring)
    {
        $output = "_gaq.push(['_trackEvent','".$eventstring['category']."','".$eventstring['action']."'";
        $output .= ($eventstring['label'] != '') ? ",'".$eventstring['label']."'" : ''; //only show eventLabel when it exists
        $output .= (is_numeric($eventstring['value'])) ? ",'".$eventstring['value']."'" : ''; //only show eventValue when it exists
        $output .= "]);\r\n";
        
        return $output;
    }

    /**
     * Render tracking scripts is analytics is available
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!Mage::helper('googleanalytics')->isGoogleAnalyticsAvailable()) {
            return '';
        }
        return parent::_toHtml();
    }
}