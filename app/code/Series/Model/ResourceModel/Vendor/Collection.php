<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Model\ResourceModel\Vendor
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Series\Model\Data\Vendor;
use Series\Model\ResourceModel\Vendor as VendorResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'vendor_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Vendor::class, VendorResource::class);
    }
}
