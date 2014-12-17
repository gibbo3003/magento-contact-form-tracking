<?php
/**
 * Gibbodesigns FormTracking system config validate field
 *
 * @category   Gibbodesigns
 * @package    Gibbodesigns_FormTracking
 */

class Gibbodesigns_FormTracking_Model_System_Config_Validate_Field extends Mage_Core_Model_Config_Data
{
    /**
     * Xml config path to contact form tracking active value
     *
     */
    const XML_PATH_ACTIVE = 'google/formtracking/active';
    
    /**
     * Check if field contains anything
     * 
     * @return Gibbodesigns_FormTracking_Model_System_Config_Validate_Field
     * @throws Mage_Core_Exception
     */
    public function _beforeSave()
    {
        $value = $this->getValue();
        $isActive = $this->getData()['fieldset_data']['active'];
        $label = ucwords($this->getData()['field']);

        if ($value == '' && $isActive) {
            Mage::throwException(
                Mage::helper('customer')->__('The field "'.$label.'" cannot be blank when Contact Form Tracking is enabled.')
            );
        }
        return $this;
    }
}