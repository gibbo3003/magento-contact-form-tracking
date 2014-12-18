<?php
/**
 * Gibbodesigns FormTracking system config validate num
 *
 * @category   Gibbodesigns
 * @package    Gibbodesigns_FormTracking
 */

class Gibbodesigns_FormTracking_Model_System_Config_Validate_Num extends Mage_Core_Model_Config_Data
{
    /**
     * Xml config path to contact form tracking active value
     *
     */
    const XML_PATH_ACTIVE = 'google/formtracking/value';
    
    /**
     * Check if field is numeric if a value exists
     * 
     * @return Gibbodesigns_FormTracking_Model_System_Config_Validate_Num
     * @throws Mage_Core_Exception
     */
    public function _beforeSave()
    {
        $value = $this->getValue();
        $label = ucwords($this->getData()['field']);

        if ($value != '' && !is_numeric($value)) {
            Mage::throwException(
                Mage::helper('customer')->__('The field "'.$label.'" cannot be a string, it must be numeric.')
            );
        }
        return $this;
    }
}