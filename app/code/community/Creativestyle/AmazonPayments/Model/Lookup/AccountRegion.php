<?php

/**
 * This file is part of the official Amazon Payments Advanced extension
 * for Magento (c) creativestyle GmbH <amazon@creativestyle.de>
 * All rights reserved
 *
 * Reuse or modification of this source code is not allowed
 * without written permission from creativestyle GmbH
 *
 * @category   Creativestyle
 * @package    Creativestyle_AmazonPayments
 * @copyright  Copyright (c) 2016 creativestyle GmbH
 * @author     Marek Zabrowarny / creativestyle GmbH <amazon@creativestyle.de>
 */
class Creativestyle_AmazonPayments_Model_Lookup_AccountRegion extends Creativestyle_AmazonPayments_Model_Lookup_Abstract {

    protected function _getRegions() {
        return Mage::getSingleton('amazonpayments/config')->getGlobalDataValue('account_regions');
    }

    public function toOptionArray() {
        if (null === $this->_options) {
            $this->_options = array();
            foreach ($this->_getRegions() as $region => $regionName) {
                $this->_options[] = array(
                    'value' => $region,
                    'label' => Mage::helper('amazonpayments')->__($regionName)
                );
            }
        }
        return $this->_options;
    }

    public function getRegionLabelByCode($code) {
        $regions = $this->getOptions();
        if (array_key_exists($code, $regions)) {
            return $regions[$code];
        }
        return null;
    }

}
