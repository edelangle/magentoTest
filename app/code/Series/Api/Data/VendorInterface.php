<?php
/**
 * This file is part of Poe Series
 *
 * @author JC Lecas <jclecas@clever-age.com> <@CleverAge>
 * @category Poe
 * @package Poe\Series\Api\Data
 * @license CleverAge
 * @copyright Copyright (c) 2022 Clever Age (https://www.clever-age.com)
 */

namespace Series\Api\Data;

interface VendorInterface
{
    const VENDOR_ID = 'vendor_id';
    const NAME = 'name';

    /**
     * Get Vendor Id
     *
     * @return mixed
     */
    public function getVendorId();

    /**
     * Set Vendor Id
     *
     * @param $vendorId
     * @return $this
     */
    public function setVendorId($vendorId);

    /**
     * Get Name
     *
     * @return mixed
     */
    public function getName();

    /**
     * Set Name
     *
     * @param $name
     * @return $this
     */
    public function setName($name);

}
