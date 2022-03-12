<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Model\ResourceModel
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Series\Api\Data\VendorInterface;

class Vendor extends AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('poe_vendor', 'vendor_id');
    }
}
