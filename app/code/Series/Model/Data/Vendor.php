<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Model
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Model\Data;

use Magento\Framework\Model\AbstractModel;
use Series\Api\Data\VendorInterface;
use Series\Model\ResourceModel\Vendor as VendorResource;

class Vendor extends AbstractModel implements VendorInterface
{
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'poe_vendor';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'poe_vendor';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(VendorResource::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getVendorId()
    {
        return $this->getData(self::VENDOR_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setVendorId($vendorId)
    {
        $this->setData(self::VENDOR_ID, $vendorId);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
        return $this;
    }

}
